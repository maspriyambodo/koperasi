<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../laprekap/query_setoran030.php";
$desc="DAFTAR PEMBAYARAN ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/daftar_setor03x.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>