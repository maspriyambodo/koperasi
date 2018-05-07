<?php
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../inventaris/inventaris_03x.php";
$desc='DAFTAR PENYUSUTAN INVENTARIS BULAN : '.strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../inventaris/inventaris_03y.php";
$kolom=12;$kertas=1;
include '../pilih_laporan.php';
?>