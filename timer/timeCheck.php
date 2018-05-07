<?php
function checkIfTimedOut(){
	$current = time();
	$diff = $current - $_SESSION['loggedAt'];
	if($diff > $_SESSION['timeOut'])	{
		return true;
	}else{
		return false;
	}
}
?>