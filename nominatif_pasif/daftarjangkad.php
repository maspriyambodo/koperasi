<?php
include '../h_tetap.php'; 
include "../nominatif_pasif/daftar_ketnasxx.php";
$desc='DAFTAR NOMINATIF TIDAK DITAGIH BULAN : '.nmbulan($bln).' '.$thn;
$tabel_form="../ketnas/daftar_ketnasyy.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>