<?php
session_start();
$employee_id=$_SESSION['id'];
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$skill="";
$id=$_GET['a'];//job id
$result=mysql_query("SELECT `skills` FROM `skills_r` WHERE id=$id");
$a=mysql_num_rows($result);
while($a--){
	$results=mysql_fetch_array($result);
	$skill=$results[0].",$skill";
}
$result=mysql_query("SELECT * FROM jobs,employer where jobs.employer_id=employer.id AND jobs.id=$id");
$results=mysql_fetch_array($result);
$query=mysql_query("select * from follow where employee_id=$employee_id AND employer_id=$results[7]");
$results1=mysql_fetch_array($query);
if($results1[2]==0)
	$follow="<a href=tfollow_toggle_1.php?a=$employee_id&b=$results[7]&c=$id>follow</a>";
if($results1[2]==1)
	$follow="<a href=tfollow_toggle_0.php?a=$employee_id&b=$results[7]&c=$id>unfollow</a>";
?>
<html>	
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script src="script.js"></script>
    <title>Job Details</title>

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
<body id="cont">
  <div id="wrapper">
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
 <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
<h1>DETAILS OF THE JOB:</h1><br>
<div id="div1">
<b>EMPLOYER NAME : </b><?php echo $results[9]; ?><br><br>
<b>JOB : </b><?php echo $results[1]; ?><br><br>
<b>EXPERIENCE REQUIRED : </b><?php echo "$results[2] years"; ?><br><br>
<b>SALARY : </b><?php echo $results[3]; ?><br><br>
<b>APPLICATION END DATE : </b><?php echo $results[4]; ?><br><br>
<b>TIME DURATION OF THE JOB : </b><?php echo $results[5]; ?><br><br>
<b>JOB DESCRIPTION : </b><?php echo $results[6]; ?><br><br>
<b>SKILLS REQUIRED FOR THE JOB : </b><?php echo $skill; ?><br>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
 <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>	  
	  <input type="submit" value="Send Application" class="btn btn-primary" name="submit" <?php echo "onclick=\"location.href='tdetailsr.php?a=$id&b=$results[7]';\""?>><br>
      </div>
    </div>
	
<?php echo $follow ?>
      </div>
                </div>
            </div>
        </div>
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

</div>
</div>
</body>
</html>
