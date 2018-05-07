<?php 
include '../h_tetap.php';
$ada=FALSE;include "../memorial/daftar_memorial33.php";
$desc="REKAP TRANSAKSI BULAN : ".strtoupper(nmbulan($bln))." - ".$thn;
$tabel_form="../memorial/rekap_memorial55.php";
$kolom=6;$kertas=2;
include '../pilih_laporan.php';
?>