<?php
session_start();
		$conn= mysql_connect("localhost","root","");
		if(!mysql_select_db('job',$conn))
			die('could not connect to the database');
			

if(isset($_POST['submit1'])){
	$email=$_POST['email'];
	$random=mt_rand(100000,999999);
	$_SESSION['random']=$random;
	$_SESSION['e_id']=$email;
   require_once "Mail.php";
   $type = "text/html";
   $from  = "gmail.com";
   $to = "$email";
   $subject = "This is subject";
   $body = "Enter the following OTP : $random";
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
   $GLOBALS['x']=1;
}
if(isset($_POST['submit2'])){
	if($_SESSION['random']==$_POST['otp']){
		$username=$_SESSION['e_id'];$password=$_POST['password'];
		$sql="INSERT INTO employer( `Email`, `Password`) VALUES ('$username','$password')";
		$res = mysql_query($sql);
		$sql1="SELECT * FROM employer where Email='$username' AND Password='$password'";
		$res1 = mysql_query($sql1);
		$row1=mysql_fetch_array($res1);
		$id=$row1[0];
		$_SESSION["id"]=$id;
		if(! $res )
{
  die('Could not enter data: ' . mysql_error());
}
else{
	echo "Entered data successfully\n";header("Location:CProfil.php");
}
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
<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script src="script.js"></script>
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
 <script >
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
          <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        HOME
                    </a>
                </li>
				  <li>
                    <a href="tlogin.php">Login</a>
                </li>
                <li>
                    <a href="tjseeker.php">EMPLOYEE SIGN-UP</a>
                </li>
                <li>
                    <a href="temployer.php">EMPLOYER SIGN-UP</a>
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
                        <h1>Employer Sign up!</h1>
      <form class="form-horizontal" name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle"></legend>
	    <p>
	   
		</font>
		<br/>
		
		 <form>
		  <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Enter Email</label>
      <div class="col-lg-10">
        <input class="form-control" id="email" name="email" placeholder="" type="text"  value="<?php if(isset($_POST['submit1']))echo $email;?>"required>
      </div>
    </div>
	  <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Enter OTP</label>
      <div class="col-lg-10">
        <input class="form-control" id="top" name="otp" placeholder="" type="number" required>
      </div>
    </div>
	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Enter Desired Password</label>
      <div class="col-lg-10">
        <input class="form-control" id="password" name="password"  type="password" required>
      </div>
	   <div class="form-group">
      <div id="pswd_info">

</div> 	
    </div>
    </div>
	 
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
	   <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        <button type="submit" name="submit2" value="submit" text="submit" class="btn btn-primary">Submit</button>
        <button type="submit" name="submit1" value="send otp" text="submit" class="btn btn-primary">Send OTP</button>
		 
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
