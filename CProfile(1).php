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
	$sal=$_POST['sal'];
	$c_cgpa=$_POST['C_cgpa'];
	$t_perc=$_POST['t_perc'];
	$tw_perc=$_POST['tw_perc'];
	
	$skills=$_POST['skills'];
	
	$sql3="INSERT INTO `employee`( `Fname`, `Lname`, `Email`,`DOB`, `Mobile`, `Experience`, `College`, `Salary`, `C_cgpa`, `t_perc`, `tw_perc`,`skills`)VALUES 
	('$fname','$lname','$email','$DOB','$contact','$exp','$c_name','$sal','$c_cgpa','$t_perc','$tw_perc','$skills')";
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
   
<link rel="stylesheet" type="text/css" href="responsiveform.css">
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><?php echo "Welcome "; ?></li>
   <li><a href='#'><span>Home</span></a></li>
   <li class=' has-sub'><a href='#'><span>Profile</span></a>
     
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>
<div>

<div id="envelope">
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
<header>
<h2>Customize Your Profile</h2>
<p></p>
</header>
<label>First Name</label>
<input name="fname" placeholder="Tony" type="text" width="100px;" required>
<label>Last Name</label>
<input name="lname" placeholder="Stark" type="text" required>
<label>Email Id</label>
<input name="email" placeholder="yourname@gmail.com" type="text" required>
<label>DOB</label>
<input name="dob" placeholder="19-04-1994" type="date" rXequired><br/><br/>
<label>Contact Number</label>
<input name="contact" placeholder="123456789" type="text" required><br/><br/>
<label>Experience</label>
<input name="exp" placeholder="1" type="number" required><br/><br/>
<label>College Name</label>
<input name="c_name" placeholder="XYZ University" type="text" required>
<label>Salary</label>
<input name="sal" placeholder="10000" type="number" required><br/><br/>
<label>College CGPA</label>
<input name="C_cgpa" placeholder="7.5" type="number" required><br/><br/>
<label>10th Grade Percentage</label>
<input name="t_perc" placeholder="70" type="number" required><br/><br/>
<label>12th Grade Percentage</label>
<input name="tw_perc" placeholder="70" type="number" required><br/><br/>
<label>Skills</label>
<input name="skills" placeholder="C++" type="text"><br/><br/>
<label>Select resume to upload</label>
<input type="file" name="filetoupload" id="filetoupload">
<input type="submit" name="submit" value="submit" text="submit">
</form>
</div>
</div>
<div> 

</div>
</body>
<html>
