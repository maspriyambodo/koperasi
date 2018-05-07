<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../tagihan/lap_kredita00.php";
$desc="LAPORAN REKAP RENCANA TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../susulan/lap_kreditaxx.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>