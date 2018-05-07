<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../realisasi/query_tagihan01.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP REALISASI TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihancc.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>