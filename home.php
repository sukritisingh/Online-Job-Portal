<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['username']))
{
$selected_val = $_POST['user'];
if($selected_val=="2")
{
$username= $_POST['username'];
$password= $_POST['password'];
$sql = "SELECT * FROM employee where Email='".$username."' AND Password='".$password."'LIMIT 1";
$res = mysql_query($sql);
if(mysql_num_rows($res)==1){
	echo "You have successfully logged in";
	exit();
} 
else{
	echo "Invalid login info";
	exit();
}
}
if($selected_val=="3")
{
$username= $_POST['username'];
$password= $_POST['password'];
$sql = "SELECT * FROM employer where Email='".$username."' AND Password='".$password."'LIMIT 1";
$res = mysql_query($sql);
if(mysql_num_rows($res)==1){
	echo "You have successfully logged in";
	exit();
} 
else{
	echo "Invalid login info";
	exit();
}
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
<h1 id="h3" align="center">Search From Over A Hundred Jobs</h1>
<select>
    <option><input type="checkbox"></option>
</select>
</div>
<div> 

</div>
</body>
<html>
