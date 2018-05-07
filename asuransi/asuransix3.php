<?php 
include '../h_tetap.php';
$ada=TRUE;include "../asuransi/asuransix0.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP PREMI ASURANSI BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../asuransi/asuransixx.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>