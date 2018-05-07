<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../tagihan/lap_kredita11.php";
$desc="LAPORAN REKAP REALISASI TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../tagihan/lap_kreditaxx.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>