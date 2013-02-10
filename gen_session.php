<?php
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	session_start();
	$email = $_SESSION['email'];
	$title = $_POST['title'];
	$digits = 5;
	$id = 0;
	do {
		$id =  rand(pow(10, $digits-1), pow(10, $digits)-1);
	} while (mysql_num_rows(mysql_query("SELECT * FROM sessions WHERE id='$id'")) > 0);
	mysql_query("INSERT INTO sessions (id, title) VALUES('$id', '$title')");
	$id = (string) $id;
	//Get the id list 
	$ids = mysql_query("SELECT id_list FROM accounts where email = '$email'");
	$id_array = mysql_fetch_array($ids);
	$id_string = $id_array['id_list'];
	//Append to the id list 
	if(empty($id_string)){
		$id_string = $id;
	}
	else{
		$id_string = $id_string.",".$id;	
	}
	
	mysql_query("UPDATE accounts SET id_list = '$id_string' WHERE email = '$email'");
	header('Location: feedback.php?id='.$id.'&title='.$title);
?>