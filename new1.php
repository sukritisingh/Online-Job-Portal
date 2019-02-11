<!doctype html>
<html lang=''>
<head>
   <link rel="stylesheet" href="styles.css">
   <script >

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

function CheckPassword(inputtxt)   
{   
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;  
if(inputtxt.value.match(passw))   
{   
var y = document.getElementById("f2");
y.innerHTML=" ";  
}  
else  
{   
var r = document.getElementById("f2");
r.innerHTML="Please try another password";  
}  
}  
   </script>
   <title>JobSeeker</title>
   <style>
.error {color: #FF0000;}
</style>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class=' has-sub'><a href='#'><span>Sign-Up</span></a>
      <ul>
         <li class='has-sub'><a href='jseeker.php'><span>Job-Seeker</span></a>
            
         </li>
         <li class='has-sub'><a href='employer.php'><span>Employer</span></a>
           
         </li>
		 <li class='has-sub'><a href='#'><span>Admin</span></a>
           
         </li>
      </ul>
   </li>
   <li><a href='#'><span>About</span></a></li>
   <li class='last'><a href='#'><span>Contact</span></a></li>
</ul>
</div>
<div>
<img src="http://www.exzatech.com/wp-content/uploads/2014/07/careers.jpg" id="img1" style="float:left">
<h2 id='h1'>Not a memeber yet? Sign up as an employer!!</h2>
<form name="form1" style="float:left"  method="post" action="<?php $_SERVER['PHP_SELF']?>" id='here'>
	    <p>
	   Experience :
	   <select name="exp" id="exp">
	   <option value=0 >0</option>
	   <option value=1>1</option>	  
	   <option value=2 >2</option>
	   <option value=3>3</option>
	   <option value=4 >4</option>
	   </select>
		<br/>
		</p>
	

	
	<input type="submit" value="Search" name="submit">
	
	</form>
	</div>
	</html>
	<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 
$num=1;

$nameErr = $emailErr = $genderErr = $websiteErr = "";
$conn= mysql_connect($host,$user,$pass);
mysql_select_db($db);

if(isset($_POST['username']))
{
$username= $_POST['username'];
$password= $_POST['password'];
$sql="INSERT INTO employer( `Email`, `Password`) VALUES ('$username','$password')";
$res = mysql_query($sql);
if(! $res )
{
  die('Could not enter data: ' . mysql_error());
}   
else{
	echo "Entered data successfully\n";
}
}

if(isset($_POST['submit']))
{
	$exp=$_POST['exp'];
	$query="select Fname,Job_post,ID from employer where Experience>=$exp order by sal DESC";
	$result=mysql_query($query);
	while($results=mysql_fetch_array($result)){
		echo $results[0];
		echo "<script> 
		var div1=document.createElement('div');
		if(div1)
			alert(div1);
		
	   div1.id=$results[2];
	   alert(div1.id);
	   var current =document.getElementById('here');
	   if(div1)
			alert(current);
	   document.getElementById('here').appendChild(div1);
	   document.getElementById('$results[2]').innerHTML='JOB : $results[1] <br> Employer : $results[0] <br> <button onclick=details.php?a=$results[2]>CLICK HERE</button> <hr>';
	   </script>";
	}
}
?>