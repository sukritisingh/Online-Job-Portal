<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 

mysql_connect($host,$user,$pass);
mysql_select_db($db);
$sid=$_SESSION['id'];

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
    <title>Customize Your Profile!</title>

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
                    <a href="tempwelcome.php">
                        HOME
                    </a>
                </li>
                <li>
                    <a href="#">EMPLOYEE SIGN-UP</a>
                </li>
                <li>
                    <a href="#">EMPLOYER SIGN-UP</a>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">CONTACTS</a>
                </li>
				<li>
                    <a href="logout.out">LOGOUT</a>
                </li>
              
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Customize Your Profile</h1>
   <form class="form-horizontal" name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle"></legend>
	    <p>
	   
		</font>
		<br/>
		
		 <form>
		  <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">First Name:</label>
      <div class="col-lg-10">
        <input class="form-control" id="fname" name="fname" placeholder="Tony" type="text" >
      </div>
    </div>

	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Company Name:</label>
      <div class="col-lg-10">
        <input class="form-control" id="cname" name="cname"  type="text" placeholder="ABC ltd." >
      </div>
	   <div class="form-group">
      
    </div>
    </div>
	 
		  <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Contact Number:</label>
      <div class="col-lg-10">
        <input class="form-control" id="contact" name="contact" placeholder="9876543434" type="text">
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
if(isset($_POST['submit'])){
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
if($_POST['fname']!=NULL){
	$name=$_POST['fname'];
	mysql_query("UPDATE `employer` SET `name`='$name' WHERE id=$sid");
}

if($_POST['contact']!=NULL){
	$contact=$_POST['contact'];
	mysql_query("UPDATE `employer` SET `contact`='$contact' WHERE id=$sid");
}
if($_POST['cname']!=NULL){
	$c_name=$_POST['cname'];
	mysql_query("UPDATE `employer` SET `c_name`='$c_name' WHERE id=$sid");
}
header("Location:tempwelcome.php");
}

?>