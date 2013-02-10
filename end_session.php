<?php
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	
	$id = $_POST['id'];
	$sql = "DELETE FROM sessions WHERE id='$id'";
	$sql2 = "DELETE FROM data WHERE id='$id'";
	$result = mysql_query($sql);
	$result2 = mysql_query($sql2);
	
	echo "Deleted Successfully!";
?>