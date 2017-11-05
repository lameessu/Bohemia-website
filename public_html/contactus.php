<?php




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

	
	?>
	
<!DOCTYPE HTML>
<html>
<head>
<title>Bohemia Hotels - Contact us</title>
<link rel="stylesheet" type="text/css" href="BohemiaCSS.css">
<meta charset="utf-8"/>
<meta name="description" content="Bohemia Hotels Contact us">
<meta name="keywords" content="Bohemia,Western,Eastern,Northern,Hotels,contact,us">
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

	
	$qry1="SELECT * FROM catagory";
	$result1=mysql_query($qry1);
	while($row1 = mysql_fetch_array($result1))
    	$rows1[] = $row1;
	foreach($rows1 as $row1){ 
	$ID1 = stripslashes($row1['ID']);
	$name1 = stripslashes($row1['name']);
	if ($ID1 == $MyCID){
	$gname= $name1;
	}
	$link_address1 = "catagory.php?ID=".$ID1; ?>

 <li><a href="<?php echo $link_address1;?>" accesskey="<?php echo (int)$link_address1+1 ; ?>" ><?php echo $name1 ; ?></a></li>

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
<?php $pre="catagory.php?ID=".$MyCID;?>


  <a >Contact Us</a>
</nav>


<h2> Contact Us</h2> 
<p>
Thank you for your interest in Bohemia..</p>

<ul id = "contact">
<li>Tel: 4453325 </li> 
<li>Fax: 2134 </li> 
<li> Email: Bohemia@hmotmail.com</li>
</ul>
</div>


<div class = "footer" id ="smallfooter">

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
</div>
</body>

</html>