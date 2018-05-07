<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../susulan/lap_kredita22.php";
$desc="DAFTAR TIDAK TERTAGIH SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../lapkredit/lap_kreditayy.php";
$kolom=12;$kertas=1;
include '../pilih_laporan.php';
?>