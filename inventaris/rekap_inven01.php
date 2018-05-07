<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../inventaris/daftar_inven00.php"; 
$desc="REKAP INVENTARIS TANGGAL : ".PAR_TANGGAL;
$tabel_form="../inventaris/daftar_invenyyy.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>