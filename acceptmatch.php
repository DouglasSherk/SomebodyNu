<?php

$token = $_GET['token'];
$query = "UPDATE partials SET active=0 " .
         "WHERE MD5(CONCAT(\"dfsnib9\", id))=\"$token\"";
$result = mysql_query($query) or die(mysql_error());

$query = "SELECT users.*, partials.activity_id FROM partials " .
    "LEFT JOIN users ON users.id = partials.matched_user_id " .
    "WHERE MD5(CONCAT(\"dfsnib9\", partials.id))=\"$token\" AND partials.active=1";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);

$to = $row['email'] . ", " . $user->email;
$subject = "You have been matched!";
$tmpl = 'email';
include_once("email/send.php");

$_SESSION['matched_name'] = $row['name'];
$_SESSION['matched_uid'] = $row['uid'];

Stats::poll("matchaccept", $row['id'], $row['location'], $row['activity_id'], "", $user->id);

header('Location: /');