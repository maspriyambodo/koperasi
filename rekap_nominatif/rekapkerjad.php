<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../rekap_nominatif/rpt_laporan.php";
include "../rekap_nominatif/rekapkerjaq.php";
$desc="REKAP NOMINATIF PER PEKERJAAN BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../rekap_nominatif/rekapkerjaf.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>