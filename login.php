<?php
	session_start();
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	
	$myemail = $_POST['email'];
	$mypassword = $_POST['password'];
	
	$sql="SELECT * FROM accounts WHERE email='$myemail' and password='$mypassword'";
	$result = mysql_query($sql);
	$count=mysql_num_rows($result);

	if ($count > 0) {
		$row = mysql_fetch_assoc($result);
		$email = $row['email'];
		
		$_SESSION['email'] = $myemail;
		$_SESSION['password'] = $mypassword;
		
		echo 1;
	}
	else {
		echo 2;
	}
?>	