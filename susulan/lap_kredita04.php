<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../susulan/lap_kredita00.php";
$desc="DAFTAR REALISASI TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../lapkredit/lap_kreditryy.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>