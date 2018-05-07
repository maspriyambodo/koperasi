<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../tagihan/lap_kredita11.php";
$desc="DAFTAR REALISASI TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../tagihan/lap_kreditryy.php";
$kolom=18;$kertas=1;
include '../pilih_laporan.php';
?>