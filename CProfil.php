<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 
$target="resume/";
mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['submit']))
{
	
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$DOB=$_POST['dob'];
	$contact=$_POST['contact'];
	$exp=$_POST['exp'];
	$c_name=$_POST['c_name'];
	
	$c_cgpa=$_POST['C_cgpa'];
	$t_perc=$_POST['t_perc'];
	$tw_perc=$_POST['tw_perc'];
	
	
	$sql3="INSERT INTO `employee`( `Fname`, `Lname`, `Email`,`DOB`, `Mobile`, `Experience`, `College`, `C_cgpa`, `t_perc`, `tw_perc`)VALUES 
	('$fname','$lname','$email','$DOB','$contact','$exp','$c_name','$c_cgpa','$t_perc','$tw_perc')";
    $res3 = mysql_query($sql3);
	$query_r=mysql_query("SELECT `Id` FROM `employee` WHERE Email='$email'");
	$query_r1=mysql_fetch_array($query_r);
	$ext=pathinfo($_FILES['filetoupload']['name'],PATHINFO_EXTENSION);
	$target_f=$target.$query_r1[0].".$ext";
	move_uploaded_file($_FILES['filetoupload']['tmp_name'],$target_f);
	if(! $res3 )
{
  die('Could not enter data: ' . mysql_error());
}
else{
	echo "Entered data successfully\n";
}

}
?>
<!doctype html>
<html lang=''>
<head>
   <link rel="stylesheet" href="styles.css">
   <link rel="stylesheet" href="style2.css">
   <script>
   
   </script>
   <title>Jobs For You</title>
   <style>
   form{
	margin-left:1px;
	display:inline;
	
	font{
	height:15px;}
   </style>
   <script>
   function func()
   {
	   var com = document.getElementById("comment").value;
if(com.lenght > 11){
} else {
 alert("length exceedded");
} 
   }   
   </script>
<link rel="stylesheet" type="text/css" href="responsiveform.css">
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">JOBS FOR YOU</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="jseeker.php">Employee Sign-up<span class="sr-only">(current)</span></a></li>
        <li><a href="employer.php">Employer Sign-up</a></li>
        
      </ul>
    <ul class="nav navbar-nav">
        <li class="active"><a href="#">Contact<span class="sr-only">(current)</span></a></li>
        <li><a href="#">About</a></li>
        
      </ul>

    </div>
  </div>
</nav>



<form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" enctype="multipart/form-data">
  <fieldset>
    <legend>Customize Your Profile</legend>
    <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Enter First Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="fname" name="fname" placeholder="First Name" type="text" required>
      </div>
    </div>
	<div class="form-group">
      <label for="inputlname" class="col-lg-2 control-label">Enter Last Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="lname" name="lname" placeholder="Last Name" type="text" required>
      </div>
    </div>
	<div class="form-group">
      <label for="inputdur" class="col-lg-2 control-label">Enter Email</label>
      <div class="col-lg-10">
        <input class="form-control" id="email" name="email" placeholder="abc@yahoo.com" type="email" required>
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
        <input class="form-control" id="exp" name="exp" placeholder="1" type="number" required>
      </div>
    </div>
	<div class="form-group">
      <label for="inputsal" class="col-lg-2 control-label">Contact Number</label>
      <div class="col-lg-10">
        <input class="form-control" id="contact" name="contact" placeholder="9422442422" type="text" onblur="func()">
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
        <button type="submit" name="submit" value="submit" text="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>

</div>
</div>
<div> 

</div>
</body>
<html>
