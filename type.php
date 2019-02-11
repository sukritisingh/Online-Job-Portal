<!doctype html>
<html lang=''>
<head>
   <link rel="stylesheet" href="style2.css">
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input class="form-control" placeholder="Search" type="text">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>
<nav>
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
</nav>
</div>
<div>
<h2 id='h1'>Not a memeber yet? Sign up as an employer!!</h2>
<form name="form1" style="float:left"  method="post" action="<?php $_SERVER['PHP_SELF']?>" id='here'>
	    <p>
		
	   Experience :
	   <select name="exp" id="exp" selected="false">
	   <option value=-1 >Select an option</option>
	   <option value=0 >0</option>
	   <option value=1>1</option>	  
	   <option value=2 >2</option>
	   <option value=3>3</option>
	   <option value=4 >4</option>
	   </select>
		<br/>
		</p>
		
	

	Skills:
	<select name="skill" id="skill" >
	    <option value=-1 >Select an option</option>
	   <option value="C">C</option>
	   <option value="C++">C++</option>	  
	   <option value="Java" >Java</option>
	   <option value="Web Designing">Web Designing</option>
	
	</select>
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
	$skill=$_POST['skill'];
	echo $exp;
	echo $skill;
	if($skill==-1&&$exp!=-1){
	$query="select name,job,ID from employer where exp>=$exp order by sal DESC";
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
	   document.getElementById('$results[2]').innerHTML='JOB : $results[1] <br> Employer : $results[0] <br> <a href=details.php?a=$results[2]>click here for more details</a> <hr>';
	   </script>";
	}
	}
	if($skill!=-1&&$exp==-1)
	{
		$query="select employer.name,employer.job,employer.ID from employer, job_skill where employer.ID=job_skill.ID and job_skill.Skills='$skill'";
	    $result=mysql_query($query);
	
		if($result){
			echo "true";
		}
		else 
		{
			echo "false";
		}
	while($results=mysql_fetch_array($result)){
		
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
	   document.getElementById('$results[2]').innerHTML='JOB : $results[1] <br> Employer : $results[0] <br> <a href=details.php?a=$results[2]>click here for more details</a> <hr>';
	   </script>";
	}
	}
	if($skill!=0&&$exp>0)
	{
		
		
		
		$query="select employer.name,employer.job,employer.ID from employer, job_skill where employer.ID=job_skill.ID and job_skill.Skills=$skill and employer.exp>$exp";
	    $result=mysql_query($query);
		
	while($results=mysql_fetch_array($result)){
		if($query){
			echo "true";
		}
		
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
	   document.getElementById('$results[2]').innerHTML='JOB : $results[1] <br> Employer : $results[0] <br> <a href=details.php?a=$results[2]>click here for more details</a> <hr>';
	   </script>";
	}
	}
}
?>