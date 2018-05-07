<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../micror/rekap_tagihanaa.php"; 
$desc="DAFTAR REALISASI TAGIHAN MICRO BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../micror/lap_kredit5yy.php";
$kolom=13;$kertas=1;
include '../pilih_laporan.php';
?>