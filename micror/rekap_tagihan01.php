<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../micror/rekap_tagihanaa.php"; 
$desc="REKAP REALISASI TAGIHAN MICRO BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../micror/lap_kredit5xx.php";
$kolom=12;$kertas=1;
include '../pilih_laporan.php';
?>