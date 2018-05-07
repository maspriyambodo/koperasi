<?php
include '../h_tetap.php';
include "../susulan/qsusuland.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR RENCANA TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form='../kwitansi/frtagihand.php';
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>