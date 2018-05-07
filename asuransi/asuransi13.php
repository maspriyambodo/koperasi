<?php 
include '../h_tetap.php';
$ada=TRUE;include "../asuransi/asuransi10.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP PINJAMAN YANG DI ASURANSIKAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../asuransi/asuransi14.php";
$kolom=9;$kertas=2;
include '../pilih_laporan.php';
?>