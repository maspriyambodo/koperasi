<?php
include 'h_tetap.php';
$password1=$result->clean_data($_POST['xpass']);
$hasil=$result->res("SELECT userid,pass FROM tbluser WHERE userid='$userid'");
if ($result->num($hasil) == 1){
	$ingat= $result->row($hasil);
	$correctpassword = $ingat['pass'];
	$salt = substr($correctpassword, 0, 64);
	$correcthash = substr($correctpassword, 64, 64);
	$userhash = hash("sha256", $salt . $password1);
	if ($userhash!=$correcthash){
		echo 'Password tidak sama';
	}else{
		echo 'Password sama';
	}
}else {
	echo 'User id tidak terdaftar atau password salah';
}
?>
