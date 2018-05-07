<?php
include '../h_tetap.php';
$ada=FALSE;include "../nominatif_asuransi/nomi_asuransi00.php";
$pilih=$result->c_d($_GET['p']);
$desc='REKAP NOMINATIF ASURANSI HARIAN TANGGAL : '.$tanggal;
$tabel_form="../nominatif_asuransi/nomi_asuransiyy.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>