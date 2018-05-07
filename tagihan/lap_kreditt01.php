<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../tagihan/lap_kredita22.php";
$desc="LAPORAN REKAP TIDAK TERTAGIH BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../tagihan/lap_kredittxx.php";
$kolom=15;$kertas=2;
include '../pilih_laporan.php';
?>