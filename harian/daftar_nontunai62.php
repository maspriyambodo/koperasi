<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../harian/daftar_nontunai50.php";
$desc="REKAP JURNAL MEMORIAL BULAN : ".strtoupper(nmbulan($bln))." ".$thn;
$tabel_form="../harian/daftar_nontunaixx.php";
$kolom=5;$kertas=2;
include '../pilih_laporan.php';
?>