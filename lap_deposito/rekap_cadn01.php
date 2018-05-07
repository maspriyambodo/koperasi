<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../lap_deposito/query_cadn00.php";
$desc="REKAP PENCADANGAN BUNGA BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../lap_deposito/rekap_cadn00.php";
$kolom=7;$kertas=2;
include '../pilih_laporan.php';
?>