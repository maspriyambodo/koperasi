<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../realisasi/form_query22.php";
$pilih=$result->c_d($_GET['p']);
$desc="LAPORAN REKAP REALISASI TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/form_realisasi00.php";
$kolom=19;$kertas=1;
include '../pilih_laporan.php';
?>