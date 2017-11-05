function Gsitesearch(curobj){

// Google Internal Site Search script- By JavaScriptKit.com (http://www.javascriptkit.com)
// For this and over 400+ free scripts, visit JavaScript Kit- http://www.javascriptkit.com/
// This notice must stay intact for use

//Enter domain of site to search.



var domainroot="http://bohemia.ksuit.net"
curobj.q.value="site:"+domainroot+" "+curobj.qfront.value
}



function onFileSelected(event) {
  var selectedFile = event.target.files[0];
  var reader = new FileReader();

  var imgtag;
if(event.target.name == "pic1")
  imgtag = document.getElementById("image1");
  else if(event.target.name == "pic2")
    imgtag = document.getElementById("image2");
else if(event.target.name == "pic3")
    imgtag = document.getElementById("image3");
else if(event.target.name == "pic4")
    imgtag = document.getElementById("image4");
else if(event.target.name == "pic5")
    imgtag = document.getElementById("image5");
	else if(event.target.name == "pic6")
    imgtag = document.getElementById("image6");
  imgtag.title = selectedFile.name;

  reader.onload = function(event ) {
    imgtag.src = event.target.result;
  };

  reader.readAsDataURL(selectedFile);
}

function validatelogin()
{
    var errorString = '';
   if( document.login.username.value == "" )
   {
      errorString  += "Please provide your username!</br>" ;
     document.login.username.style.background = '#FFBABA' ;

   }
   else if ( document.login.username.value.length > 32)
    {
      errorString  += "Username length must not exceed 32 characters!</br>" ;
     document.login.username.style.background = '#FFBABA' ;

   }
   else      document.login.username.style.background = "LightGreen" ;

    if( document.login.password.value == "" )
   {
      errorString +="Please provide your password!" ;
     document.login.password.style.background = '#FFBABA' ;
    
   }
   
   else if ( document.login.password.value.length > 32 || (document.login.password.value.length < 6 & document.login.password.value.length != 0))
    {
      errorString  += "Password length must be between 6 and 32 characters long!</br>" ;
     document.login.username.style.background = "Pink" ;
   }
   else      document.login.username.style.background = "LightGreen" ;

   
   
   if (errorString.length > 0)
   {document.getElementById("errorMessage").innerHTML=  errorString;
      		  document.getElementById('errorMessage').className="error";

 return false;}
 else
 return true;
   }
  //////////////////////////////////////////////////////////////// 
   function validateAddForm()
   {

       var errormsg = '';
     if( document.HotelForm.HotelName.value == "" )
   {
      errormsg  += "**Please provide the hotel name !</br>" ;
   //  document.HotelForm.HotelName.focus() ;
	     document.HotelForm.HotelName.style.background = '#FFBABA' ;

   }
   else 	     document.HotelForm.HotelName.style.background = "LightGreen" ;

   
   
   
      if( document.HotelForm.description.value == " " )
   {
      errormsg  += "**Please provide a description of the hotel !</br>" ;
     document.HotelForm.description.style.background = '#FFBABA' ;
	
   }
   else      document.HotelForm.description.style.background = "LightGreen" ;

   
 
      if( document.HotelForm.location.value == " " )
   {
      errormsg  += "**Please provide a location of the hotel !</br>" ;
     document.HotelForm.location.style.background = '#FFBABA' ;
	
   }
   else      document.HotelForm.location.style.background = "LightGreen" ;

   

        if( document.HotelForm.website.value == "" )
   {
      errormsg  += "**Please provide a website of the hotel !</br>" ;
     document.HotelForm.website.style.background = '#FFBABA' ;
	
   } 
   else { 
   var flag = validateWebsite(document.HotelForm.website.value);
   if (!flag) {
         errormsg  += "**Please provide a (suitable) website of the hotel !</br>" ;
     document.HotelForm.website.style.background = '#FFBABA' ;}
else      
document.HotelForm.website.style.background = "LightGreen" ;

   }
  
   
   



		 
		 
     if( document.HotelForm.Phone.value == "" )
   {
      errormsg  += "**Please provide a phone number of the hotel !</br>" ;
    document.HotelForm.Phone.style.background = '#FFBABA' ;
	
   } 
 
   
   else {
  var flag = validatePhone(document.HotelForm.Phone.value);
  if (flag == false){
        errormsg  += "**Please provide a suitable phone number of the hotel !</br>" ;
      document.HotelForm.Phone.style.background = '#FFBABA' ;


   }
   else     document.HotelForm.Phone.style.background = "LightGreen" ;

   }
   
        if( document.HotelForm.map.value == "" )
   {
      errormsg  += "**Please provide a map link for the hotel !</br>" ;
     document.HotelForm.map.style.background = '#FFBABA' ;
	
   } 
else      
document.HotelForm.map.style.background = "LightGreen" ;

   
   
   var region = document.getElementsByName('region');
   var bool = false ;
   for (var i=0 ; i<region.length ; i++){
   if (region[i].checked) {
   bool = true;
   break ;
   } }
   
   if ( bool == false )
           errormsg  += "**Please choose a region for the hotel !</br>" ;

		   

 
  {   var fileInsert1 = document.getElementById("pic1").value;
var fileInsert2 = document.getElementById("pic2").value;
var fileInsert3 = document.getElementById("pic3").value;
var fileInsert4 = document.getElementById("pic4").value;
var fileInsert5 = document.getElementById("pic5").value;
var fileInsert6 = document.getElementById("pic6").value;

    if (!fileInsert1 || !fileInsert2 || !fileInsert3 || !fileInsert4 || !fileInsert5 || !fileInsert6 )
         errormsg  += "**Please provide 6 pictures of the hotel !</br>";
		 }  

		
    if (errormsg.length > 0)
	
   {
   		  document.getElementById('errorMessage').className="error";
		      //document.getElementById("imageee").style.visibility = "visible";  

document.getElementById("errorMessage").innerHTML=  errormsg;

 return false;}
 else
 return true;
   
   }
   
   
   
   
   function validateWebsite(web) 
{
    var pattern = /www.\S+/;
    return pattern.test(web);
}

   function validatePhone(phone) 
{
    var pattern = /\d{12}/ ;
    return pattern.test(phone);
}
/////////////////////////////////////////////////////////////

  function validateEditForm()
   {

       var errormsg = '';
     if( document.HotelForm.HotelName.value == "" )
   {
      errormsg  += "**Please provide the hotel name !</br>" ;
   //  document.HotelForm.HotelName.focus() ;
	     document.HotelForm.HotelName.style.background = '#FFBABA' ;

   }
   else 	     document.HotelForm.HotelName.style.background = "LightGreen" ;

   
   
   
      if( document.HotelForm.description.value == " " )
   {
      errormsg  += "**Please provide a description of the hotel !</br>" ;
     document.HotelForm.description.style.background = '#FFBABA' ;
	
   }
   else      document.HotelForm.description.style.background = "LightGreen" ;

   
 
      if( document.HotelForm.location.value == " " )
   {
      errormsg  += "**Please provide a location of the hotel !</br>" ;
     document.HotelForm.location.style.background = '#FFBABA' ;
	
   }
   else      document.HotelForm.location.style.background = "LightGreen" ;

   

        if( document.HotelForm.website.value == "" )
   {
      errormsg  += "**Please provide a website of the hotel !</br>" ;
     document.HotelForm.website.style.background = '#FFBABA' ;
	
   } 
   else { 
   var flag = validateWebsite(document.HotelForm.website.value);
   if (!flag) {
         errormsg  += "**Please provide a (suitable) website of the hotel !</br>" ;
     document.HotelForm.website.style.background = '#FFBABA' ;}
else      
document.HotelForm.website.style.background = "LightGreen" ;

   }
  
   
   



		 
		 
     if( document.HotelForm.Phone.value == "" )
   {
      errormsg  += "**Please provide a phone number of the hotel !</br>" ;
    document.HotelForm.Phone.style.background = '#FFBABA' ;
	
   } 
 
   
   else {
  var flag = validatePhone(document.HotelForm.Phone.value);
  if (flag == false){
        errormsg  += "**Please provide a suitable phone number of the hotel !</br>" ;
      document.HotelForm.Phone.style.background = '#FFBABA' ;


   }
   else     document.HotelForm.Phone.style.background = "LightGreen" ;

   }
   
        if( document.HotelForm.map.value == "" )
   {
      errormsg  += "**Please provide a map link for the hotel !</br>" ;
     document.HotelForm.map.style.background = '#FFBABA' ;
	
   } 
else      
document.HotelForm.map.style.background = "LightGreen" ;

   
   
   var region = document.getElementsByName('region');
   var bool = false ;
   for (var i=0 ; i<region.length ; i++){
   if (region[i].checked) {
   bool = true;
   break ;
   } }
   
   if ( bool == false )
           errormsg  += "**Please choose a region for the hotel !</br>" ;



		
    if (errormsg.length > 0)
	
   {
   		  document.getElementById('errorMessage').className="error";
		      //document.getElementById("imageee").style.visibility = "visible";  

document.getElementById("errorMessage").innerHTML=  errormsg;

 return false;}
 else
 return true;
   
   }
////////////////////////////////////////////////////
function deleteForm (){


   var errormsg = '';

   var Hotels= document.getElementsByName('op[]');
   var check = false ;
   for (var i=0 ; i<Hotels.length ; i++){
   if (Hotels[i].checked) {
   check = true;
   break ;}
    }
   
   if ( !check )
   errormsg  = "**Please choose a hotel to delete !</br>" ;
           
         if (errormsg.length > 0)
	
   {  document.getElementById('errorMessage').className="error";
	 //document.getElementById("imageee").style.visibility = "visible";  
document.getElementById("errorMessage").innerHTML=  errormsg;

 return false;}
 else
 return true;
   
   }