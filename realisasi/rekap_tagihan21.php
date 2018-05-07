<?php
include '../h_tetap.php'; 
$ada=FALSE;include "../realisasi/query_tagihan21.php";
$pilih=$result->c_d($_GET['p']);
$desc="REKAP TAGIHAN BELUM REALISASI BULAN : ".strtoupper(nmbulan($bln)).' '.$thn;
$tabel_form="../realisasi/rekap_tagihancc.php";
$kolom=8;$kertas=1;
include '../pilih_laporan.php';
?>