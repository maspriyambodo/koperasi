<?php 
include '../h_tetap.php';
$ada=FALSE;include "../memorial/daftar_memorial33.php";
$desc="REKAP TRANSAKSI MEMORIAL BULAN : ".strtoupper(nmbulan($bln))." - ".$thn;
$tabel_form="../memorial/rekap_memorial44.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>