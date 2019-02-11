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
    <title>Job Search </title>

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
                    <a href="#">CONTACTS</a>
                </li>
                <li>
                    <a href="#">ABOUT</a>
                </li>
               <li>
			       <a href="tlogout.php">LOG-OUT</a>
			   </li>
              
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 >Search For Your Suitable Job!</h1>
    <form class="form-horizontal"  id="here" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle"></legend>
	    <p>
	   
		</font>
		<br/>
		<div class="form-group">
      <label for="select" class="col-lg-2 control-label">Experience</label>
      <div class="col-lg-10">
        <select class="form-control" id="exp" name="exp">
           
	   <option value=-1 >Select an option</option>
	   <option value=0 >0</option>
	   <option value=1>1</option>	  
	   <option value=2 >2</option>
	   <option value=3>3</option>
	   <option value=4 >4</option>
	   </select>
          
      </div>
		 <label for="select" class="col-lg-2 control-label">Skills</label>
		 <br/><br/>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="skill">
           
	Skills:
	    <option value=-1 >Select an option</option>
	   <option value="C">C</option>
	   <option value="C++">C++</option>	  
	   <option value="Java" >Java</option>
	   <option value="Python">Python</option>
	
	
        </select>
        <br>
        
      </div>
    </div>
	<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
	   <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
        <input type="submit" name="submit" value="search" text="submit" class="btn btn-primary">
		 
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
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 
$num=1;
$conn= mysql_connect($host,$user,$pass);

mysql_select_db($db);


if(isset($_POST['submit']))
{
	
	$exp=$_POST['exp'];
	$skill=$_POST['skill'];
	if($skill==-1&&$exp!=-1){
	$query="select * from `jobs` where exp>=$exp order by sal DESC";
	$result=mysql_query($query);
	while($results=mysql_fetch_array($result)){
		echo "<script>
		var div1=document.createElement('div');
	   div1.id=$results[0];
	   var current =document.getElementById('here');
	   document.getElementById('here').appendChild(div1);
	   document.getElementById('$results[0]').innerHTML='JOB : $results[1] <br> <a href=tdetails.php?a=$results[0]>click here for more details</a> <hr>';
	   </script>";
	}
	}
	if($skill!=-1&&$exp==-1)
	{
		$query="select * from jobs,skills_r where jobs.id=skills_r.id and skills_r.skills='$skill';";
	    $result=mysql_query($query);
	while($results=mysql_fetch_array($result)){
		
		echo "<script>
		var div1=document.createElement('div');
		
	   div1.id=$results[0];
	   var current =document.getElementById('here');
	   document.getElementById('here').appendChild(div1);
	   document.getElementById('$results[0]').innerHTML='JOB : $results[1] <br><a href=tdetails.php?a=$results[0]>click here for more details</a> <hr>';
	   </script>";
	}
	}
	if($skill!=-1&&$exp!=-1)
	{
		
		
		
		$query="SELECT * FROM jobs,skills_r where jobs.exp>=$exp AND skills_r.skills='$skill'";
	    $result=mysql_query($query);
		
	while($results=mysql_fetch_array($result)){
		echo "<script>
		var div1=document.createElement('div');
	   div1.id=$results[0];
	   var current =document.getElementById('here');
	   document.getElementById('here').appendChild(div1);
	   document.getElementById('$results[0]').innerHTML='JOB : $results[1] <br><a href=tdetails.php?a=$results[0]>click here for more details</a> <hr>';
	   </script>";
	}
	}
}
?>