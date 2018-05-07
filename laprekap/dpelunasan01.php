<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../laprekap/query_pelunasan.php";
$desc="DAFTAR PELUNASAN ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/dpelunasan00.php";
$kolom=13;$kertas=1;
include '../pilih_laporan.php';
?>