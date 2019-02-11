<?php
$job=$_GET['a'];
$emp_id=$_GET['b'];
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$query=mysql_query("INSERT INTO `application` (`job_id`, `employee_id`) VALUES ($job,$emp_id)");
	if($query)
		echo "application successfully sent<br>Re-directing to homepage";
	header('location:welcome1.php');
?>