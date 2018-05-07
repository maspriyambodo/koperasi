<?php
include '../h_tetap.php';
include '../Lib/ftanggal.php';
include "../tagihan/daftar_exteren00.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR RENCANA TAGIHAN BTPN : ".strtoupper(nmbulan($bln)).' '.$thn;
$bln=date('m',strtotime($tanggal));$thn=date('Y',strtotime($tanggal));
$tabel_form='../tagihan/daftar_exteren02.php';
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>