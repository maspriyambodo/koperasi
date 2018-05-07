<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../laprekap/query_retur.php";
$desc="REKAP RETUR ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/rekapsetor00.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>