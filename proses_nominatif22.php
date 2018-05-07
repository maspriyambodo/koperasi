<?php
include 'h_tetap.php';
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$tabel =$tabel_tetap01.'nomi'.$bln.$thn;
$desc='REKAP NOMINATIF PINJAMAN BULAN : '.$bln.'-'.$thn;
$hasil=$result->query_x1("SELECT branch,kolek,kdkop,produk,deb1,SUM(nomi) nomi,SUM(saldoa) saldoa,SUM(mutdeb) mutdeb,SUM(mutkre) mutkre,SUM(memdeb) memdeb,SUM(memkre) memkre,SUM(saldo) saldo,count(*) as counter FROM $tabel GROUP BY produk,kolek ORDER BY produk,kolek");
if ($result->num($hasil)>0){
	echo '<div><table width="100%" class="table">';
	include "proses_nominatif23.php";
	echo '</table></div>';
}
?>