	<?php

	$DB_HOST = 'localhost';
    $DB_USER = 'bohemia_bohemia';
    $DB_PASSWORD = 'l1m2s3';
    $DB_DATABASE = 'bohemia_bohemia';

	$ID=$_GET['ID'];
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
	$qry="SELECT * FROM catagory WHERE ID =$ID";
	$result=mysql_query($qry);
	while($row = mysql_fetch_array($result))
    	$rows[] = $row;
	if (is_array($rows)) {
	foreach($rows as $row){ 
	$name = stripslashes($row['name']);
    	$description = stripcslashes($row['description']);}}
	?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bohemia Hotels - <?php echo$name; ?> Bohemia</title>
<link rel="stylesheet" type="text/css" href="BohemiaCSS.css">
<link rel="stylesheet" type="text/css" href="starrating.css">
<meta charset="utf-8"/>
<meta name="description" content="<?php echo$name; ?> Bohemia Hotels">
<meta name="keywords" content="Bohemia,Western,Eastern,Northern,Hotels">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="BohemiaJS.js" type="text/javascript"></script>

</head>

<body >
<div class = "wrapper">


<div id = "header-wrapper" >

<div id = "header" class = "container">
 <a href="index.php"><img  id = "logo" src="images/logo2.png" alt="Bohemia logo" ></a>
 
 <form id = "search" action="http://www.google.com/search" method="get" onSubmit="Gsitesearch(this)">
 <input name="q" type="hidden" />
 <input id="searctextbox" type="text" name="qfront" accesskey="i"   size = "30"/>
 <input id = "searchimage" type="image" src="images/search%20icon.png" accesskey="s"  value = "search" alt="search" width="20" height="20" />
</form>

</div>


<div id = "menu" class = "container">
<ul>
  <li><a href="index.php" accesskey="1" >Home</a></li>
<?php
	$qry2="SELECT * FROM catagory";
	$result2=mysql_query($qry2);
	while($row2 = mysql_fetch_array($result2))
    	$rows2[] = $row2;
	foreach($rows2 as $row2){ 
	$ID2 = stripslashes($row2['ID']);
	$name2 = stripslashes($row2['name']);
    	$description2 = stripcslashes($row2['description']);
	$link_address = "catagory.php?ID=".$ID2; ?>

 <li><a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" ><?php echo $name2 ; ?></a></li>

<?php



	}
?>
  <li><a href="aboutus.php"  accesskey="6">About us</a></li>
</ul>
</div>

</div>
<div  id = "content" class = "container">
<nav class = "breadcrumbs">
  <a href="index.php">Home</a> >
  <a ><?php echo $name ; ?> Bohemia</a>
</nav>
<div>

<div>
<h2><?php echo $name ; ?> Bohemia</h2> 
</div>

<div id="RegionDescription" >
<?php echo $description ; ?> 
</div>

