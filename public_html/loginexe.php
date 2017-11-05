<?php
	//Start session
	session_start();
	
		$DB_HOST = 'localhost';
    $DB_USER = 'bohemia_bohemia';
    $DB_PASSWORD = 'l1m2s3';
    $DB_DATABASE = 'bohemia_bohemia';

	
	//Connect to mysql server
	$con = mysql_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
	if(!$con) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db($DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	

	//Sanitize the POST values
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	//Create query
	//$qry="SELECT * FROM members WHERE username='$login' AND password='".md5($_POST['password'])."'";
	$qry="SELECT * FROM admin WHERE username='$username' AND password='".$_POST['password']."'";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
			//Login Successful

			$member = mysql_fetch_assoc($result);
			$_SESSION['MEMBER_ID'] = $member['ID'];
			$_SESSION['NAME'] = $member['username'];
	

			header("location: ControlPanel.php");
			exit();
		}else {
			//Login failed
			header("location: loginpage.php?status=1");
			exit();
		}
	}else {
		die("Query failed");
	}
?>