<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../susulan/lap_kredita11.php";
$desc="REKAP RENCANA TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../lapkredit/lap_kreditaxx.php";
$kolom=7;$kertas=2;
include '../pilih_laporan.php';
?>