<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../micror/qtagihand.php";
$desc="REKAP RENCANA TAGIHAN MICRO BULAN : ".nmbulan($bln).' - '.$thn;
$tabel_form="../micror/ftagihanr.php";
$kolom=7;$kertas=2;
include '../pilih_laporan.php';
?>