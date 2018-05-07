<?php
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../inventaris/inventaris_07x.php";
$desc='DAFTAR INVENTARIS BULAN : '.strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../inventaris/daftar_invenxx.php";
$kolom=12;$kertas=1;
include '../pilih_laporan.php';
?>