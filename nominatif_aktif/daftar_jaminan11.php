<?php
include '../h_tetap.php'; 
include "../nominatif_aktif/daftar_jaminan00.php";
$desc='DAFTAR NOMINATIF JAMINAN TANGGAL : '.$tanggal;
$pilih=$result->c_d($_GET['p']);
$tabel_form="../ketnas/form_daftar.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>