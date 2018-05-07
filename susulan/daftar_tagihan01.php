<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../susulan/query_tagihan01.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR REALISASI TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihanbb.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>