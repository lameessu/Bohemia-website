<?php

	$DB_HOST = 'localhost';
    $DB_USER = 'bohemia_bohemia';
    $DB_PASSWORD = 'l1m2s3';
    $DB_DATABASE = 'bohemia';

	
	
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
	

	//Create query
	$qry="SELECT photo FROM StarPicture";
	$result=mysql_query($qry);

	//Check whether the query was successful or not
	if($result) {
	$row = mysql_fetch_array($result);
	echo $row['photo'];
		}
		else echo "There was an error when inserting comment.";

		?>
