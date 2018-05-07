<?php
session_start();
if(!isset($_SESSION['isLoggedIn']) || !($_SESSION['isLoggedIn'])){
	$_SESSION['isLoggedIn'] = true;
	$_SESSION['timeOut'] = 20;
	$logged = time();
	$_SESSION['loggedAt']= $logged;
}else{
	require 'timeCheck.php';
	$hasSessionExpired = checkIfTimedOut();
	if($hasSessionExpired){
		session_unset();
		header("location: access-denied.php");
		exit;
	}else{
		$_SESSION['loggedAt']= time();
	}
}