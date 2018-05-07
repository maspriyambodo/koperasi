<?php 
include '../h_tetap.php';
$ada=FALSE;include "../memorial/rekap_memorial00.php";
$desc="REKAP TRANSAKSI HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../memorial/rekap_memorialxx.php";
$kolom=11;$kertas=2;
include '../pilih_laporan.php';
?>