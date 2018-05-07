<?php 
include 'neracarra00.php';
$desc="LAPORAN RINCIAN KEWAJIBAN BULAN : ".nmbulan($bln).' '.$thn;
$hasil = $result->query_x1("SELECT a.branch,a.nonas,a.nama,a.norekgssl,a.produk,a.$fieldhari1,a.$fieldhari2,a.$fieldhari3,a.$fieldhari4,a.$fieldhari5,a.$fieldhari6 FROM $userid a JOIN akuntansi.aknkwj b ON a.nonas=b.sandi where $fieldhari1!=0 or $fieldhari2!=0 or $fieldhari3!=0 or $fieldhari4!=0 or $fieldhari5!=0 or $fieldhari6!=0 ORDER BY nonas");
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
	echo '<th colspan="2">SALDO AWAL '.substr('00'.$blnl,-2).'-'.$thnl.'</th>';
	echo '<th colspan="2">MUTASI KAS</th>';
	echo '<th colspan="2">MUTASI MEMORIAL</th>';
	echo '<th colspan="2">SALDO AKHIR '.$bln.'-'.$thn.'</th>';
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
	include 'fposisisaldo.php';
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
	echo '<th colspan="2">SALDO AWAL '.substr('00'.$blnl,-2).'-'.$thnl.'</th>';
	echo '<th colspan="2">MUTASI KAS</th>';
	echo '<th colspan="2">MUTASI MEMORIAL</th>';
	echo '<th colspan="2">SALDO AKHIR '.$bln.'-'.$thn.'</th>';
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
	include 'fposisisaldo.php';
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