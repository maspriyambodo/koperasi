<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../harian/daftar_memorial30.php";
$desc="DAFTAR MUTASI MEMORIAL LAINNYA TANGGAL  : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_memorialyy.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>