<?php
include '../h_tetap.php';
$ada=TRUE;include "../memorial/daftar_memorial33.php";
$desc="DAFTAR TRANSAKSI KAS BULAN : ".strtoupper(nmbulan($bln))." - ".$thn;
$tabel_form="../memorial/rekap_memorial33.php";
$kolom=5;$kertas=1;
include '../pilih_laporan.php';
?>