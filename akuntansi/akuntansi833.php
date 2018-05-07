<?php 
include "../h_tetap.php";$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$desc="NERACA LAJUR PENUTUP TAHUN : ".$thn;$cabang=$result->namacabang($branch);$fieldhari1='tahun01a';$fieldhari2='tahundka';$fieldhari3='tahunkka';$fieldhari4='tahundma';$fieldhari5='tahunkma';$fieldhari6='tahun12a';$tabel='akuntansi.neracagab';if($branch=='0111'){$text = "SELECT a.uraian,a.sandi,SUM(b.$fieldhari1) AS $fieldhari1,SUM(b.$fieldhari2) AS $fieldhari2,SUM(b.$fieldhari3) AS $fieldhari3,SUM(b.$fieldhari4) AS $fieldhari4,SUM(b.$fieldhari5) AS $fieldhari5,SUM(b.$fieldhari6) AS $fieldhari6,SUM(b.$fieldhari6-b.$fieldhari1) AS naik,SUM((b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100) AS turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas GROUP BY b.nonas";}else{$text = "SELECT a.uraian,a.sandi,b.$fieldhari1,b.$fieldhari2,b.$fieldhari3,b.$fieldhari4,b.$fieldhari5,b.$fieldhari6,b.$fieldhari6-b.$fieldhari1 as naik,(b.$fieldhari6-b.$fieldhari1)/b.$fieldhari6*100 as turun FROM $tabel a JOIN $tabel_sandi b ON a.sandi=b.nonas WHERE b.branch='$branch' ORDER BY b.nonas";}$hasil=$result->query_lap($text);include '../judul.php';
?>
<table width="100%" class="table">
<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">REKENING</th>
	<th rowspan="2">URAIAN</th>
	<th colspan="2">SALDO AWAL <?php echo $thn;?></th>
	<th colspan="2">MUTASI KAS</th>
	<th colspan="2">MUTASI MEMORIAL</th>
	<th colspan="2">SALDO AKHIR <?php echo $thn;?></th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>DEBET</th>
	<th>KREDIT</th>	
</tr>
</thead>
<?php include 'fneracalajur.php'; ?>
</table>