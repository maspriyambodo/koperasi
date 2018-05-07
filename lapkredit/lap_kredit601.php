<?php 
include '../h_tetap.php'; 
$ada=FALSE;include "../lapkredit/lap_kredit611.php";
$desc="REKAP SETORAN TIDAK TERTAGIH TAGIHAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../lapkredit/lap_kredit6xx.php";
$kolom=18;$kertas=1;
include '../pilih_laporan.php';
?>