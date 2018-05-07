<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../susulan/rencana_seluruh_q.php";
$desc="DAFTAR RENCANA TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../susulan/lap_kreditryyy.php";
$kolom=18;$kertas=1;
include '../pilih_laporan.php';
?>