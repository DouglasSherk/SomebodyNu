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

$location = $user->location;
$latitude = $user->latitude ? $user->latitude : 'null';
$longitude = $user->longitude ? $user->longitude : 'null';

$query = "DELETE FROM queues WHERE user_id='$user->id'";
$result = mysql_query($query) or die(mysql_error());

// Add this user to the list until they pick someone to be matched with.
$query = "REPLACE INTO queues (user_id, activity_id, location) VALUES ('$user->id', '$activity', '$location');";
$result = mysql_query($query) or die(mysql_error());

$query = "SELECT *, " .
    "TIMESTAMPDIFF(SECOND, time_created, NOW()) AS rel_ts, " . 
    "SQRT(POW(69.1 * (users.latitude - $latitude), 2) + POW(53.0 * (users.longitude - $longitude), 2)) AS distance " .
    "FROM queues " .
    "LEFT JOIN users ON users.id = queues.user_id " .
    "WHERE ((users.location='$location' AND users.longitude = null AND users.latitude = null)" .
    /* Dumb SQL hack because SQL is retarded. */
    "OR SQRT(POW(69.1 * (users.latitude - $latitude), 2) + POW(53.0 * (users.longitude - $longitude), 2)) < 50) " . 
    "AND activity_id='$activity' " . 
    "AND user_id <> '$user->id' " . 
    "ORDER BY distance, time_created DESC " . 
    "LIMIT 4;";
$result = mysql_query($query) or die(mysql_error());

include_once("results.php");
