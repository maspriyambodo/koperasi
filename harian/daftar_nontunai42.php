<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../harian/daftar_nontunai40.php";
$desc="REKAP JURNAL MEMORIAL HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_nontunaixx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>