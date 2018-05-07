<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../susulan/lap_kredita11.php";
$desc="DAFTAR RENCANA TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../lapkredit/lap_kreditryy.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>