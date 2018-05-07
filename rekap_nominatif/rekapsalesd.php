<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../rekap_nominatif/rpt_laporan.php";
include "../rekap_nominatif/rekapsalesq.php";
$desc="REKAP OBD PER SALES BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../rekap_nominatif/rekapsalesf.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>