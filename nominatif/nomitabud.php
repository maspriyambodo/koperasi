<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../nominatif/nomitabuq.php";
$desc='DAFTAR NOMINATIF TABUNGAN BULAN : '.strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../nomihari/fnomitabud.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>
