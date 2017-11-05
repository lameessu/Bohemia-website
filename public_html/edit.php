<?php


//Authenticate the user:
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['MEMBER_ID'])) {
		header("location: loginpage.html");
		exit();
	}

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
	
	//Retrieve inserted values:
	
	$ID = $_GET['hotel'];
	
	$name = $_POST['HotelName'];
	$description = stripslashes($_POST['description']);
	$location = stripslashes($_POST['location']);
	$website = $_POST['website'];
	$phone = $_POST['Phone'];
	$map = $_POST['map'];
	$region = $_POST['region'];
	
	
	//Create query
	$qry='UPDATE facility SET name = "'.$name.'", description = "'.$description.'" , location = "'.$location.'" , website = "'.$website.'" , phone = "'.$phone.'" ,  map = "'.$map.'", category_id = "'.$region.'" where  ID= "'.$ID.'";';
	$result=mysql_query($qry);
	
	
if(!empty($_FILES)) 
{ 

	
	if($_FILES['pic1']['error'] != 4)
{ 
	   $temp = explode(".",$_FILES['pic1']['name']);
	$target = 'images/pic'.$ID.'1.'. end ($temp);
	$source = $_FILES ['pic1']['tmp_name'];
	copy ($source,$target);
		
	$qry='UPDATE  facility 
	SET profile_image  = "'.$target.'"
	where  ID= "'.$ID.'";';
	$result=mysql_query($qry);

	}
	
		if($_FILES['pic2']['error'] != 4)

	{ $temp = explode(".",$_FILES['pic2']['name']);
	$target = 'images/pic'.$ID.'2.'. end ($temp);
	$source = $_FILES ['pic2']['tmp_name'];
	copy ($source,$target);
		
	$qry='UPDATE  facility 
	SET pic1 = "'.$target.'"
	where  ID= "'.$ID.'";';
	$result=mysql_query($qry);
	}
	
if($_FILES['pic3']['error'] != 4)

	{$temp = explode(".",$_FILES['pic3']['name']);
	$target = 'images/pic'.$ID.'3.'. end ($temp);
	$source = $_FILES ['pic3']['tmp_name'];
	copy ($source,$target);
		
	$qry='UPDATE  facility 
	SET pic2  = "'.$target.'"
	where  ID= "'.$ID.'";';
	$result=mysql_query($qry);}
	
if($_FILES['pic4']['error'] != 4)	
{$temp = explode(".",$_FILES['pic4']['name']);
	$target = 'images/pic'.$ID.'4.'. end ($temp);
	$source = $_FILES ['pic4']['tmp_name'];
	copy ($source,$target);
		
	$qry='UPDATE  facility 
	SET pic3  = "'.$target.'"
	where  ID= "'.$ID.'";';
	$result=mysql_query($qry);
	}

if($_FILES['pic5']['error'] != 4)
		{
	$temp = explode(".",$_FILES['pic5']['name']);
	$target = 'images/pic'.$ID.'5.'. end ($temp);
	$source = $_FILES ['pic5']['tmp_name'];
	copy ($source,$target);
		
	$qry='UPDATE  facility 
	SET pic4  = "'.$target.'"
	where  ID= "'.$ID.'";';
	$result=mysql_query($qry);
	}
	
//print_r($_FILES); 
}
	  
	
	
	//Check whether the query was successful or not
	if($result) {
	
	header("location: editpage.php?status=1");
		}
	
	else header("location: editpage.php");
	
		?>