<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['username']))
{
$selected_val = $_POST['user'];
if($selected_val=="2")
{
$username= $_POST['username'];
$password= $_POST['password'];
$sql = "SELECT * FROM employee where Email='".$username."' AND Password='".$password."'LIMIT 1";
$res = mysql_query($sql);
if(mysql_num_rows($res)==1){
	
	$sql1="SELECT * FROM employee where Email='".$username."' AND Password='".$password."'LIMIT 1";
	$res1 = mysql_query($sql1);
	$row1=mysql_fetch_array($res1);
	$id=$row1[0];
	$_SESSION["id"]=$id;
	header("location:tCProfil.php");
	exit();
} 
else{
	echo "Invalid login info";
	exit();
}
}
if($selected_val=="3")
{
$username= $_POST['username'];
$password= $_POST['password'];
$sql = "SELECT * FROM employer where Email='".$username."' AND Password='".$password."'LIMIT 1";
$res = mysql_query($sql);
if(mysql_num_rows($res)==1){
$row=mysql_fetch_array($res);
	$_SESSION["id"]=$row[0];
	header("location:tempwelcome.php");
}
else{
	echo "Invalid login info";
	exit();
}

} 

}
?>
<!doctype html>
<html lang=''>
<head>
       <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Simple Sidebar - Start Bootstrap Template</title>

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

   <script>
   function ValidateEmail()  
{  var t = document.getElementById("id2");
var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;  
if(t.value.match(mailformat))  
{  
var w = document.getElementById("f1");

 w.innerHTML=" ";
}  
else  
{  
 var y = document.getElementById("f1");
y.innerHTML="You have entered an invalid email address!";  
document.form1.text1.focus();  
 
}  
} 

   </script>
   <title>Jobs For You</title>
   <style>
   form{
	margin-left:1px;
	display:inline;
	
	font{
	height:15px;}
   </style>
</head>
<body>
 <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        Start Bootstrap
                    </a>
                </li>
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li>
                    <a href="#">Shortcuts</a>
                </li>
                <li>
                    <a href="#">Overview</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        
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

<div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle">Sign in to Jobs For You!</legend>
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
        <input class="form-control" id="fname" name="username" placeholder="abc@yahoo.com" type="text" required>
      </div>
    </div>
	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Enter Password</label>
      <div class="col-lg-10">
        <input class="form-control" id="password" name="password"  type="password" required>
      </div>
	   <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label"><a href="#">Forgot Password?</a></label>
     
    </div>
    </div>
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" name="submit" value="submit" text="submit" class="btn btn-primary">Submit</button>
		 
      </div>
    </div>
	
	</fieldset>
	</form>
	     </div>
                </div>
            </div>
        </div>
</div>
</body>
<html>
