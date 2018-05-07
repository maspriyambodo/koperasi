<?php 
include '../h_tetap.php';
include "../susulan/rekap_susulan_q.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP RENCANA TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../kwitansi/frtagihanr.php";
$kolom=7;$kertas=2;
include '../pilih_laporan.php';
?>