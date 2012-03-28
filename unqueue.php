<?php
$query = "DELETE FROM queues WHERE user_id='$user->id'";
$result = mysql_query($query) or die(mysql_error());

// May need updating if users can be in multiple groups!
$query = "SELECT * FROM group_members WHERE group_id=(SELECT group_id FROM group_members WHERE user_id='$user->id');";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);
$group_id = (mysql_num_rows($result) == 1 && $row != null) ? $row['group_id'] : null;

$query = "DELETE FROM group_members WHERE user_id='$user->id'";
$result = mysql_query($query) or die(mysql_error());

// If this person is the only one in the group and they cancel.
if ($group_id != null) {
    $query = "DELETE FROM groups WHERE id=$group_id;";
    $result = mysql_query($query) or die(mysql_error());
}
