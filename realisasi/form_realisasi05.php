<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../realisasi/form_query55.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP TIDAK TERTAGIH BERDASARKAN ALASAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/form_realisasi55.php";
$kolom=9;$kertas=2;
include '../pilih_laporan.php';
?>