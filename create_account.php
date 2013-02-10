<?php
	session_start();
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	$name = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	mysql_query("INSERT INTO accounts (email, username, password) VALUES ('$email', '$name', '$password')");
	
	$_SESSION['username']=$name;
	$_SESSION['email']=$email;
?>