<?php
include '../h_tetap.php';
$ada=TRUE;include "../nominatif_asuransi/nomi_asuransi00.php";
$pilih=$result->c_d($_GET['p']);
$desc='DAFTAR NOMINATIF ASURANSI HARIAN TANGGAL : '.$tanggal;
$tabel_form="../nominatif_asuransi/nomi_asuransixx.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>
