<?php
include '../h_tetap.php'; 
include "../nominatif_pasif/daftar_nominatif21.php";
$desc='REKAP NOMINATIF TIDAK DITAGIH HARIAN : '.$tanggal;
$cabang=$result->namacabang($branch);
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include "../ketnas/form_rekap.php";
	echo "</table>";
	include "../nominatif_pasif/daftar_nominatif22.php";
	$desc='REKAP OBD PER JENIS PEMINJAM TIDAK DITAGIH BULAN : '.nmbulan($bln).' '.$thn;
	include '../judul.php';
	echo '<table  class="table" width="100%">';
	include "../ketnas/form_rekap01.php";
	echo '</table>';
	break;
case "2":
	include "../nominatif_pasif/daftar_nominatif25.php"; 
	break;
case "3":
	include "../nominatif_pasif/daftar_nominatif26.php"; 
	break;
}
?>
