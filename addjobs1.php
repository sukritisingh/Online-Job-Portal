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
        <li class="active"><a href="#">WELCOME <?php echo $results[1] ?><span class="sr-only">(current)</span></a></li>
        <li><a href="#">EDIT PROFILE</a></li>
        
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>


<div id="div1">


<form class="form-horizontal"  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
  <fieldset>
    <legend>Add A Job</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Job Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="name" name="name" placeholder="Job name" type="text">
      </div>
    </div>
	<div class="form-group">
      <label for="inputdes" class="col-lg-2 control-label">Enter Experience Required</label>
      <div class="col-lg-10">
        <input class="form-control" id="exp" name="exp" placeholder="1" type="text">
      </div>
    </div>
	<div class="form-group">
      <label for="inputdur" class="col-lg-2 control-label">Enter Duration</label>
      <div class="col-lg-10">
        <input class="form-control" id="dur" name="dur" placeholder="Job Duration" type="text">
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
        <button type="reset" class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


</div>
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
	
	header("Location:empwelcome.php");	
}
?>