<?php
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	
	$id = $_POST['SessionID'];
	$type = $_POST['Type'];
	$comment = $_POST['Comment'];
	
	mysql_query("INSERT INTO data VALUES ('$id', '$type', '$comment')");
	

?>