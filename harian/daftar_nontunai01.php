<?php
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../harian/daftar_nontunai00.php";
$desc="DAFTAR TRANSAKSI MEMORIAL MANUAL HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_memorialyy.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>