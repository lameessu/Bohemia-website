<?php
//Authenticate the user:



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
	
	
	$hotelID = $_GET['ID'];

	//Retrieve inserted values:
	$name = $_POST['name'];
	$email = $_POST['email'];
	$title = $_POST['title'];
	$body = $_POST['textareaMyForm'];
	$rating = $_POST['rating'];
	$date=getdate(date("U"));
	$mydate ="$date[month] $date[mday], $date[year]";
	//Create query
	$qry="insert into comment (name,email,title,facility_id,body,rating,date) values('$name','$email','$title','$hotelID','$body','$rating','$mydate')";
	$result=mysql_query($qry);

$mynewlink= "location:HotelPage.php?ID=".$hotelID ;
	//Check whether the query was successful or not
	if($result) {
		header($mynewlink);
		}
		else echo "There was an error when inserting comment.";

		?>

	