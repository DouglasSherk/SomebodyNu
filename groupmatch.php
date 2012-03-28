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
         "groups.size - (SELECT COUNT(*) FROM group_members WHERE group_id=(SELECT group_id FROM group_members WHERE user_id=$user->id)) AS remaining " .
         "LEFT JOIN activities ON activities.id = groups.activity_id, "
         "FROM groups;";
$result = mysql_query($query) or die(mysql_error());

if ($row = mysql_fetch_assoc($result)) {
    if ($row['remaining'] == 1) {
        $users = array();

        $query = "SELECT group_members.*, users.* FROM group_members " .
                 "LEFT JOIN users ON users.id = group_members.user_id " .
                 "WHERE group_id = $group_id;"
        $result = mysql_query($query) or die(mysql_error());

        while ($row2 = mysql_fetch_assoc($result)) {
            array_push($users, array(
                'email' => $row2['email'],
                'name' => $row2['name'],
                'uid' => $row2['uid']
            ));
        }

        $query = "DELETE FROM group_members WHERE group_id = $group_id;";
        mysql_query($query) or die(mysql_error());

        $query = "DELETE FROM groups WHERE group_id = $group_id;";
        mysql_query($query) or die(mysql_error());

        $tmpl = 'group';
        $subject = 'You have been matched with a group!';

        include_once('email/send-group.php');
    } else {
        $query = "INSERT INTO group_members (id, user_id, group_id) " .
                 "VALUES(null, $user->id, $group_id);";
        mysql_query($query) or die(mysql_error());
    }

    $_SESSION['group_name'] = $row['name'];
}
