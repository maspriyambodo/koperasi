<?php
include '../h_tetap.php'; 
$ada=FALSE;include "../nominatif_asuransi/nomi_asuransi10.php";
$desc='REKAP NOMINATIF ASURANSI  BULAN : '.nmbulan($bln).' '.$thn;
$tabel_form="../nominatif_asuransi/nomi_asuransiyy.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>