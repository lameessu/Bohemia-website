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
	$gname;
	$Myqry="SELECT * FROM facility WHERE ID=$ID";
	$Myresult=mysql_query($Myqry);
	while($Myrow = mysql_fetch_array($Myresult))
    	$Myrows[] = $Myrow;
	foreach($Myrows as $Myrow){ 
	$MyID = stripslashes($Myrow['ID']);
	$Myname = stripslashes($Myrow['name']);
	$Mydescription = stripslashes($Myrow['description']);
	$Mylocation = stripslashes($Myrow['location']);
	$Mywebsite = stripslashes($Myrow['website']);
	$Myphone = stripslashes($Myrow['phone']);
	$Mymap = stripslashes($Myrow['map']);
	$MyCID = stripslashes($Myrow['category_id']);
	
	$pic1 = stripslashes($Myrow['pic1']);
	$pic2 = stripslashes($Myrow['pic2']);
	$pic3 = stripslashes($Myrow['pic3']);
	$pic4 = stripslashes($Myrow['pic4']);
	$pic5 = stripslashes($Myrow['pic5']);
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Bohemia Hotels -  <?php echo $Myname;?></title>
<link rel="stylesheet" type="text/css" href="BohemiaCSS.css">
<link rel="stylesheet" type="text/css" href="starrating.css">
<link rel="stylesheet" type="text/css" href="Icon.css">

<meta charset="utf-8"/>
<meta name="description" content="Western Bohemia Hotels <?php echo $Myname;?>">
<meta name="keywords" content="Bohemia,Western,Eastern,Northern,Hotels">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="BohemiaJS.js" type="text/javascript"></script>



<style>
 .myerror{
    color:#ff0000;
	position: absolute;
	left: 40%;
        font-size:12pt;

}



    	ul{
		    padding-left: 0;
            padding-bottom:40px;
		}
		.gallery li {
			display: block;
			float: left;
                position:relative;
    left:27%;
	margin-top:3%;
margin-bottom: 6px;
			margin-right: 6px;
			width: 100px;
		}
		.gallery li img{
			height: 45px;
			width: 100px;
			max-width: 100px;

    }
    .gallery li:hover img {
opacity: 0.5 !important;
}
    </style>
    
    
    
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
  <a href="<?php echo $pre; ?>"><?php echo "$gname" ; ?> Bohemia</a> >

  <a ><?php echo $Myname;?></a>
</nav>

<div>
<div >
<h1><?php echo $Myname;?></h1>
</div>

<div>


<?php


	$qry2 ="SELECT AVG(rating) FROM comment WHERE facility_id=$ID";
	$result2=mysql_query($qry2);
	$row = mysql_fetch_array($result2);
	$row= round($row['AVG(rating)']);
	if ($row == 0){

	$qry3 ="SELECT photo FROM StarPicture where ID='3'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	else if ($row == 1){

	$qry3 ="SELECT photo FROM StarPicture where ID='4'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	else if ($row == 2){

	$qry3 ="SELECT photo FROM StarPicture where ID='5'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	else if ($row == 3){

	$qry3 ="SELECT photo FROM StarPicture where ID='6'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	echo '<img src="'.$row2['photo'].'">';
	
	$link= "map.php?ID=".$ID;

?>


<div id="info" >
<?php echo $Mylocation;?>
<span id="locLine">
–
</span>
 <a href="<?php echo $link;?>">Show map</a> 
</div>

</div>
        
<div >
<div class="icon icon-iphone">
    <div class="icon-iphone-rectangle-1"></div>
    <div class="icon-iphone-rectangle-2"></div>
    <div class="icon-iphone-rectangle-3"></div>
    <div class="icon-iphone-line"></div>
    <div class="icon-iphone-dot"></div>
    <span class="des"><?php echo $Myphone;?></span>
    <div class="icon icon-plasma" style="position: relative;left: 136px;top:-25px;">
    <div class="icon-plasma-rectangle"></div>
    <div class="icon-plasma-line-1"></div>
    <div class="icon-plasma-line-2"></div>
    <div class="icon-iphone-dot"></div>
    <span class="des">
    <a  target="_blank" href= "http://<?php echo $Mywebsite;?>">Hotel website</a> 
    </span>



</div>

</div>

<div >
<div id="Hotel1">
<img src="<?php echo $pic1;?>" alt="<?php echo $Myname;?>" id="ImageHotel">
<div id="LHolder">
<img src="images/arrowL1.png" alt="left arrow" class="LeftImg" onClick="slide(-1,<?php echo $MyID;?>)">
</div >
<div id="RHolder">
<img src="images/arrowR1.png" alt="right arrow" class="RightImg" onClick="slide(1,<?php echo $MyID;?>)">
</div >
<br>
</div>


<ul class="gallery" >
        <li> 
            <img src="<?php echo $pic1;?>" id="14" onClick="GFunction(<?php echo $MyID;?>)"/>
        </li>
        <li > 
            <img src="<?php echo $pic2;?>"  id="15" onClick="GFunction(<?php echo $MyID;?>)"/>
        </li>
        <li> 
            <img src="<?php echo $pic3;?>"  id="16" onClick="GFunction(<?php echo $MyID;?>)"/>
        </li>
        <li > 
            <img src="<?php echo $pic4;?>"  id="17" onClick="GFunction(<?php echo $MyID;?>)"/>
        </li>
                <li> 
            <img src="<?php echo $pic5;?>"  id="18" onClick="GFunction(<?php echo $MyID;?>)"/>
        </li>
    </ul>

<script  type="text/javascript">


var inc =1;
var x=0;
var ma;
var mi;

var count=0;

$(document).ready(function(){
      $(".RightImg").hide();
    $(".LeftImg").hide();
    
  $("#Hotel1").mouseover(function(){
  $(".RightImg").show();
    $(".LeftImg").show();

});
  $("#Hotel1").mouseout(function(){
  $(".RightImg").hide();
    $(".LeftImg").hide();

});
  });
  
  function GFunction (pic){
	inc=parseInt(pic.substring(3,4));
	document.write(inc);
    Image = document.getElementById('ImageHotel');
     slideOne ();
      }
  function slide (num,id){
if (count ==0){
	mi = id+"1";
	inc = parseInt(mi);
	ma= inc+4;
count ++;}
	x=x+num;

    Image = document.getElementById('ImageHotel');
    inc =parseInt(mi)+x;


     slideOne ();
     
  }
function slideOne (){
$(function () {
    $("#ImageHotel").fadeToggle(250);
    });
        setTimeout(slideTwo, 250);
        }

    function slideTwo (){
            $(function () {
    $("#ImageHotel").fadeToggle(250);
    });
        if(inc > ma){inc =ma;x=0; }
else if (inc <mi) {inc =mi;x=0;}
    Image.src= "pic"+inc.toString()+".jpg";


        }
</script>
<span id="rag"></span>
<div id="Hotel2">

<div  style="font-size:12pt;clear:both;margin-bottom:1.0em;margin-top:3em">

<span>
<?php echo $Mydescription;?>
</span>

</div>

</div>
</div>
</div>


<hr class="HRline">


<div id="comment" style="list-style-type: none;">
<ul>
<li>




<?php

$query_select = "SELECT * FROM comment  WHERE facility_id=$ID ORDER BY ID DESC";
$result_select = mysql_query($query_select) or die(mysql_error());
$rows = array();
while($row = mysql_fetch_array($result_select))
    $rows[] = $row;
foreach($rows as $row){ 
    $name = stripslashes($row['name']);
    $email = stripcslashes($row['email']);
    $title = stripslashes($row['title']);
    $body = stripslashes($row['body']);
    $rating = stripslashes($row['rating']);
    $date = stripslashes($row['date']);

	if ($rating == 0){

	$qry3 ="SELECT photo FROM StarPicture where ID='3'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	else if ($rating == 1){

	$qry3 ="SELECT photo FROM StarPicture where ID='4'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	else if ($rating == 2){

	$qry3 ="SELECT photo FROM StarPicture where ID='5'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
	else if ($rating == 3){

	$qry3 ="SELECT photo FROM StarPicture where ID='6'";
	$result3=mysql_query($qry3);
	$row2 = mysql_fetch_array($result3);	
		}
		
	
	echo '<img src="'.$row2['photo'].'">';
	echo "<span id='titleComment'>".$row['title']."</span><br>"; 
	echo "</li><li><span id='ComCont'>".$row['body']."</span><br>";
	echo "</li><li><span class='ComDet'>".$row['name']."<br>";
	echo "Reviewed: ".$row['date']."</span></li></ul>";
	echo "<hr class='line'>";
}

?>




</div>



<div id="ReviewBox" >
<?php $newlink ="AddComment.php?ID=".$ID ;?>

<form method = "post" name="WriteReview" id="WriteReview" action="<?php echo $newlink;?>">
<div style="width:100% ">
<ul id="colReview">
<li>
<label id="colReview">Write a review:</label>
 </li>
<li>
<label for="name" id="colReview">Name:</label>
 <input tabindex = "1" type="text" name="name" placeholder="e.g. Sarah Ahmed" class="inMyForm" id="name">
 <span class = "myerror" id = "nameErr"></span></li>
<li>
<label for="email"id="colReview">Email:</label>
<input tabindex = "2" type="text" name="email" placeholder="e.g. EmailName@EmailService.com" class="inMyForm" id="email">
<span class = "myerror" id = "emailErr"></span></li>
<li>
<label for="title"id="colReview">Review title:</label>
<input tabindex = "3" type="text" name="title" class="inMyForm" id="title">
<span class = "myerror" id = "titleErr"></span></li>

<li>
<label for="textareaMyForm">Review:</label>
<span style="color:#ff0000" id = "textErr"></span></li>

</ul>
</div>

<textarea tabindex = "4" class="inMyForm" id="textareaMyForm" name="textareaMyForm" placeholder = "Enter your review here ..."></textarea>
<div>

<br />
<input tabindex = "5" name ="Submit" type="button" value="Submit" id="sub" onclick="validateForm()"/>
<div id="star">
<span style=" font-size:12pt;margin-left:22px;">
Rating:
</span>
<div class="starRating" name="starR" id="starR">
  <div>
  <div>
            <input id="rating111111" type="radio" name="rating" value="1">
          <label for="rating111111"><span>1</span></label>
        </div>
        <input id="rating222222" type="radio" name="rating" value="2">
        <label for="rating222222"><span>2</span></label>
      </div>
      <input id="rating333333" type="radio" name="rating" value="3">
      <label for="rating333333"><span>3</span></label>
    </div>
</div>
<span style="margin-left:56px;color:#ff0000" id="ratingErr"></span>
</form>

</div>

</div>

<script>
function validateForm() {
var name = document.getElementById('name').value;
var email = document.getElementById('email').value;
var title = document.getElementById('title').value;
var textareaMyForm = document.getElementById('textareaMyForm').value;
var starR = document.getElementById('starR').value;
var nametext = "";
if (name.length==0)
    {
        nametext += "Please provide your name!";
        }
else if (name.length > 35)
    {
                nametext += "Username length must not exceed 32 characters!</br>" ;
}

document.getElementById("nameErr").innerHTML=nametext;
var mailtext ="";
var filter = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;

if (email.length==0) 
{
    mailtext += "Please provide your email!";
}
else if (!filter.test(email))
{
    mailtext += "Please provide a valid email address";
}

document.getElementById("emailErr").innerHTML=mailtext;

var titletext=""
if (title.length==0){
    titletext+="Please provide a title!";
    }
document.getElementById("titleErr").innerHTML=titletext;

var texttext=""
if (textareaMyForm.length==0){
    texttext+="Please provide a text!";
}
else if (textareaMyForm.length<10){
        texttext+="Please provide a longer text!";
    }
document.getElementById("textErr").innerHTML=texttext;
var ontext="";
if(!(document.getElementById('rating111111').checked || document.getElementById('rating222222').checked || document.getElementById('rating333333').checked )) {
ontext="Please rate!";
}

document.getElementById("ratingErr").innerHTML=ontext;


   if (ontext.length > 0 ||texttext.length >0 || titletext.length >0|| mailtext.length>0 || nametext.length > 0)
   {
 return false;}
 else {

    document.getElementById("WriteReview").submit();
 }
} 
</script>



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