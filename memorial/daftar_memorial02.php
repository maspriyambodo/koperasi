<?php
include '../h_tetap.php';
$ada=TRUE;include "../memorial/rekap_memorial22.php";
$desc="DAFTAR TRANSAKSI BULAN : ".strtoupper(nmbulan($bln))." - ".$thn;
$tabel_form="../memorial/daftar_memorialxx.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>