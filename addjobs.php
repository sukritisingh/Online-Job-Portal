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
        <li><a href="#">EDIT PROFILE</a></li>
        
      </ul>
    
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">LOG OUT</a></li>
      </ul>
    </div>
  </div>
</nav>

<?php
if(isset($_POST['submit'])){
$pos=$_POST['opt1'];
echo $pos;}
?>
<div id="div1">


<form class="form-horizontal" method="POST" action="addjobs.php">
  <fieldset>
    <legend>Add A Job</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Enter Name</label>
      <div class="col-lg-10">
        <input class="form-control" id="name" name="name" placeholder="Employer name" type="text">
      </div>
    </div>
	<div class="form-group">
      <label for="inputdes" class="col-lg-2 control-label">Enter Experience Required</label>
      <div class="col-lg-10">
        <input class="form-control" id="job" name="job" placeholder="1" type="text">
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
        <input class="form-control" id="dur" name="dur" placeholder="2015-12-01" type="text">
      </div>
	  
    </div>
	<div class="form-group">
      <label for="inputsal" class="col-lg-2 control-label">Enter Salary</label>
      <div class="col-lg-10">
        <input class="form-control" id="sal" name="dur" placeholder="100000" type="text">
      </div>
	  
    </div>
	
    <div class="form-group">
      <label for="inputPassword" class="col-lg-2 control-label">Password</label>
      <div class="col-lg-10">
        <input class="form-control" id="inputPassword" placeholder="Password" type="password">
 
		
      </div>
    </div>
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #1</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" name="opt1" value="Python"> Python
          </label>
        </div>
		
	  
    </div>
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #2</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" name="opt2"> C
          </label>
        </div>
		
	  
    </div>
	
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #3</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" name="opt3"> C++
          </label>
        </div>
		
	  
    </div>
	
	<div class="form-group">
      <label for="inputskill" class="col-lg-2 control-label">Required Skill #4</label>
      <div class="checkbox">
          <label>
            <input type="checkbox" name="opt4"> Java
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
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


</div>
</html>