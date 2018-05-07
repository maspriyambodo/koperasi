<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../kasbesar/kas_besar00.php";
$desc="REKAP MUTASI BUKU KAS BULAN : ".strtoupper(nmbulan($bln)).' - '.$thn;
$tabel_form="../kasbesar/ftagihanr.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>