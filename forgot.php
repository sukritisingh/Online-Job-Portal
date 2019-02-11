<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

mysql_connect($host,$user,$pass);
mysql_select_db($db);


if(isset($_POST['submit'])){
$email=$_POST['email'];
$flag=0;
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$random=mt_rand(100000,999999);
$s=$_POST['user'];
if($s=="3"){
$query=mysql_query("select * from employer");
while($results=mysql_fetch_array($query)){
	if($results[3]==$email)
		$flag=1;
}
if($flag==1){
	$query1=mysql_query("UPDATE `employer` SET `password`='$random' WHERE email='$email'");
}

if($flag==1){
require_once "Mail.php";
$type = "text/html";
   $from  = "gmail.com";
   $to = "$email";
   $subject = "Forgot password";
   $body = "your password has been set to  : $random ";
   // $message = "This is simple text message.";
   $host = "ssl://smtp.gmail.com";
   $port = "465";
   $username = "pankulanil.garg2012@vit.ac.in";
   $password = "cts@vitcc";
   // $header = "From:abc@somedomain.com \r\n";
   // $retval = mail ($to,$subject,$message,$header);
   // if( $retval == true )  
   // {
   //    echo "Message sent successfully...";
   // }
   // else
   // {
   //    echo "Message could not be sent...";
   // }

   $headers = array("Content-type"=>$type,"From"=>$from,"To"=>$to,"Subject"=>$subject,"Body"=>$body);
   $smtp = @Mail::factory('smtp',array('host'=>$host,'port'=>$port,'auth'=>true,'username'=>$username,'password'=>$password));
   $mail = @$smtp->send($to,$headers,$body);
   echo "Please check your email-id $email.";
   header("location:tlogin.php");
}
else
	echo "The id is not present in the database";
}
elseif($s=="2"){
	$query=mysql_query("select * from employee");
while($results=mysql_fetch_array($query)){
	if($results[1]==$email)
		$flag=1;
}
if($flag==1){
	$query1=mysql_query("UPDATE `employee` SET `password`='$random' WHERE email='$email'");
}

if($flag==1){
require_once "Mail.php";
$type = "text/html";
   $from  = "gmail.com";
   $to = "$email";
   $subject = "Forgot password";
   $body = "your password has been set to  : $random ";
   // $message = "This is simple text message.";
   $host = "ssl://smtp.gmail.com";
   $port = "465";
   $username = "pankulanil.garg2012@vit.ac.in";
   $password = "cts@vitcc";
   // $header = "From:abc@somedomain.com \r\n";
   // $retval = mail ($to,$subject,$message,$header);
   // if( $retval == true )  
   // {
   //    echo "Message sent successfully...";
   // }
   // else
   // {
   //    echo "Message could not be sent...";
   // }

   $headers = array("Content-type"=>$type,"From"=>$from,"To"=>$to,"Subject"=>$subject,"Body"=>$body);
   $smtp = @Mail::factory('smtp',array('host'=>$host,'port'=>$port,'auth'=>true,'username'=>$username,'password'=>$password));
   $mail = @$smtp->send($to,$headers,$body);
   echo "Please check your email-id $email.";
   header("location:tlogin.php");
}
else
	echo "The id is not present in the database";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in to Jobs For You!</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="tlogin.php">
                        HOME
                    </a>
                </li>
				  <li>
                    <a href="tlogin.php">LOGIN</a>
                </li>
             
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">CONTACTS</a>
                </li>
              
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Forgot Password</h1>
                       <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle"></legend>
	    <p>
	   
		</font>
		<br/>
		<div class="form-group">
      <label for="select" class="col-lg-2 control-label">Choose User Type</label>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="user">
          <option value="1">Choose type of User</option>
          <option value="2">Job-Seeker</option>
          <option value="3">Employer</option>
          
        </select>
        <br>
        
      </div>
    </div>
		 <form>
		  <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Enter Email</label>
      <div class="col-lg-10">
        <input class="form-control" id="fname" name="email" placeholder="abc@yahoo.com" type="text" >
      </div>
    </div>
	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Enter Password</label>
      <div class="col-lg-10">
        <input class="form-control" id="password" name="password"  type="password" >
      </div>
	   <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label"><a href="#">Forgot Password?</a></label>
     
    </div>
    </div>
	 
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
	   <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        <button type="submit" name="submit" value="submit" text="submit" class="btn btn-primary">Submit</button>
		
		 
      </div>
    </div>
	
	</fieldset>
	</form>

                      
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
<?php

?>