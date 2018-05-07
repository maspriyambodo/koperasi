<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../laprekap/query_retur.php";
$desc="DAFTAR RETUR ANGSURAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../laprekap/daftar_setor00.php";
$kolom=13;$kertas=1;
include '../pilih_laporan.php';
?>