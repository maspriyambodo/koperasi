<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../susulan/rencana_seluruh_q.php";
$desc="REKAP RENCANA TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../susulan/lap_kreditaxx.php";
$kolom=15;$kertas=1;
include '../pilih_laporan.php';
?>