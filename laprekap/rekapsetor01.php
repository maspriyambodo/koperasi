<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../laprekap/query_setoran00.php";
$desc="REKAP SETORAN ANGSURAN SELURUH BULAN : ".nmbulan($bln).' '.$thn;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	include "../laprekap/rekapsetor00.php";
	echo "</table>";
	include "../laprekap/query_setoran01.php";
	$desc="ANALISA REKAP SETORAN ANGSURAN SELURUH BULAN : ".nmbulan($bln).' '.$thn;
	include '../judul.php';
	echo '<table  class="table" width="100%">';
	include "../laprekap/rekapsetorxx.php";
	echo '</table>';
	break;
case "2":
	include "../laprekap/rekapsetor02.php"; 
	break;
case "3":
	include "../laprekap/rekapsetor03.php"; 
	break;
}
?>