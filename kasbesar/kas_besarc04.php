<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../kasbesar/kas_besarc00.php";
$desc="LAPORAN REKAP CASH FLOW BULAN : ".nmbulan($bln).' - '.$thn;
$tabel_form="../kasbesar/kas_besarcyy.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>