<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../inventaris/daftar_inven00.php"; 
$desc="DAFTAR INVENTARIS TANGGAL : ".PAR_TANGGAL;
$tabel_form="../inventaris/daftar_invenxxx.php";
$kolom=12;$kertas=1;
include '../pilih_laporan.php';
?>