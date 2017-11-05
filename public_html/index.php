<?php


		$DB_HOST = 'localhost';
    $DB_USER = 'bohemia_bohemia';
    $DB_PASSWORD = 'l1m2s3';
    $DB_DATABASE = 'bohemia_bohemia';


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
	$qry="SELECT * FROM catagory";
	$result=mysql_query($qry) or die(mysql_error());
	$result2=mysql_query($qry) or die(mysql_error());

	$rows = array();
	$row2 = array();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Bohemia Hotels </title>
<link rel="stylesheet" type="text/css" href="BohemiaCSS.css">
 <script src="BohemiaJS.js" type="text/javascript"></script>

	
<meta charset="utf-8"/>
<meta name="description" content="Bohemia Hotels Home Page">
<meta name="keywords" content="Bohemia,Western,Eastern,Northern,Hotels">

<link rel="stylesheet"  href="lightSlider.css"/>


    	 
  
	
	 <style>
    	ul{
			list-style: none outside none;
		    padding-left: 0;
		}
		.content-slider li{
		    background-color: #ed3020;
		    text-align: center;
		    color: #FFF;
		}
		.content-slider h3 {
		    margin: 0;
		    padding: 70px 0;
		}
		.demo{
			width: 800px;
		}
		
		@media (max-width: 768px) {
    .item { width:768px; }}
	
    </style>
	
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="jquery.lightSlider.js"></script> 

	 <script>
		
	$(document).ready(function() {
    var autoplaySlider = $('#lightSlider').lightSlider({
        auto:true,
        loop:true,
		 keyPress:true,
		  autoWidth:true, 
		  });
    $('#lightSlider').parent().on('mouseenter',function(){
        autoplaySlider.pause();
    });
    $('#lightSlider').parent().on('mouseleave',function(){
        autoplaySlider.play();
    });

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
	while($row = mysql_fetch_array($result))
    	$rows[] = $row;
	foreach($rows as $row){ 
	$ID = stripslashes($row['ID']);
    	$name = stripcslashes($row['name']);
    	$description = stripcslashes($row['description']);

	$link_address = "catagory.php?ID=".$ID; ?>
 	<li><a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" ><?php echo $name ; ?></a></li>
<?php


	}
?>
  <li><a href="aboutus.php"  accesskey="6">About us</a></li>
</ul>
</div>

</div>




<div  id ="content" class = "container">

 <!--<img class= "image " src="images/banner.jpg" alt="A panoramic picture of Bohemia"  >-->

<ul id="lightSlider">
  <li >
     <img class= "item " src="images/banner.jpg" alt="A panoramic picture of Bohemia"  >
  </li>
  
  <li>
     <img class= "item"  src="images/Slide/s1.jpg" alt="A panoramic picture of Bohemia"  >
  </li>
  
    <li>
     <img class= "item" src="images/Slide/s2.jpg" alt="A panoramic picture of Bohemia"  >
  </li>
    <li>
     <img class= "item" src="images/Slide/s3.jpg" alt="A panoramic picture of Bohemia"  >
  </li>
    <li>
     <img class= "item" src="images/Slide/s4.jpg" alt="A panoramic picture of Bohemia"  >
  </li>
 
</ul>


	
	
 <h2> Top destinations </h2>

     <div class="colmid">

        <div class="colin">

            <div class="colleft">

                <div class="col1">
              <?php  
              $row = mysql_fetch_array($result2);
     echo' 	<h3>'.$row['name'].' Bohemia</h3>
					   <img class= "colimg " src="images/west.jpg" alt="Western Bohemia"  >
					   <p>'.$row['description'].' </p><br/>';
$link_address = "catagory.php?ID=".$row['ID']; ?>
<a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" >Find Hotels in <?php echo "".$row['name'] ;?> Bohemia</a>

                </div>

                  <div class="col2">
              <?php  
              $row = mysql_fetch_array($result2);
     echo' 	<h3>'.$row['name'].' Bohemia</h3>
					   <img class= "colimg " src="images/east.jpg" alt="A side view of Trosky Castle Ruins in Eastern Bohemia "  >
					   <p>'.$row['description'].' </p><br/>';
$link_address = "catagory.php?ID=".$row['ID']; ?>
<a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" >Find Hotels in <?php echo "".$row['name'] ;?> Bohemia</a>

                </div>
                

                 <div class="col3">
              <?php  
              $row = mysql_fetch_array($result2);
     echo' 	<h3>'.$row['name'].' Bohemia</h3>
					   <img class= "colimg " src="images/north.jpg" alt="A view from The Czech Switzerland National Park in Northern Bohemia">
					   <p>'.$row['description'].' </p><br/>';
$link_address = "catagory.php?ID=".$row['ID']; ?>
<a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" >Find Hotels in <?php echo "".$row['name'] ;?> Bohemia</a>

                </div>
				
				
				    <div class="col4">
              <?php  
              $row = mysql_fetch_array($result2);
     echo' 	<h3>'.$row['name'].' Bohemia</h3>
					   <img class= "colimg " src="images/south.jpg" alt="Cesky Krumlov Castle in Southern Bohemia">
					   <p>'.$row['description'].' </p><br/>';
$link_address = "catagory.php?ID=".$row['ID']; ?>
<a href="<?php echo $link_address;?>" accesskey="<?php echo (int)$link_address+1 ; ?>" >Find Hotels in <?php echo "".$row['name'] ;?> Bohemia</a>

                </div>
                
            </div>

        </div>

 

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
</div>
</body>

</html>