<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../susulan/lap_kredita00.php";
$desc="REKAP REALISASI TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../lapkredit/lap_kreditaxx.php";
$kolom=7;$kertas=2;
include '../pilih_laporan.php';
?>