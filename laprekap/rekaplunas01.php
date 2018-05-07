<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../laprekap/query_pelunasan.php";
$desc="REKAP PELUNASAN ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/rekaplunas00.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>