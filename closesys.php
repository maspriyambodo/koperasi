<?php
session_start();
include 'updateid.php';
session_unset();
header("location: access-denied.php");
exit();
?>
