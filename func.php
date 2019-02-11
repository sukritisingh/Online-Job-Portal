<?php
   require_once "Mail.php";
	if($selected_val=="2")
	{
	$email=$_POST['username'];
	$query="SELECT * FROM `employee` WHERE `Email`='$email' ";
	$res1=mysql_query($query);
	$row1=mysql_fetch_array($res1);
	$pass=$row1[2];
	$_SESSION['e_id']=$email;
   $type = "text/html";
   $from  = "gmail.com";
   $to = "$email";
   $subject = "This is subject";
   $body = "Enter the following OTP : $pass";
   // $message = "This is simple text message.";
   $host = "ssl://smtp.gmail.com";
   $port = "465";
   $username = "pankulanil.garg2012@vit.ac.in";
   $password = "cts@vitcc";
}
	if($selected_val=="3"){
	$email=$_POST['username'];
	$query="SELECT Password FROM `employer` WHERE `Email`='$email' ";
	$res=mysql_query($query);
	$row1=mysql_fetch_array($res);
	$pass=$row1[2];
	$_SESSION['e_id']=$email;
   $type = "text/html";
   $from  = "gmail.com";
   $to = "$email";
   $subject = "This is subject";
   $body = "Enter the following OTP : $pass";
   // $message = "This is simple text message.";
   $host = "ssl://smtp.gmail.com";
   $port = "465";
   $username = "pankulanil.garg2012@vit.ac.in";
   $password = "cts@vitcc";
?>