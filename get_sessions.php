<?php
	$mysql_host = "mysql10.000webhost.com";
	$mysql_database = "a1145606_data";
	$mysql_user = "a1145606_admin";
	$mysql_password = "calstudent123";
	mysql_connect($mysql_host, $mysql_user, $mysql_password) or die ("cannot connect");
	mysql_select_db($mysql_database) or die ("cannot select database");
	
	$id = $_POST['id'];
	
	$sql = "SELECT * from data WHERE id='$id'";
	$result = mysql_query($sql);
	
	$all_comments = array();
	
	while($row=mysql_fetch_assoc($result)) {
       $type = $row['type'];
       $comment = $row['text'];
       
       $individual_comment = json_encode(array("Type"=>$type, "Comment"=>$comment));
       $all_comments[] = $individual_comment;
   }
   
   echo json_encode($all_comments);
?>	