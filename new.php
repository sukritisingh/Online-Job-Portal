<?php 
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "job";
mysql_connect($mysql_hostname, $mysql_user, $mysql_password);

if(isset($_POST['username'])){
$username= $_POST['username'];
$password= $_POST['password']
mysql_select_db($mysql_database);
$sql= "SELECT * FROM employee where Email='".$username."' AND Password='".$password."'";
$res=mysql_query($sql);
if(mysql_sum_rows($row)==1){
echo"ffyfyfyf";
exit();}
else
{
echo "fail";
exit();
}
}
?>
<!doctype html>
<html lang=''>
<head>
   <link rel="stylesheet" href="styles.css">
   <script src="script.js">
   
   </script>
   <title>CSS MenuMaker</title>
   <style>
   form{
	margin-left:1px;
	display:inline;
	
	font{
	height:15px;}
   </style>
</head>
<body>

<div id='cssmenu'>
<ul>
   <li><a href='#'><span>Home</span></a></li>
   <li class=' has-sub'><a href='#'><span>Login</span></a>
      <ul>
         <li class='has-sub'><a href='#'><span>Job-Seeker</span></a>
            
         </li>
         <li class='has-sub'><a href='#'><span>Employer</span></a>
           
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
<h2 id='h1'>Not a memeber yet? Sign up!</h2>
<form style="float:left" action="new.php" method="post">
	    <p>
	    <font>
		<select>
		<option value="1">Choose type of User</option>
		<option value="2">Job-Seeker</option>
		<option value="3">Employer</option>
		
		</select>
		</font>
		<br/>
		 <form>
	    <font  style="font-size:15px">
	    Email-ID:   <input type="text" name="username"><br>
        Password:      <input type="password" name="password" ><br>
        <a href="#">Forgot password?</a>
        </font>
	</p>
	

	
	<input type="submit" value="Submit" name="submit">
	</form>
</div>
</body>
<html>
