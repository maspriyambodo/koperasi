<?php
include '../h_tetap.php'; 
$ada=TRUE;include "../kasbesar/kas_besar00.php";
$desc="DAFTAR MUTASI BUKU KAS BULAN : ".strtoupper(nmbulan($bln)).' - '.$thn;
$tabel_form="../kasbesar/ftagihand.php";
$kolom=11;$kertas=1;
include '../pilih_laporan.php';
?>