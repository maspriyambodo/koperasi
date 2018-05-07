<?php
include 'auth.php';
include 'koneksi.php';
function clean($str) {
	include "koneksi.php";
	$str = @trim($str);
	if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return  mysqli_real_escape_string($mysql,$str);
}
$xxx=clean($_GET['chars']);
$text="SELECT a.nomor_nasabah,a.nomor_bilyet,b.nama FROM deposits a JOIN nasabah b ON b.nonas=a.nomor_nasabah WHERE a.nomor_nasabah LIKE '%$xxx%' OR a.nomor_bilyet LIKE '%$xxx%' OR b.nama LIKE '%$xxx%' ORDER BY a.nomor_nasabah";
$result = $mysql->query($text);
if($result) {
	$rows = array();
	while ($data = $result->fetch_array(MYSQLI_ASSOC)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>