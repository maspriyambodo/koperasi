<?php 
include '../h_tetap.php';
$ada=FALSE;include "../memorial/daftar_bunga00.php";
$desc="REKAP BUNGA ADM DAN PAJAK BULAN  : ".nmbulan($bln).'  '.$thn;
$tabel_form="../memorial/daftar_bungayy.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>