<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../kas/daftar_nontunai00.php";
$desc="DAFTAR TRANSAKSI KAS HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form='../memorial/daftar_nontunaixx.php';
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>