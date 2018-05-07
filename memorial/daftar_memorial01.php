<?php
include '../h_tetap.php';
$ada=TRUE;include "../memorial/rekap_memorial00.php";
$desc="DAFTAR TRANSAKSI HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../memorial/daftar_memorialxx.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>