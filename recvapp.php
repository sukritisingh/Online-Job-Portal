<?php
session_start();
$sid=$_SESSION['id'];
?>
<html>
<head>
   <link rel="stylesheet" href="style2.css">
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
        <li class="active"><a href="#">WELCOME USER<span class="sr-only">(current)</span></a></li>
        <li><a href="#">CUSTOMIZE PROFILE</a></li>
        
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>
<h1 id='here'>Recieved application</h1>	
</body>
</html>
<?php
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$query=mysql_query("SELECT * FROM `jobs` WHERE employer_id=$sid");
while($results=mysql_fetch_array($query)){
		echo "<script>
		var div1=document.createElement('div');
	   div1.id=$results[0];
	   var current =document.getElementById('here');
	   document.getElementById('here').appendChild(div1);
	   document.getElementById('$results[0]').innerHTML='JOB : $results[1]<br> <a href=jobs.php?a=$results[0]>click here to see the recieved  applications</a> <hr>';
	   </script>";
	}

?>