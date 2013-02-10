<?php
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	
	$id = $_POST['SessionID'];
	$search_result = mysql_query("SELECT * FROM sessions WHERE id='$id'");
	
	if (mysql_num_rows($search_result) > 0) {
		$row = mysql_fetch_assoc($search_result);
		echo $row['title'];
	}
	else {
		echo "Session ID Not Found";
	}

?>