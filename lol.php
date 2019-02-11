<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['username']))
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
?>

<!DOCTYPE HTML>
<html>
<head></head>
<body>
<form method= "post" action="lol.php">
USERNAME: <input type= "text" name= "username" /><br/><br/>
Password: <input type= "password" name="password"/> <br/><br/>
<input type="submit" name="submit" value="Log In"/>
</body>
</html>
