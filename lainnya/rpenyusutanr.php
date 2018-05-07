<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../lainnya/qpenyusutand.php";
$desc="REKAP MUTASI BIAYA PENYUSUTAN TANGGAL  : ".PAR_BLN." ".PAR_THN;
$tabel_form="../memorial/rekap_nontunaixx.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>