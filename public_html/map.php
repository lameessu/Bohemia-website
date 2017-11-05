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
	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bohemia Hotels - Map</title>
<link rel="stylesheet" type="text/css" href="BohemiaCSS.css">
<meta charset="utf-8"/>
<meta name="description" content="Bohemia Hotels Contact us">
<meta name="keywords" content="Bohemia,Western,Eastern,Northern,Hotels,contact,us">
<script src="BohemiaJS.js" type="text/javascript"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?">
    </script>
      <script type="text/javascript">
      $(".fancybox").fancybox({
    type: "iframe"
});
    </script>

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
	$gname;

	//Create query
	$qry1="SELECT * FROM facility WHERE ID=$ID";
	$result1=mysql_query($qry1);
	while($row1 = mysql_fetch_array($result1))
    	$rows1[] = $row1;
	foreach($rows1 as $row1){ 
	$name1 = stripslashes($row1['name']);
	$map1 = stripslashes($row1['map']);
	$cid =stripslashes($row1['category_id']);

	}

	$qry2="SELECT * FROM catagory";
	$result2=mysql_query($qry2);
	while($row2 = mysql_fetch_array($result2))
    	$rows2[] = $row2;
	foreach($rows2 as $row2){ 
	$ID2 = stripslashes($row2['ID']);
	$name2 = stripslashes($row2['name']);
	if ($ID2 == $cid ){
	$gname= $name2;
	}
    	$description2 = stripcslashes($row2['description']);
	$link_address = "catagory.php?ID=".$ID2; ?>

 <li><a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" ><?php echo $name2 ; ?></a></li>

<?php

	}
	$link_addressH = "HotelPage.php?ID=".$ID;
	$link_addressHH = "catagory.php?ID=".$cid;
?>

  <li><a href="aboutus.html"  accesskey="6">About us</a></li>
</ul>
</div>

</div>




<div  id ="content" class = "container">

<nav class = "breadcrumbs">
  <a href="index.php">Home</a> >
  <a href="<?php echo $link_addressHH;?>"><?php echo $gname;?> Bohemia</a> >
<a href="<?php echo $link_addressH;?>"><?php echo $name1;?></a> >

  <a >map</a>
</nav>


<h2>Map</h2> 

<div id="map-canvas"></div>

<iframe src="<?php echo $map1;?>" width="100%" height="450" frameborder="0" style="border:0;margin-bottom:70px"></iframe>

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
<a href = "contactus.html" accesskey="7">Contact us</a>
    		 &nbsp;	 | &nbsp;	
<a href = "sitemap.php" accesskey="8">Site map</a>
 &nbsp;	 | &nbsp;	
<a href = "loginpage.php" accesskey="9">Admin login</a>
<br/>
Copyright &copy; 2014</p>

</div>
</div>
</body>

</html>
