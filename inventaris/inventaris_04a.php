<?php
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../inventaris/inventaris_03x.php";
$desc='REKAP PENYUSUTAN INVENTARIS BULAN : '.strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../inventaris/inventaris_04y.php";
$kolom=9;$kertas=2;
include '../pilih_laporan.php';
?>