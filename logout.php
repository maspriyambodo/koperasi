<?php
session_start();
include 'updateid.php';
session_unset();
session_destroy();
//include 'ipaddress.php';
header("location: index.php");
?>