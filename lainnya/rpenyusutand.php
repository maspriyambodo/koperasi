<?php
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../lainnya/qpenyusutand.php";
$desc="DAFTAR MUTASI BIAYA PENYUSUTAN BULAN  : ".PAR_BLN." ".PAR_THN;
$tabel_form="../memorial/daftar_nontunaixx.php";
$kolom=12;$kertas=1;
include '../pilih_laporan.php';
?>