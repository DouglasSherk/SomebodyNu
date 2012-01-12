<?php
$user_id = (int) $_GET['user_id'];
$activity_id = (int) $_GET['activity_id'];

$query = "SELECT * FROM queues WHERE user_id='$user_id' AND activity_id='$activity_id' AND user_id<>'$user->id';";
$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) != 1) {
    header('Location: /');
    exit;
}

$query = "SELECT * FROM users WHERE id='$user_id';";
$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) != 1) {
    die("Error: too many results");
}

$row = mysql_fetch_assoc($result);

$to = $row['email'] . ", " . $user->email;
$uid1 = $user->uid;
$name1 = $user->name;
$uid2 = $row['uid'];
$name2 = $row['name'];
$location = $user->location;

$query = "SELECT * FROM activities WHERE id='$activity_id';";
$result = mysql_query($query) or die(mysql_error());

if (mysql_num_rows($result) != 1) {
    die("Error: too many results");
}

$row = mysql_fetch_assoc($result);

$activity = $row['name'];

include_once("email/send.php");

$query = "DELETE FROM queues WHERE (user_id='$user_id' OR user_id='$user->id') AND activity_id='$activity_id';";
mysql_query($query) or die(mysql_error());

$_SESSION['matched_name'] = $name2;
$_SESSION['matched_uid'] = $uid2;

header('Location: /');
