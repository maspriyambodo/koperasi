<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../asuransi/asuransi20.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR PINJAMAN NON ASURANSI BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../asuransi/asuransi2y.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>