<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../asuransi/asuransix1.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR PREMI ASURANSI BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../asuransi/asuransiyy.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>