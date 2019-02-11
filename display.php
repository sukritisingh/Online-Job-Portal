<?php
include 'connect.php';

if(isset($_POST['username'])){
	$username=$_POST['username'];
}

if(isset($_POST['password'])){
	$password=$_POST['password'];
}

$sql= "select password from 'employee' 
where 'Email'='$username'";
$result= $db->query($sql);
while($row=$result->fetch_object()){
	$pass=$row->Password;
}
if($password==$pass)
{
echo "$username   $password"	
}
?>