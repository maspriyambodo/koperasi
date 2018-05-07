<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../tunggakan/daftar_query11.php"; 
$desc="DAFTAR TUNGGAKAN ANGSURAN POSISI TANGGAL : ".date_sql($tanggal);
$tabel_form="../tunggakan/daftar_form11.php";
$kolom=13;$kertas=1;
include '../pilih_laporan.php';
?>