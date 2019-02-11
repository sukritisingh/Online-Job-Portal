<?php
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$employer_id=$_GET['b'];
$employee_id=$_GET['a'];
$a=$_GET['c'];
echo $employee_id;
echo $employer_id;
$query=mysql_query("INSERT INTO `follow`(`employer_id`, `employee_id`, `follow`) VALUES ($employer_id,$employee_id,1)");
header("Location:tdetails.php?a=$a");
?>