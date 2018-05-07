<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../micror/rekap_tagihantt.php"; 
$desc="DAFTAR TIDAK TERTAGIH MICRO BULAN : ".nmbulan($bln).' '.$thn;
$tabel_form="../realisasi/rekap_tagihanss.php";
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>