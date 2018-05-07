<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../laprekap/query_setoran00.php";
$desc="DAFTAR SETORAN ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/daftar_setor00.php";
$kolom=10;$kertas=2;
include '../pilih_laporan.php';
?>