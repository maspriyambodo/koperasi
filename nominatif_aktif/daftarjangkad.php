<?php
include '../h_tetap.php'; 
include "../nominatif_aktif/daftar_query.php";
$desc='DAFTAR NOMINATIF BULAN : '.nmbulan($bln).' '.$thn;
$tabel_form="../ketnas/form_daftar.php";
$kolom=14;$kertas=1;
include '../pilih_laporan.php';
?>