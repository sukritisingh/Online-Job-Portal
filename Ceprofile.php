<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

mysql_connect($host,$user,$pass);
mysql_select_db($db);


if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$contact=$_POST['contact'];
	$c_name=$_POST['cname'];
	
	$sql3="INSERT INTO `employee`( `Fname`, `Email`,`Mobile`)VALUES 
	('$fname','$email','$contact')";
    $res3 = mysql_query($sql3);
	if(! $res3 )
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
   <script>
   
   </script>
   <title>Jobs For You</title>
   <style>
   form{
	margin-left:1px;
	display:inline;
	
	font{
	height:15px;}
   </style>
   
<link rel="stylesheet" type="text/css" href="responsiveform.css">
<link rel="stylesheet" media="screen and (max-width: 1200px) and (min-width: 601px)" href="responsiveform1.css" />
<link rel="stylesheet" media="screen and (max-width: 600px) and (min-width: 351px)" href="responsiveform2.css" />
<link rel="stylesheet" media="screen and (max-width: 350px)" href="responsiveform3.css" />
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class=' has-sub'><a href='#'><span>Profile</span></a>
     
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>
<div>

<div id="envelope">
<form action="" method="post">
<header>
<h2>Customize Your Profile</h2>
<p></p>
</header>
<label>First Name</label>
<input name="fname" placeholder="Tony" type="text" width="100px;">
<label>Company Name</label>
<input name="cname" placeholder="Stark" type="text">
<label>Email Id</label>
<input name="email" placeholder="yourname@gmail.com" type="text">
<label>Contact Number</label>
<input name="contact" placeholder="123456789" type="text"><br/><br/>

<input type="submit" name="submit" value="submit" text="submit">
</form>
</div>
</div>
<div> 

</div>
</body>
<html>
