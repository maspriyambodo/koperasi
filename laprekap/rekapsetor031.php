<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../laprekap/query_setoran030.php";
$desc="REKAP PEMBAYARAN ANGSURAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include "../laprekap/rekapsetor03x.php";
	echo "</table>";
	include "../laprekap/query_setoran032.php";
	$desc="ANALISA REKAP SETORAN ANGSURAN SELURUH BULAN : ".nmbulan($bln).' '.$thn;
	include '../judul.php';
	echo '<table  class="table" width="100%">';
	include "../laprekap/rekapsetor03y.php";
	echo '</table>';
	break;
case "2":
	include "../laprekap/rekapsetor035.php"; 
	break;
case "3":
	include "../laprekap/rekapsetor036.php"; 
	break;
}
?>