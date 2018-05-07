<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../asuransi/asuransi00.php";
$desc="DAFTAR PREMI ASURANSI HARIAN TANGGAL : ".date_sql($tgl1).' S/D '.date_sql($tgl2);
$tabel_form="../asuransi/asuransiyy.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>