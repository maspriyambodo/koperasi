<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../tagihan/lap_kredita00.php";
$desc="DAFTAR RENCANA TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../susulan/lap_kreditryy.php";
$kolom=18;$kertas=1;
include '../pilih_laporan.php';
?>