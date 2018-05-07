<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../realisasi/form_query22.php";
$pilih=$result->c_d($_GET['p']);
$desc="LAPORAN DAFTAR REALISASI TAGIHAN SUSUSLAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/form_realisasi11.php";
$kolom=19;$kertas=1;
include '../pilih_laporan.php';
?>