<?php
include 'h_tetap.php';
$password1=$result->c_d($_POST['pass']);
$pass2=$result->c_d($_POST['pass2']);
if($pass2=='') die('Confirm Password Tidak Boleh Kosong');
$hasil=$result->query_y1("SELECT userid,pass FROM tbluser WHERE userid='$userid'");
if($result->num($hasil)<1) die("User ID Belum Terdaftar");
$ingat= $result->row($hasil);
$correctpassword = $ingat['pass'];
$salt = substr($correctpassword, 0, 64);
$correcthash = substr($correctpassword, 64, 64);
$userhash = hash("sha256", $salt . $password1);
if($userhash!=$correcthash) die('Password tidak sama');
$hashedpassword= HashPassword($pass2);
$result->query_y1("UPDATE tbluser SET pass='$hashedpassword' WHERE userid='$userid' LIMIT 1");
echo 'Proses sukses';
?>