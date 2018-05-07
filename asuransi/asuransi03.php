<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../asuransi/asuransi01.php";
$desc="REKAP PREMI ASURANSI HARIAN TANGGAL : ".date_sql($tgl1).' S/D '.date_sql($tgl2);
$tabel_form="../asuransi/asuransixx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>