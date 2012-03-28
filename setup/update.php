<?php
chdir("..");
require_once("includes/config.php");
Database::connect();

/*$query = "DROP TABLE IF EXISTS analytics;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE analytics (" .
         "id SERIAL, " .
         "counter VARCHAR(128), " .
         "kingdom VARCHAR(128), " .
         "phylum VARCHAR(128), " .
         "class VARCHAR(128), " .
         "family VARCHAR(128), " .
         "genus VARCHAR(128), " .
         "value INT(11), " .
         "time TIMESTAMP DEFAULT NOW()" .
         ");";
mysql_query($query) or die(mysql_error());

$query = "DROP TABLE IF EXISTS partials (" .
mysql_query($query) or die(mysql_error());*/

/*mysql_query('DROP TABLE partials');
$query = "CREATE TABLE partials (" .
         "id SERIAL, " . 
         "user_id BIGINT NOT NULL, " .
         "matched_user_id BIGINT NOT NULL, " .
         "activity_id BIGINT NOT NULL, " .
         "active INTEGER NOT NULL DEFAULT 1," .
         "time_created TIMESTAMP DEFAULT NOW(), " .
         "FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE, " .
         "FOREIGN KEY (matched_user_id) REFERENCES users(id) ON DELETE CASCADE, " .
         "PRIMARY KEY(id), " .
         "UNIQUE KEY(user_id, matched_user_id));";
mysql_query($query) or die(mysql_error());*/

mysql_query('DELETE FROM queues;') or die(mysql_error());

$query = "DROP TABLE IF EXISTS activities;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE activities (" .
         "id SERIAL, " .
         "name VARCHAR(255) NOT NULL, " .
         "default_size INT NOT NULL, " .
         "PRIMARY KEY(id), " .
         "UNIQUE KEY(name));";
mysql_query($query) or die(mysql_error());

$query = "DROP TABLE IF EXISTS groups;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE groups (" .
         "id SERIAL," .
         "activity_id BIGINT NOT NULL, " .
         "location VARCHAR(255) NOT NULL, " .
         "size BIGINT NOT NULL, " .
         "time_created TIMESTAMP DEFAULT NOW(), " .
         "FOREIGN KEY (activity_id) REFERENCES activities(id) ON DELETE CASCADE, " .
         "PRIMARY KEY(id));";
mysql_query($query) or die(mysql_error());

$query = "DROP TABLE IF EXISTS group_members;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE group_members( " .
         "id SERIAL," .
         "user_id BIGINT NOT NULL, " .
         "group_id BIGINT NOT NULL, " .
         "FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE, " .
         "FOREIGN KEY (group_id) REFERENCES groups(id) ON DELETE CASCADE, " .
         "PRIMARY KEY(id)," .
         "UNIQUE KEY(user_id, group_id));";
mysql_query($query) or die(mysql_error());
