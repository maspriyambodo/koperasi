<?php 
include 'aruskas00.php';
$desc="LAPORAN ARUS KAS BULAN : ".nmbulan($bln).'-'.$thn;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	if($blnxx==100){
		include 'aruskas12.php';
	}elseif($blnxx==200){
		include 'aruskas13.php';
	}elseif($blnxx==300){
		include 'aruskas14.php';
	}else{
		include 'aruskas11.php';
	}
	echo "</table>";
	break;
case "2":
	include 'h_pdf_p.php';
	echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';
	if($blnxx==100){
		include 'aruskas12.php';
	}elseif($blnxx==200){
		include 'aruskas13.php';
	}elseif($blnxx==300){
		include 'aruskas14.php';
	}else{
		include 'aruskas11.php';
	}
	echo "</table>";
	include 'b_pdf.php';
	break;
case "3":
	include 'header_xls.php';
	echo '<table width="100%" class="table" style="font-family: Arial; font-size: 9pt;">';
	echo '<tr><td colspan="9" align="center">'.$desc.'</td></tr>';
	include 'fneraca.php';
	echo '</table>';
	include 'bawah_xls.php';
	break;
}
?>