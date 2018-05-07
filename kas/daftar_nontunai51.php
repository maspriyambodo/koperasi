<?php
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../kas/daftar_nontunai50.php";
$desc="DAFTAR JURNAL KAS BULAN : ".strtoupper(nmbulan($bln))." ".$thn;
$tabel_form="../harian/daftar_nontunaiyy.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>