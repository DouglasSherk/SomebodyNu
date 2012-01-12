<?php
$text = $_GET['q'];  // What the user has typed in.
$query = sprintf("SELECT id, name FROM activities " .
                    "WHERE name LIKE \"%s%%\";",
                 $text);
$result = mysql_query($query) or die(mysql_error());

$activities = array();
$pos = 0;
while ($row = mysql_fetch_assoc($result)) {
    $activities[$pos++] = array('id' => (int)$row['id'], 'text' => $row['name']);
}
echo json_encode($activities);
