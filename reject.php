<?php
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$jobid=$_GET['b'];
$eid=$_GET['a'];
$query=mysql_query("UPDATE `application` SET `Status`=2 WHERE job_id=$jobid AND employee_id=$eid");
header("Location:tjobs.php?a=$jobid")
?>