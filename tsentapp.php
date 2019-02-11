<?php
session_start();
$sid=$_SESSION['id'];
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
    <title></title>

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
                    <a href="tlogout.php">LOGOUT</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 id='here'>Sent Applications:-</h1>	

                      <br/><br/>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->
<div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
 <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>	  
	  </div>
    </div>
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
$conn= mysql_connect("localhost","root","");
if(!mysql_select_db('job',$conn))
	die('could not connect to the database');
$query=mysql_query("SELECT * FROM `application` WHERE employee_id=$sid");
while($results=mysql_fetch_array($query)){
		if($results[2]==0)
			$status="not evaluated";
		if($results[2]==1)
			$status="shortlisted";
		if($results[2]==2)
			$status="rejected";
		$query1=mysql_query("SELECT * FROM `jobs` WHERE id=$results[0]");
		$results1=mysql_fetch_array($query1);
		echo "<script>
		var div1=document.createElement('div');
	   div1.id=$results[0];
	   var current =document.getElementById('here');
	   document.getElementById('here').appendChild(div1);
	   document.getElementById('$results[0]').innerHTML='JOB : $results1[1]<br> Status:$status  <hr>';
	   </script>";
	}

?>