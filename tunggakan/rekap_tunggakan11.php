<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../tunggakan/daftar_query11.php"; 
$desc="REKAP TUNGGAKAN ANGSURAN POSISI TANGGAL : ".date_sql($tanggal);
$tabel_form="../tunggakan/rekap_form11.php";
$kolom=9;$kertas=2;
include '../pilih_laporan.php';
?>