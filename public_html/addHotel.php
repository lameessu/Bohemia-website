<?php
//Authenticate the user:
	//Start session
	session_start();
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['MEMBER_ID'])) {
		header("location: loginpage.php");
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
	$name = $_POST['HotelName'];
	$description = $_POST['description'];
	$location = $_POST['location'];
	$website = $_POST['website'];
	$phone = $_POST['Phone'];
	$map = $_POST['map'];
	$region = $_POST['region'];

	$query = mysql_query("SELECT MAX(id) FROM `facility`");
	$results = mysql_fetch_array($query);
	$ID = $results['MAX(id)'] + 1;

	$temp = explode(".",$_FILES['pic1']['name']);
	$target = 'images/pic'.$ID.'0.'. end ($temp);
	$source = $_FILES ['pic1']['tmp_name'];
	copy ($source,$target);
	 
	   $temp = explode(".",$_FILES['pic2']['name']);
	$target1 = 'images/pic'.$ID.'1.'. end ($temp);
	$source = $_FILES ['pic1']['tmp_name'];
	copy ($source,$target1);
	
        $temp = explode(".",$_FILES['pic3']['name']);
	$target2 = 'images/pic'.$ID.'2.'. end ($temp);
	$source = $_FILES ['pic2']['tmp_name'];
	copy ($source,$target2);
		
        $temp = explode(".",$_FILES['pic4']['name']);
	$target3 = 'images/pic'.$ID.'3.'. end ($temp);
	$source = $_FILES ['pic3']['tmp_name'];
	copy ($source,$target3);
		
	$temp = explode(".",$_FILES['pic5']['name']);
	$target4 = 'images/pic'.$ID.'4.'. end ($temp);
	$source = $_FILES ['pic4']['tmp_name'];
	copy ($source,$target4);
		

	$temp = explode(".",$_FILES['pic6']['name']);
	$target5 = 'images/pic'.$ID.'5.'. end ($temp);
	$source = $_FILES ['pic5']['tmp_name'];
	copy ($source,$target5);
	
	//Create query
	$qry="INSERT INTO facility (name , description , location , website , phone , profile_image , pic1 , pic2 , pic3 , pic4 ,pic5 , map , category_id )VALUES('$name' , '$description' , '$location' ,'$website' , '$phone' ,'$target','$targe1' ,'$target2' ,'$target3' ,'$target4' ,'$target5', '$map' , '$region');";
	$result=mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
			header("location: addpage.php?status=1");
		}
		else echo "There was an error when inserting hotel.";
		?>
		
		</p>
		</body>
		</html>
	
	