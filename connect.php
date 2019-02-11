<?php
$servername = "localhost";
$username = "root";
$password = "";
$dba="job";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dba);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?> 