<?php
$id=$_GET['a'];
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 
mysql_connect($host,$user,$pass);
mysql_select_db($db);
$query=mysql_query("SELECT * FROM `employee` WHERE id=$id");
$results=mysql_fetch_array($query);
echo $results['Fname'];
$file_target="resume/$id.pdf";
	$a=$results['Fname']." resume.pdf";
	Header('content-Type: application/Force-download');
	header("content-disposition : attachment; filename=$a");
	readfile($file_target);
?>