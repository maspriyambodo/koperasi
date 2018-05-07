<?php
include 'koneksi.php';
session_start();
$stillLoggedIn = timeCheck();
if($stillLoggedIn!=1){
$tabel="kred".date_angka($_SESSION['SESS_TGL_HARI']);
$result=$mysql->query("SELECT norek FROM $tabel WHERE kdaktif=0");
include 'pesanerr.php';
if($result){
	$jumlah=mysqli_num_rows($result);
	if($jumlah!=0){
		$row=$result->fetch_array(MYSQLI_ASSOC);
		echo 'Anda Mempunyai data otorisasi pinjaman sebanyak : '.$jumlah.' rekening';
	}else{
		echo $stillLoggedIn;
	}
}
}else{
	echo $stillLoggedIn;
}
function timeCheck(){
	if(!isset($_SESSION['isLoggedIn']) || !($_SESSION['isLoggedIn'])){
		include 'updateid.php';
		session_unset();
		return true;
		exit;
	}else{
		require 'timeCheck.php';
		$hasSessionExpired = checkIfTimedOut();
		if($hasSessionExpired){
			include 'updateid.php';
			session_unset();
			return true;
		}else{
			return false;
		}
	}
}
function date_sql($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}
function date_angka($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[1].''.substr($exp[2],2,2);
	}
	return $date;
}
?>