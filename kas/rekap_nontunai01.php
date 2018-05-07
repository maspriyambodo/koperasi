<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../kas/daftar_nontunai00.php";
$desc="REKAP TRANSAKSI KAS HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../memorial/rekap_nontunaixx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>