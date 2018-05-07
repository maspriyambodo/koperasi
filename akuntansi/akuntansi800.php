<?php 
$tabel='akuntansi.neracagab';
include 'qlaporanhri.php';
$desc="NERACA LAJUR HARIAN TANGGAL : ".$t;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	include '../judul.php';
	echo "<table width='100%' class='table'>";
	echo '<thead>';
	echo '<tr class="td" bgcolor="#e5e5e5">';
	echo '<th rowspan="2">NO</th>';
	echo '<th rowspan="2">REKENING</th>';
	echo '<th rowspan="2">URAIAN</th>';
	echo '<th colspan="2">SALDO AWAL '.$t1.'</th>';
	echo '<th colspan="2">MUTASI KAS</th>';
	echo '<th colspan="2">MUTASI MEMORIAL</th>';
	echo '<th colspan="2">SALDO AKHIR '.$t.'</th>';
	echo '</tr>';
	echo '<tr class="td" bgcolor="#e5e5e5">';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '</tr>';
	echo '</thead>';	
	include 'fneracalajur.php';
	echo "</table>";
	break;
case "2":
	include 'h_pdf_l.php';
	echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';
	echo '<thead>';
	echo '<tr class="td" bgcolor="#e5e5e5">';
	echo '<th rowspan="2">NO</th>';
	echo '<th rowspan="2">REKENING</th>';
	echo '<th rowspan="2">URAIAN</th>';
	echo '<th colspan="2">SALDO AWAL '.$t1.'</th>';
	echo '<th colspan="2">MUTASI KAS</th>';
	echo '<th colspan="2">MUTASI MEMORIAL</th>';
	echo '<th colspan="2">SALDO AKHIR '.$t.'</th>';
	echo '</tr>';
	echo '<tr class="td" bgcolor="#e5e5e5">';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '<th>DEBET</th>';
	echo '<th>KREDIT</th>';
	echo '</tr>';
	echo '</thead>';	
	include 'fneracalajur.php';
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