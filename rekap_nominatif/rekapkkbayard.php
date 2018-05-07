<?php 
include '../h_tetap.php'; 
$ada=TRUE;include "../rekap_nominatif/rpt_laporan.php";
include "../rekap_nominatif/rekapkkbayarq.php";
$desc="REKAP OBD PER KANTOR BAYAR BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../rekap_nominatif/rekapkkbayarf.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>