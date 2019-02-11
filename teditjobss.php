<?php
session_start();
$sid=$_SESSION['d'];


$_SESSION['a']=$sid;
?>
<?php
if(isset($_POST['submit'])){
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');

if($_POST['name']!=NULL)
{
	$name=$_POST['name'];
	mysql_query("UPDATE `jobs` SET `job`='$name' WHERE id='$sid'");
}
if($_POST['exp']!=NULL){
	$exp=$_POST['exp'];
	mysql_query("UPDATE `jobs` SET `exp`='$exp' WHERE id='$sid'");
}
if($_POST['dur']!=NULL){
	$dur=$_POST['dur'];
	mysql_query("UPDATE `jobs` SET `time`='$dur' WHERE id='$sid'");
}
if($_POST['aed']!=NULL){
	$aed=$_POST['aed'];
	mysql_query("UPDATE `jobs` SET `aed`='$aed' WHERE id='$sid'");
}
if($_POST['sal']!=NULL){
	$sal=$_POST['sal'];
	mysql_query("UPDATE `jobs` SET `sal`='$sal' WHERE id='$sid'");
}
if($_POST['desc']!=NULL){
	$desc=$_POST['desc'];
	mysql_query("UPDATE `jobs` SET `desc`='$desc' WHERE id='$sid'");
}
header("Location:tempwelcome.php");
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

    <title>Edit Jobs</title>

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
                    <a href="#">ABOUT</a>
                </li>
                <li>
                    <a href="#">CONTACTS</a>
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
                        <h1>Please Fill In The Entries You Want To Change:-</h1>
   <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle"></legend>
	    <p>
	   
		</font>
		<br/>
		
		
  <form class="form-horizontal"  method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
  <fieldset>
  <legend align="middle"></legend>
	    <p>
	   
		</font>
		<br/>
		
		 <form>
		  <div class="form-group">
      <label for="inputfname" class="col-lg-2 control-label">Job Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="name" name="name" placeholder="Job Name" type="text" >
      </div>
    </div>
	  <div class="form-group">
      <label for="inputexp" class="col-lg-2 control-label">Experience Required</label>
      <div class="col-lg-10">
        <input class="form-control" id="exp" name="exp" placeholder="1" type="text" >
      </div>
    </div>
	  <div class="form-group">
      <label for="dur" class="col-lg-2 control-label">Enter Duration</label>
      <div class="col-lg-10">
        <input class="form-control" id="dur" name="dur" placeholder="1 year" type="text" >
      </div>
    </div>
	
	   
	<div class="form-group">
      <label for="inputaed" class="col-lg-2 control-label">Enter Application End Date</label>
      <div class="col-lg-10">
        <input class="form-control" id="aed" name="aed" placeholder="2015-12-01" type="text">
      </div>
	  
    </div>
	 <div class="form-group">
      <label for="inputsal" class="col-lg-2 control-label">Enter Salary</label>
      <div class="col-lg-10">
        <input class="form-control" id="sal" name="sal" placeholder="100000" type="text">
      </div>
	  
    </div>
	<div class="form-group">
      <label for="textArea" class="col-lg-2 control-label">Job Description</label>
      <div class="col-lg-10">
        <textarea class="form-control" rows="3" id="textArea" name="desc"></textarea>
        <span class="help-block"></span>
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
