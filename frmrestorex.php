<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbnm = "gaji";
$mysql = new mysqli("$host", "$user", "$pass","$dbnm");
$conn = mysqli_connect($host,$user, $pass,$dbnm);
if(mysqli_connect_errno()) {
	$err='';$error=mysqli_error($conn);
	die("Query failed, ".$err." Error No :".$error);
} 
?>