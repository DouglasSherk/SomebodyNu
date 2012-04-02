<?php
chdir("..");
require_once("includes/config.php");
Database::connect();

$query = "DROP TABLE IF EXISTS activities;";
mysql_query($query) or die(mysql_error());
$query = "CREATE TABLE activities (" .
         "id SERIAL, " .
         "name VARCHAR(255) NOT NULL, " .
         "default_size INT NOT NULL, " .
         "PRIMARY KEY(id), " .
         "UNIQUE KEY(name));";
mysql_query($query) or die(mysql_error());*/

$data = file_get_contents('setup/activities.csv');
$tok = strtok($data, "\n");
while ($tok !== false) {
    $fields = explode(',', $tok);
    $query = "INSERT INTO activities (name, default_size) " .
             "VALUES(\"" . $fields[0] . "\", \"" . $fields[1] . "\");";
    mysql_query($query) or die(mysql_error());
    $tok = strtok("\n");
}
