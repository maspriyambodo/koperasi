<?php 
$tabel='akuntansi.labarugi';
include 'qlaporanhri.php';
$desc="LAPORAN SISA HASIL USAHA PERBANDINGAN TANGGAL : ".$t;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	echo '<thead>';
	echo '<tr class="td" bgcolor="#e5e5e5">';
	echo '<th>NO</th>';
	echo '<th>URAIAN</th>';
	echo '<th>REKENING</th>';
	echo '<th>TGL : '.$t.'</th>';
	echo '<th>TGL : '.$t1.'</th>';
	echo '<th>PERTUMBUHAN</th>';
	echo '<th>%</th>';
	echo '</tr>';
	echo '</thead>';
	include 'flabarugip.php';
	echo "</table>";
	break;
case "2":
	include 'h_pdf_p.php';
	echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';
	echo '<thead>';
	echo '<tr class="td" bgcolor="#e5e5e5">';
	echo '<th>NO</th>';
	echo '<th>URAIAN</th>';
	echo '<th>REKENING</th>';
	echo '<th>TGL : '.$t.'</th>';
	echo '<th>TGL : '.$t1.'</th>';
	echo '<th>PERTUMBUHAN</th>';
	echo '<th>%</th>';
	echo '</tr>';
	echo '</thead>';
	include 'flabarugip.php';
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