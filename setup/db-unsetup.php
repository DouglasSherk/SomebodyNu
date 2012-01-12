<?php
$CONFIG = json_decode(file_get_contents('config.json'));

mysql_connect($CONFIG->mysql->host,
							$CONFIG->mysql->username,
							$CONFIG->mysql->password);
mysql_select_db($CONFIG->mysql->database);

$query = sprintf('DROP TABLE users');
mysql_query($query);

$query = sprintf('DROP TABLE queries');
mysql_query($query);

mysql_close();
