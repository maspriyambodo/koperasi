<?php 
include 'h_tetap.php';
$nmuser = $result->c_d($_GET['nmuser']);
$password = $result->c_d($_GET['password']);
$error = array();
if(empty($nmuser)){$error['nmuser'] = '[Username Tidak Boleh Kosong]'; }
if(empty($password)){$error['password'] = '[Password Tidak Boleh Kosong]'; }
if(!empty($error)){ die('Error : '.implode($error));}
$hasil = $result->query_y1("SELECT pass,akses,plafon,plafonk FROM tbluser WHERE userid='$nmuser'");
if($result->num($hasil)==0) die('User Name Belum Terdaftar..?');
$row = $result->row($hasil);
$correctpassword = $row['pass'];
$salt = substr($correctpassword, 0, 64);
$correcthash = substr($correctpassword, 64, 64);
$userhash = hash("sha256", $salt . $password);
if($userhash!=$correcthash){ die('Password Anda Salah..?');}
if($row['akses']<3){
	if($row['plafon']<500000 || $row['plafonk']<500000)die('Anda Tidak Mempunyai Limit Otorisasi');
	echo 'Sukses';
	$result->close();
	$catat="Otorisasi Transaksi Memorial ".$userid;
	include 'around.php';
}else{
	die('Anda Tidak Berhak Untuk Otorisasi');
}?>