<?php
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../micror/qtagihand.php";
$desc="DAFTAR RENCANA TAGIHAN MICRO BULAN : ".nmbulan($bln).' - '.$thn;
$tabel_form='../micror/ftagihand.php';
$kolom=8;$kertas=2;
include '../pilih_laporan.php';
?>