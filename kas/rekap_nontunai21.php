<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../kas/daftar_nontunai11.php";
$desc="REKAP JURNAL KAS HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_memorialxx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>