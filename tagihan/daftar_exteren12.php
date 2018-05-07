<?php
include '../h_tetap.php';
include '../Lib/ftanggal.php';
include "../tagihan/daftar_exteren11.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR RENCANA TAGIHAN BTPN (TUNGGAKAN) : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form='../tagihan/daftar_exteren13.php';
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>