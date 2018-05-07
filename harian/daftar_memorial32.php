<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../harian/daftar_memorial30.php";
$desc="REKAP MUTASI MEMORIAL LAINNYA TANGGAL  : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_memorialxx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>