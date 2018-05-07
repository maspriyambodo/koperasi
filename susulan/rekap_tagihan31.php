<?php
include '../h_tetap.php'; 
$ada=FALSE;include "../susulan/query_tagihan31.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP TAGIHAN TIDAK TERTAGIH SUSULAN BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihanrr.php";
$kolom=8;$kertas=1;
include '../pilih_laporan.php';
?>