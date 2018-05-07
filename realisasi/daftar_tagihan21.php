<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../realisasi/query_tagihan21.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR TAGIHAN BELUM REALISASI BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihanbb.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>