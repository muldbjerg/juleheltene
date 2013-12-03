<?php

	$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
	mysql_select_db("juleheltene", $connection) or die(mysql_error());
	mysql_query("SET NAMES 'utf8'", $connection);
?>