<?php
chdir("..");
require_once("includes/config.php");
Database::connect();

$query = "DROP TABLE IF EXISTS users;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE users (" .
         "id SERIAL, " .
         "uid VARCHAR(255) NOT NULL, " .
         "name VARCHAR(255) NOT NULL, " .
         "location VARCHAR(255) NOT NULL, " .
         "email VARCHAR(255) NOT NULL, " .
         "latitude DOUBLE, " .
         "longitude DOUBLE, " .
         "PRIMARY KEY(id), " . 
         "UNIQUE KEY(uid));";
mysql_query($query) or die(mysql_error());

$query = "DROP TABLE IF EXISTS activities;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE activities (" .
         "id SERIAL, " .
         "name VARCHAR(255) NOT NULL, " .
         "PRIMARY KEY(id), " .
         "UNIQUE KEY(name));";
mysql_query($query) or die(mysql_error());

$data = file_get_contents('setup/activities.csv');
$tok = strtok($data, "\n");
while ($tok !== false) {
    $query = "INSERT INTO activities (name) VALUES(\"" . $tok . "\");";
    mysql_query($query) or die(mysql_error());
    $tok = strtok("\n");
}

$query = "DROP TABLE IF EXISTS queues;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE queues (" .
         "id SERIAL, " .
         "user_id BIGINT NOT NULL, " .
         "activity_id BIGINT NOT NULL, " .
         "location VARCHAR(255) NOT NULL, " .
         "time_created TIMESTAMP DEFAULT NOW()," .
         "FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE, " .
         "FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE, " .
         "PRIMARY KEY(id)," .
         "UNIQUE KEY(user_id, activity_id));";
mysql_query($query) or die(mysql_error());
