<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../realisasi/rekap_tagihantt.php";
$pilih=$result->c_d($_GET['p']);
$desc="DAFTAR TAGIHAN TIDAK TERTAGIH BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihanss.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>