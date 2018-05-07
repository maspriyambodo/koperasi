<?php
include '../h_tetap.php';
$ada=TRUE;include "../kasbesar/kas_besarc00.php";
$desc="LAPORAN CASH FLOW BULAN : ".nmbulan($bln).' - '.$thn;
$tabel_form="../kasbesar/kas_besarcxx.php";
$kolom=6;$kertas=2;
include '../pilih_laporan.php';
?>