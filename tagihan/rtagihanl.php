<?php
include '../h_tetap.php';
include '../Lib/ftanggal.php';
include "../tagihan/qtagihand.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR RENCANA TAGIHAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$bln=date('m',strtotime($tanggal));$thn=date('Y',strtotime($tanggal));
$tabel_form='../tagihan/tagihan_daftar.php';
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>