<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../lapkredit/lap_kredit511.php";
$desc="REKAP REALISASI DAN SETORAN TAGIHAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../lapkredit/lap_kredit5xx.php";
$kolom=13;$kertas=2;
include '../pilih_laporan.php';
?>