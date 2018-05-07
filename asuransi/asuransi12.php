<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../asuransi/asuransi11.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR PINJAMAN YANG DI ASURANSIKAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../asuransi/asuransi15.php";
$kolom=11;$kertas=2;
include '../pilih_laporan.php';
?>