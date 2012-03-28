<?php
$amount = (int) $_POST['size'];
$activity = $_POST['activity'];

$query = "SELECT * FROM activities WHERE id=(" . 
            "SELECT activity_id FROM groups WHERE id=( " .
                "SELECT group_id FROM group_members WHERE user_id=$user->id " .
            ")" .
         ");";
$result = mysql_query($query) or die(mysql_error());

// If they're already in a group, don't let them create another.
if (mysql_num_rows($result) > 0)
{
    $row = mysql_fetch_assoc($result);
    die("You are already in a group for " . $row['name']);
}

$query = "INSERT INTO groups (id, activity_id, location, size, time_created) " .
         "VALUES(null, $activity, '" . mysql_real_escape_string($user->location) . "', $amount, null);";
mysql_query($query) or die(mysql_error());

$query = "INSERT INTO group_members(id, user_id, group_id) " .
         "VALUES(null, $user->id, " . mysql_insert_id() . ")";
mysql_query($query) or die(mysql_error());

echo "ok";
