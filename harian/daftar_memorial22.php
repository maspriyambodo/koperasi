<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../harian/daftar_memorial00.php";
$desc="REKAP MUTASI MEMORIAL SYSTEM HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_memorialxx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>