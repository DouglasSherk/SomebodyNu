<?php
$user_id = (int) $_GET['user_id'];
$activity_id = (int) $_GET['activity_id'];

$query = "SELECT * FROM partials " .
         "WHERE user_id=$user->id AND matched_user_id=$user_id " .
         "AND activity_id=$activity_id LIMIT 1";
$result = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($result) > 0) {
    die('This user was already emailed.');
}

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

$from = $user->email;
$to = $row['email'];
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

/*$query = "DELETE FROM queues WHERE (user_id='$user_id' OR user_id='$user->id') AND activity_id='$activity_id';";*/
$query = "INSERT INTO partials (user_id, matched_user_id, activity_id) " .
         "VALUES ($user->id, $user_id, $activity_id)";
mysql_query($query) or die('You\'ve already sent this person a match request!');

$token = hash('md5', 'dfsnib9' . mysql_insert_id());
$tmpl = 'request';
$subject = "You got a match request!";
include_once("email/send.php");

$_SESSION['partial_name'] = $name2;
$_SESSION['partial_uid'] = $uid2;

Stats::poll("partial", $user_id, $location, $activity_id, "", $user->id);

header('Location: /');
