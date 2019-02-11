<?php
session_start();
$host = "localhost";
$user = "root";
$pass = "";
$db = "job"; 
mysql_connect($host,$user,$pass);
mysql_select_db($db);
$sid=$_SESSION['id'];
$query=mysql_query("SELECT `Fname` FROM `employee` WHERE id=$sid");
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
<script src="http://code.jquery.com/jquery-1.7.min.js"></script>
<script src="script.js"></script>
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
                        <h1>Welcome <?php echo $results[0] ?></h1>


<img src="pic.jpg"  align="middle">
<br/>
<br/>

<div id="div1">
<a href="tsearch.php" class="btn btn-default">SEARCH JOBS</a>
<a href="tfollow.php" class="btn btn-primary">FOLLOWED EMPLOYERS</a>
<a href="tsentapp.php" class="btn btn-success">SENT APPLICATIONS</a>
<a href="tCProfile.php" class="btn btn-danger">CUSTOMIZE MY PROFILE</a>
<br/>
<br/>
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
 <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>	  
	  </div>
    </div>
</div>

                      
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
