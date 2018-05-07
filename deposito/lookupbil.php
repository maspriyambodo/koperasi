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
$text="SELECT a.nomor_nasabah,b.nama,a.nomor_bilyet,a.nominal FROM deposits a JOIN nasabah b ON a.nomor_nasabah=b.nonas WHERE (a.flag_cetak=0 AND a.flag_buka=1) AND (a.nomor_nasabah LIKE '%$xxx%' OR b.nama LIKE '%$xxx%') ORDER BY a.tanggal_buka ASC";
$result = $mysql->query($text);
if($result) {
	$rows = array();
	while ($data = $result->fetch_array(MYSQLI_ASSOC)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>