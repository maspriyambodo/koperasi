<?php
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../inventaris/inventaris_07x.php";
$desc='REKAP INVENTARIS BULAN : '.strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../inventaris/daftar_invenyy.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>