<?php
	$count = 3;//
	$var = 1;
	$qry3="SELECT * FROM facility WHERE category_id =$ID";
	$result3=mysql_query($qry3);
	
	for($n=0;$n <4 ;$n++){//
	while($row3 = mysql_fetch_array($result3))
	$rows3[]=$row3;
	if (isset($rows3))
	if (is_array($rows3)) {
	foreach($rows3 as $row3){
	$ID3 = stripslashes($row3['ID']);
	$name3 = stripslashes($row3['name']);
    	$location = stripcslashes($row3['location']);
	$profile_image = stripcslashes($row3['profile_image']);
	$link_address = "HotelPage.php?ID=".$ID3;
	
	

	$qry4 ="SELECT AVG(rating) FROM comment WHERE facility_id=$ID3";
	$result4=mysql_query($qry4);
	$row4 = mysql_fetch_array($result4);
	$row4= round($row4['AVG(rating)']);

	if ($count == $row4){//
	if ($row4 == 0){

	$qry5 ="SELECT photo FROM StarPicture where ID='3'";
	$result5=mysql_query($qry5);
	$row5 = mysql_fetch_array($result5);	
		}
	else if ($row4 == 1){

	$qry5 ="SELECT photo FROM StarPicture where ID='4'";
	$result5=mysql_query($qry5);
	$row5 = mysql_fetch_array($result5);	
		}
	else if ($row4 == 2){

	$qry5 ="SELECT photo FROM StarPicture where ID='5'";
	$result5=mysql_query($qry5);
	$row5 = mysql_fetch_array($result5);	
		}
	else if ($row4 == 3){

	$qry5 ="SELECT photo FROM StarPicture where ID='6'";
	$result5=mysql_query($qry5);
	$row5 = mysql_fetch_array($result5);	
		}


	
?>


<?php

	if ($var ++ == 1) {

?>

<div>
<div>
<a href="<?php echo $link_address;?>" ><img class = "HotelPic" src="<?php echo $profile_image; ?>" alt="<?php echo $name3; ?>"></a>
</div>
<div>
<a class="Hoteltitle" tabindex = "1" href="<?php echo $link_address;?>"><?php echo $name3; ?></a>
<br>
<div>
<span>
Stars:
</span>
<?php	echo '<img src="'.$row5['photo'].'">';?>
</div>
<div>
<span>
Location:<?php echo $location;?>
</span>
</div>
<div>
<a  class="More" href="<?php echo $link_address;?>">More ...</a>
</div>
</div>
</div>

<?php
} else {
?>

<div class="HotelBox">
<div>
<a href="<?php echo $link_address;?>" ><img class = "HotelPic" src="<?php echo $profile_image; ?>" alt="Hotel <?php echo $name3; ?>"></a>
</div>
<div>
<a class="Hoteltitle" tabindex = "2" href="<?php echo $link_address;?>"><?php echo $name3; ?></a>
<br>
<div>
<span>
Stars:
</span>
<?php	echo '<img src="'.$row5['photo'].'">';?>
<div>
<span>
Location:<?php echo $location; ?>
</span>
</div>
<div>
<a  class="More" href="<?php echo $link_address;?>">More ...</a>
</div>
</div>

</div>

</div>

<?php
	}}}}
	$count --;
}
?>


</div>
</div>

<div class = "footer">

<div id="share-buttons">
 
<!-- Facebook -->
<a href="http://www.facebook.com/sharer.php?u=http://www.bohemia.ksuit.net"  accesskey="b" target="_blank"><img src="images/share/facebook.png" alt="Facebook" /></a>
 
<!-- Twitter -->
<a href="http://twitter.com/share?url=http://www.bohemia.ksuit.net" accesskey="t" target="_blank"><img src="images/share/twitter.png" alt="Twitter" /></a>
 
<!-- Google+ -->
<a href="https://plus.google.com/share?url=http://www.bohemia.ksuit.net" accesskey="g" target="_blank"><img src="images/share/google.png" alt="Google" /></a>
 
<!-- Digg -->
<a href="http://www.digg.com/submit?url=http://www.bohemia.ksuit.net" accesskey="t" target="_blank"><img src="images/share/diggit.png" alt="Digg" /></a>
 
<!-- Reddit -->
<a href="http://reddit.com/submit?url=http://www.bohemia.ksuit.net" accesskey="r" target="_blank"><img src="images/share/reddit.png" alt="Reddit" /></a>
 
<!-- LinkedIn -->
<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http://www.bohemia.ksuit.net" accesskey="l" target="_blank"><img src="images/share/linkedin.png" alt="LinkedIn" /></a>
 
<!-- Pinterest -->
<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());"><img src="images/share/pinterest.png" accesskey="p" alt="Pinterest" /></a>
 
<!-- StumbleUpon-->
<a href="http://www.stumbleupon.com/submit?url=http://www.bohemia.ksuit.net&amp;title=Bohemia%20Hotels" target="_blank"><img src="images/share/stumbleupon.png" accesskey="u" alt="StumbleUpon" /></a>
 
<!-- Email -->
<a href="mailto:?Subject=Bohemia%20Hotels&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20http://www.bohemia.ksuit.net"><img src="images/share/email.png" accesskey="m" alt="Email" /></a>
 
</div>

<p>
<a href = "contactus.php" accesskey="7">Contact us</a>
    		 &nbsp;	 | &nbsp;	
<a href = "sitemap.php" accesskey="8">Site map</a>
 &nbsp;	 | &nbsp;	
<a href = "loginpage.php" accesskey="9">Admin login</a>
<br/>
Copyright &copy; 2014</p>

</div>


</body>

</html>