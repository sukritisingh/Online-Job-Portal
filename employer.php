<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$conn= mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['username']))
{
$username= $_POST['username'];
$password= $_POST['password'];
$sql="INSERT INTO employer( `Email`, `Password`) VALUES ('$username','$password')";
$res = mysql_query($sql);
if(! $res )
{
  die('Could not enter data: ' . mysql_error());
}   
else{
	echo "Entered data successfully\n";
}
}

?>
<!doctype html>
<html lang=''>
<head>
   <link rel="stylesheet" href="styles.css">
   <script >
function ValidateEmail()  
{  var t = document.getElementById("id2");
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(t.value.match(mailformat))  
{  
var w = document.getElementById("f1");

 w.innerHTML=" ";
}  
else  
{  
 var y = document.getElementById("f1");
y.innerHTML="You have entered an invalid email address!";  
document.form1.text1.focus();  
 
}  
} 
function CheckPassword(inputtxt)   
{   
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;  
if(inputtxt.value.match(passw))   
{   
var y = document.getElementById("f2");
y.innerHTML=" ";  
}  
else  
{   
var r = document.getElementById("f2");
r.innerHTML="Please try another password";  
}  
}  
   </script>
   <title>JobSeeker</title>
   <style>
.error {color: #FF0000;}
</style>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class=' has-sub'><a href='#'><span>Sign-Up</span></a>
      <ul>
         <li class='has-sub'><a href='jseeker.php'><span>Job-Seeker</span></a>
            
         </li>
         <li class='has-sub'><a href='employer.php'><span>Employer</span></a>
           
         </li>
		 <li class='has-sub'><a href='#'><span>Admin</span></a>
           
         </li>
      </ul>
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>
<div>
<img src="http://www.exzatech.com/wp-content/uploads/2014/07/careers.jpg" id="img1" style="float:left">
<h2 id='h1'>Not a memeber yet? Sign up as an employer!!</h2>
<form name="form1" style="float:left" action="employer.php" method="post">
	    <p>
	   
		<br/>
		 <form>
	    <font  style="font-size:15px">

	    Email-ID:   <input type="text" name="username" id= "id2" required onblur="ValidateEmail()">
		 	<p id="f1" style="color:red"></p><br/>
        Password:      <input type="password" name="password"  id="id2" required onblur="CheckPassword(document.form1.password)" ><br>
		<p id="f2" style="color:red" ></p><br/>
        <a href="#">Forgot password?</a>
        </font>
	</p>
	

	
	<input type="submit" value="Sign-Up" name="submit">
	</form>