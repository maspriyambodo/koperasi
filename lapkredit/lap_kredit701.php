<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../lapkredit/lap_kredit711.php";
$desc="REKAP SETORAN ANGSURAN NON TAGIHAN (TUNGGAKAN) BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../lapkredit/lap_kredit7xx.php";
$kolom=8;$kertas=1;
include '../pilih_laporan.php';
?>