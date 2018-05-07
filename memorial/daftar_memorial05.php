<?php
include '../h_tetap.php';
$ada=TRUE;include "../memorial/daftar_memorial33.php";
$desc="DAFTAR TRANSAKSI BULAN : ".strtoupper(nmbulan($bln))." - ".$thn;
$tabel_form="../memorial/rekap_memorial55.php";
$kolom=6;$kertas=1;
include '../pilih_laporan.php';
?>