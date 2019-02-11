<?php
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$employer_id=$_GET['b'];
$employee_id=$_GET['a'];
$a=$_GET['c'];
echo $employee_id;
echo $employer_id;
$query=mysql_query("DELETE FROM `follow` WHERE employer_id=$employer_id AND employee_id=$employee_id");
header("Location:tdetails.php?a=$a");
?>