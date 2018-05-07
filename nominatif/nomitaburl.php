<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../nominatif/nomitabuqr.php";
$desc='REKAP NOMINATIF TABUNGAN BULAN : '.strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../nomihari/fnomitabur.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>