<?php
chdir("..");
require_once("includes/config.php");
Database::connect();

$query = "REPLACE INTO users (uid, name, location, email) VALUES ";
$qarr = array();
for ($i=0; $i < 10; $i++) {
    $qarr[] = "($i, \"Jonathan Koff $i\", \"Waterloo\", \"jonathankoff@gmail.com\")";
}
$query .= implode(",", $qarr);
mysql_query($query) or die(mysql_error());

$query = "REPLACE INTO queues (user_id, activity_id, location) VALUES ";
$qarr = array();
for ($i=0; $i < 10; $i++) {
    $activity_id = rand(1,30);
    $qarr[] = "($i, $activity_id, \"Waterloo\")";
}
$query .= implode(",", $qarr);
mysql_query($query) or die(mysql_error());
