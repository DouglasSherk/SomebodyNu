<?php
$group_id = (int) $_GET['group_id'];
$activity_id = (int) $_GET['activity_id'];

$query = "SELECT * FROM groups WHERE activity_id = $activity_id AND id = $group_id;";
$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) < 1) {
    header('Location: /');
    exit;
}

$query = "SELECT * FROM group_members WHERE user_id = $user->id AND group_id = $group_id;";
$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) != 0) {
    header('Location: /');
    exit;
}

$query = "SELECT activities.*," .
         "groups.size - (SELECT COUNT(*) FROM group_members WHERE group_id=$group_id) AS remaining " .
         "FROM groups " .
         "LEFT JOIN activities ON activities.id = groups.activity_id";
$result = mysql_query($query) or die(mysql_error());

if ($row = mysql_fetch_assoc($result)) {
    if ($row['remaining'] == 1) {
        $users = array();

        $activity = $row['name'];

        $query = "SELECT group_members.*, users.* FROM group_members " .
                 "LEFT JOIN users ON users.id = group_members.user_id " .
                 "WHERE group_id = $group_id;";
        $result = mysql_query($query) or die(mysql_error());

        $uid_arr = array();
        while ($row2 = mysql_fetch_assoc($result)) {
            array_push($users, array(
                'email' => $row2['email'],
                'name' => $row2['name'],
                'uid' => $row2['uid']
            ));
            $uid_arr[] = $row2['uid'];
        }
        $uid_arr[] = $user->uid;

        array_push($users, array(
            'email' => $user->email,
            'name' => $user->name,
            'uid' => $user->uid
        ));

        $query = "DELETE FROM group_members WHERE group_id = $group_id;";
        mysql_query($query) or die(mysql_error());

        $query = "DELETE FROM groups WHERE id = $group_id;";
        mysql_query($query) or die(mysql_error());

        $tmpl = 'group';
        $subject = 'You have been matched with a group!';

        Stats::poll("groupfilled", $row['id'], $user->location, implode(':', $uid_arr), $group_id, $user->id);

        include_once('email/send-group.php');

        $_SESSION['group_name_filled'] = $row['name'];
    } else {
        $query = "INSERT INTO group_members (id, user_id, group_id) " .
                 "VALUES(null, $user->id, $group_id);";
        mysql_query($query) or die(mysql_error());

        Stats::poll("groupmatch", $row['id'], $user->location, $group_id, '', $user->id);

        $_SESSION['group_name'] = $row['name'];
    }

    header('Location: /');
}
