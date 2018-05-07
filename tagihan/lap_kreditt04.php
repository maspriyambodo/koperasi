<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../tagihan/lap_kredita22.php";
$desc="DAFTAR TIDAK TERTAGIH BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../tagihan/lap_kredittyy.php";
$kolom=18;$kertas=1;
include '../pilih_laporan.php';
?>