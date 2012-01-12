<?php
$query = "DELETE FROM queues WHERE user_id='$user->id'";
$result = mysql_query($query) or die(mysql_error());
