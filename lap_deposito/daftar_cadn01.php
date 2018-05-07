<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../lap_deposito/query_cadn00.php";
$desc="DAFTAR PENCADANGAN BUNGA BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../lap_deposito/daftar_cadn00.php";
$kolom=13;$kertas=1;
include '../pilih_laporan.php';
?>