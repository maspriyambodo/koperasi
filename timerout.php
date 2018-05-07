<?php
if(!isset($_SESSION['isLoggedIn']) || !($_SESSION['isLoggedIn'])){
	session_start();
	require 'timeCheck.php';
	$hasSessionExpired = checkIfTimedOut();
	if($hasSessionExpired){
		include 'updateid.php';
		session_unset();
		header("location: access-denied.php");
		exit;
	}else{
		$_SESSION['loggedAt']= time();
	}
}
$_SESSION['loggedAt']= time();

function checkIfTimedOut(){
	$diff = 1500;
	if($diff > $_SESSION['timeOut'])	{
		return true;
	}else{
		return false;
	}
}
?>