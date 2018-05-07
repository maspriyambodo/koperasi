<?php
include '../h_tetap.php'; 
include "../nominatif_aktif/rekap_query.php";
$desc='REKAP OBD MENURUT KOLEKTIBILITAS PEMINJAM : '.nmbulan($bln).' '.$thn;
$cabang=$result->namacabang($branch);
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include "../ketnas/form_rekap.php";
	echo "</table>";
	include "../nominatif_aktif/rekap_query01.php";
	$desc='REKAP OBD PER JENIS PEMINJAM BULAN : '.nmbulan($bln).' '.$thn;
	include '../judul.php';
	echo '<table  class="table" width="100%">';
	include "../ketnas/form_rekap01.php";
	echo '</table>';
	break;
case "2":
	include "../nominatif_aktif/rekapjangkaf.php"; 
	break;
case "3":
	include "../nominatif_aktif/rekapjangkax.php"; 
	break;
}
?>