<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../susulan/query_tagihan01.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP REALISASI TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihancc.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>