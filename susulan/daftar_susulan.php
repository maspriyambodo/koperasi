<?php
include '../h_tetap.php';
include "../susulan/daftar_susulan_q.php";
$pilih=$result->clean_data($_GET['p']);
$desc="DAFTAR RENCANA TAGIHAN SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form='../kwitansi/frtagihand.php';
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>