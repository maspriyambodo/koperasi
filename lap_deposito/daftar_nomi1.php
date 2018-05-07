<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../lap_deposito/query_nomi00.php";
$desc="DAFTAR NOMINATIF DEPOSITO BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../lap_deposito/daftar_nomi00.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>