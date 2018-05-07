<?php 
include '../h_tetap.php';
$ada=FALSE;include "../memorial/daftar_memorial33.php";
$desc="REKAP TRANSAKSI KAS BULAN : ".nmbulan($bln)." S/D ".$thn;
$tabel_form="../memorial/rekap_memorial33.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>