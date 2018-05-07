<?php
include "../h_tetap.php";
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$branch=$result->c_d($_GET['branch']);
$tabel =$tabel_transaksi.$bln.substr($thn,2,2);
include '../akuntansi/qakuntansi520.php';
if($thn!=$thnxxx) $tabel_sandi='akuntansi.sandi'.$thn;
$hasil=$result->query_lap("SELECT a.branch,a.nonas,SUM(a.debetmemo) AS debetmemo,SUM(a.kreditmemo) AS kreditmemo,b.nama,b.produk FROM $userid a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.debetmemo!=0 OR a.kreditmemo!=0 GROUP BY a.norekgl ORDER BY a.norekgl");
$desc="JURNAL TRANSAKSI MEMORIAL BULAN : ".nmbulan($bln).'-'.$thn;
echo '
<div style="height:360px;overflow: auto;">';
	include '../judul.php'; 
	echo '<table width="100%" class="table">';
		include '../akuntansi/fjurnalkredit.php';
	echo '</table>
</div>';
?>