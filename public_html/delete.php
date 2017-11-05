<?php
//Authenticate the user:
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['MEMBER_ID'])) {
		header("location: loginpage.php");
		exit();
	}

	
//Retrieve all publishers from DB:

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
	
	//loop through selected checkboxes:
	$options = $_POST['op'];
	$size = count($options);
	for($i = 0; $i < $size; $i ++){
	$qry="DELETE FROM facility WHERE id=' ".$options[$i]." ';";
	$result=mysql_query($qry);
	} 
	
	
	//Check whether the query was successful or not
	if($result) {
			header("location: deletepage.php?status=1");
		}
		else echo "There was an error while deleting.";
		?>

	
	