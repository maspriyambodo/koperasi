<?php
include '../h_tetap.php'; 
include "../nominatif_aktif/rekap_query_produk.php";
$desc='REKAP OBD MENURUT KOLEKTIBILITAS PEMINJAM : '.strtoupper(nmbulan($bln)).' '.$thn;
$cabang=$result->namacabang($branch);
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include "../nominatif_aktif/form_rekap_produk.php";
	echo "</table>";
	include "../nominatif_aktif/rekap_query_produkk.php";
	$desc='REKAP OBD PER JENIS PEMINJAM BULAN : '.nmbulan($bln).' '.$thn;
	include '../judul.php';
	echo '<table  class="table" width="100%">';
	include "../nominatif_aktif/form_rekap_produkk.php";
	echo '</table>';
	break;
case "2":
	include "../nominatif_aktif/rekap_produkf.php"; 
	break;
case "3":
	include "../nominatif_aktif/rekap_produkx.php"; 
	break;
}
?>