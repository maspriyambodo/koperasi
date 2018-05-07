<?php
session_start();
$stillLoggedIn = timeCheck();
echo $stillLoggedIn;
function timeCheck(){
	if(!isset($_SESSION['isLoggedIn']) || !($_SESSION['isLoggedIn'])){
		session_unset();
		return true;
		exit;
	}else{
		require 'timeCheck.php';
		$hasSessionExpired = checkIfTimedOut();
		if($hasSessionExpired){
			session_unset();
			return true;
		}else{
			return false;
		}
	}
}
?>