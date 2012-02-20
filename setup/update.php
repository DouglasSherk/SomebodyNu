<?php
chdir("..");
require_once("includes/config.php");
Database::connect();

$query = "DROP TABLE IF EXISTS analytics;";
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
