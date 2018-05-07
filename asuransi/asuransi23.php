<?php 
include '../h_tetap.php';
$ada=TRUE;include "../asuransi/asuransi21.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP PINJAMAN NON ASURANSI BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../asuransi/asuransi2x.php";
$kolom=6;$kertas=2;
include '../pilih_laporan.php';
?>