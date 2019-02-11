<?php
session_start();
$sid=$_SESSION['id'];
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 
mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['submit']))
{
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	//$email=$_POST['email'];
	$DOB=$_POST['dob'];
	$contact=$_POST['contact'];
	$exp=$_POST['exp'];
	$c_name=$_POST['c_name'];
	
	$c_cgpa=$_POST['C_cgpa'];
	$t_perc=$_POST['t_perc'];
	$tw_perc=$_POST['tw_perc'];
	
	

	$ext=pathinfo($_FILES['filetoupload']['name'],PATHINFO_EXTENSION);
	$target_f="resume/".$sid.".$ext";
	move_uploaded_file($_FILES['filetoupload']['tmp_name'],$target_f);


}
?>
<?php
if(isset($_POST['submit'])){
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
if($_POST['fname']!=Null){
	$name=$_POST['fname'];
	mysql_query("UPDATE `employee` SET `Fname`='$name' WHERE id='$sid'");
}
if($_POST['lname']!=Null){
	$name1=$_POST['lname'];
	mysql_query("UPDATE `employee` SET `Lname`='$name1' WHERE id='$sid'");
}
if($_POST['pass']!=Null){
	$pass=$_POST['pass'];
	mysql_query("UPDATE `employee` SET `Password`='$pass' WHERE id='$sid'");
}
if($_POST['exp']!=NULL){
	$exp=$_POST['exp'];
	mysql_query("UPDATE `employee` SET `Experience`='$exp' WHERE id='$sid'");
}
if($_POST['dob']!=NULL){
	$dob=$_POST['dob'];
	mysql_query("UPDATE `employee` SET `DOB`='$dob' WHERE id='$sid'");
}
if($_POST['contact']!=NULL){
	$contact=$_POST['contact'];
	mysql_query("UPDATE `employee` SET `Mobile`='$contact' WHERE id='$sid'");
}
if($_POST['C_name']!=NULL){
	$c_name=$_POST['C_name'];
	mysql_query("UPDATE `employee` SET `College`='$c_name' WHERE id='$sid'");
}
if($_POST['t_perc']!=NULL){
	$t_perc=$_POST['t_perc'];
	mysql_query("UPDATE `employee` SET `t_perc`='$t_perc' WHERE id='$sid'");
}
if($_POST['tw_perc']!=NULL){
	$tw_perc=$_POST['tw_perc'];
	mysql_query("UPDATE `employee` SET `tw_perc`=$tw_perc WHERE id='$sid'");
}
if($_POST['C_cgpa']!=NULL){
	$c_cgpa=$_POST['C_cgpa'];
	mysql_query("UPDATE `employee` SET `C_cgpa`=$c_cgpa WHERE id=$sid");
}
header("Location:twelcome.php");
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
    <title>Customize your Profile</title>

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
                    <a href="twelcome.php">
                        HOME
                    </a>
                </li>
             
                <li>
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">CONTACTS</a>
                </li>
              <li>
                    <a href="tlogout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Customize your Profile</h1>
   <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <fieldset>
    <legend></legend>
    <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Enter First Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="fname" name="fname" placeholder="First Name" type="text" >
      </div>
    </div>
	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Enter Last Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="lname" name="lname" placeholder="Last Name" type="text" >
      </div>
    </div>
	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Enter Password</label>
      <div class="col-lg-10">
        <input class="form-control" id="pass" name="pass" placeholder="Last Name" type="password" >
      </div>
    </div>
	<div class="form-group">
      <label for="inputdob" class="col-lg-2 control-label">Date Of Birth</label>
      <div class="col-lg-10">
        <input class="form-control" id="dob" name="dob" placeholder="2015-12-01" type="text">
      </div>
	  
    </div>
	<div class="form-group">
      <label for="inputdes" class="col-lg-2 control-label" > Experience</label>
      <div class="col-lg-10">
        <input class="form-control" id="exp" name="exp" placeholder="1" type="number">
      </div>
    </div>
	<div class="form-group">
      <label for="inputsal" class="col-lg-2 control-label">Contact Number</label>
      <div class="col-lg-10">
        <input class="form-control" id="contact" name="contact" placeholder="9422442422" type="text">
      </div>
	  
    </div>
	
    <div class="form-group">
      <label for="inputCol" class="col-lg-2 control-label">College Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="c_name" name="c_name" placeholder="xyz University" type="text">
		</div>
		</div>
 <div class="form-group">
      <label for="inputc10" class="col-lg-2 control-label">Enter 10th Percentage</label>
      <div class="col-lg-10">
        <input class="form-control" id="t_perc" name="t_perc" placeholder="70" type="text">
      </div>
	  
    </div>
	<div class="form-group">
      <label for="c_gpa" class="col-lg-2 control-label">Enter CGPA</label>
      <div class="col-lg-10">
        <input class="form-control" id="C_cgpa" name="C_cgpa" placeholder="9" type="text">
      </div>
	  
    </div>
	<div class="form-group">
      <label for="inputsal" class="col-lg-2 control-label">Enter 12th Percentage</label>
      <div class="col-lg-10">
        <input class="form-control" id="tw_perc" name="tw_perc" placeholder="80" type="text">
      </div>
	  
    </div>
		<div class="form-group">
      <label for="inputsal" class="col-lg-2 control-label">Upload Resume</label>
      <div class="col-lg-10">
  
<input type="file" name="filetoupload" id="filetoupload">
      </div>
	  
    </div>
		
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
