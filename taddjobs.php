<?php
ob_start();
session_start();
$sid=$_SESSION['id'];
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$query=mysql_query("SELECT * FROM `employer` WHERE id=$sid");
$results=mysql_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in to Jobs For You!</title>

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
</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="temployer.php">
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
                        <h1>ADD A JOB</h1>
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
        <input class="form-control" id="name" name="name" placeholder="Job Name" type="text" required>
      </div>
    </div>
	  <div class="form-group">
      <label for="inputexp" class="col-lg-2 control-label">Experience Required</label>
      <div class="col-lg-10">
        <input class="form-control" id="exp" name="exp" placeholder="1" type="text" required>
      </div>
    </div>
	  <div class="form-group">
      <label for="dur" class="col-lg-2 control-label">Enter Duration</label>
      <div class="col-lg-10">
        <input class="form-control" id="dur" name="dur" placeholder="1 year" type="text" required>
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
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #1</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" id="opt1" name="opt1" value="Python"> Python
          </label>
        </div>
		
	  
    </div>
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #2</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" id="opt2" name="opt2" value="C"> C
          </label>
        </div>
		
	  
    </div>
	
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #3</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" id="opt3" name="opt3" value="C++"> C++
          </label>
        </div>
		
	  
    </div>
	
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #4</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" id="opt4" name="opt4" value="Java"> Java
          </label>
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
<?php
if(isset($_POST['submit'])){
	$job=$_POST['name'];
	$exp=$_POST['exp'];
	$sal=$_POST['sal'];
	$aed=$_POST['aed'];
	$time=$_POST['dur'];
	$desc=$_POST['desc'];
	$query=mysql_query("INSERT INTO `jobs`(`job`, `exp`, `sal`, `aed`, `time`, `desc`, `employer_id`) VALUES
	('$job',$exp,$sal,'$aed','$time','$desc',$sid)");
	$query=mysql_query("SELECT * FROM `jobs` WHERE employer_id=$sid");
	$num=mysql_num_rows($query);
	for($i=1;$i<=$num;$i++)
		$results=mysql_fetch_array($query);
	if(isset($_POST['opt1'])){
		$opt1=$_POST['opt1'];
		$query=mysql_query("INSERT INTO `skills_r`(`id`, `skills`) VALUES ($results[0],'$opt1')");
	}
	if(isset($_POST['opt2'])){
		$opt2=$_POST['opt2'];
		$query=mysql_query("INSERT INTO `skills_r`(`id`, `skills`) VALUES ($results[0],'$opt2')");
	}
	if(isset($_POST['opt3'])){
		$opt3=$_POST['opt3'];
		$query=mysql_query("INSERT INTO `skills_r`(`id`, `skills`) VALUES ($results[0],'$opt3')");
	}
	if(isset($_POST['opt4'])){
		$opt4=$_POST['opt4'];
		$query=mysql_query("INSERT INTO `skills_r`(`id`, `skills`) VALUES ($results[0],'$opt4')");
	}
	
	header("Location:tempwelcome.php");	
}
?>