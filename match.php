<?php
if (!isset($_POST['activity']) || $_POST['activity'] == "" || $_POST['activity'] == null) {
    header('Location: /');
    exit;
}

$input = mysql_real_escape_string($_POST['activity']);

$query = "SELECT * FROM activities WHERE name='$input';";
$result = mysql_query($query) or die(mysql_error());

if (($row = mysql_fetch_assoc($result)) == null) {
    header('Location: /');
    exit;
}

// Is the user signed up for some other activity?
$unq_result = mysql_query(
    "SELECT queues.user_id, activities.name " .
    "FROM activities, queues " .
    "WHERE activities.id = queues.activity_id " .
    "  AND queues.user_id = \"$user->id\" " .
    "LIMIT 1");
if ($unq_row = mysql_fetch_assoc($unq_result)) {
    if (strtolower($unq_row['name']) != strtolower($input)) {
        header('Location: /');
        exit;
    }
}

$activity = $row['id'];
$participants = $row['default_size'];

$location = $user->location;
$latitude = $user->latitude ? $user->latitude : 'NULL';
$longitude = $user->longitude ? $user->longitude : 'NULL';

$query = "DELETE FROM queues WHERE user_id='$user->id'";
$result = mysql_query($query) or die(mysql_error());

if ($participants == 2) {
    // Add this user to the list until they pick someone to be matched with.
    $query = "REPLACE INTO queues (user_id, activity_id, location) VALUES ('$user->id', '$activity', '$location');";
    $result = mysql_query($query) or die(mysql_error());

    $query = "SELECT users.*, queues.*, partials.matched_user_id, " .
        "TIMESTAMPDIFF(SECOND, queues.time_created, NOW()) AS rel_ts, " . 
        "SQRT(POW(69.1 * (users.latitude - $latitude), 2) + POW(53.0 * (users.longitude - $longitude), 2)) AS distance " .
        "FROM queues " .
        "LEFT JOIN users ON users.id = queues.user_id " .
        "LEFT JOIN partials ON (users.id = partials.matched_user_id AND partials.user_id = $user->id) " .
        "WHERE ((users.location='$location' AND users.longitude IS NULL AND users.latitude IS NULL )" .
        /* Dumb SQL hack because SQL is retarded. */
        "OR SQRT(POW(69.1 * (users.latitude - $latitude), 2) + POW(53.0 * (users.longitude - $longitude), 2)) < 50) " . 
        "AND queues.activity_id='$activity' " . 
        "AND queues.user_id <> '$user->id' " . 
        "ORDER BY distance, queues.time_created DESC " . 
        "LIMIT 4;";
    $result = mysql_query($query) or die(mysql_error());

    include_once("results.php");
} else {
    $query = "SELECT group_members.*, groups.*, users.*, " .
             "groups.id = (SELECT group_id FROM group_members WHERE user_id=$user->id) AS userInGroup, " .
             "groups.size - (SELECT COUNT(*) FROM group_members WHERE group_id=groups.id) AS remaining " .
             "FROM group_members " .
             "LEFT JOIN groups ON groups.id = group_members.group_id " .
             "LEFT JOIN users ON users.id = group_members.user_id " .
             "WHERE groups.activity_id = $activity " .
             "ORDER BY groups.id = (SELECT group_id FROM group_members WHERE user_id=$user->id), groups.id DESC";
    $result = mysql_query($query) or die(mysql_error());

    $userInGroup = false;
    if ($row = mysql_fetch_assoc($result)) {
        if ($row['userInGroup']) {
            $userInGroup = true;
        }
        mysql_data_seek($result, 0);
    }
 
    include_once("groupResults.php");
}
