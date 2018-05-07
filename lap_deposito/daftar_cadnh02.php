<?php 
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=FALSE;include "../lap_deposito/daftar_cadnh00.php";
$desc="REKAP CADANGAN BUNGA HARIAN TANGGAL : ".date_sql($tgl_buka).' S/D '.date_sql($tgl_akhir);
$tabel_form="../lap_deposito/daftar_cadnh22.php";
$kolom=7;$kertas=2;
include '../pilih_laporan.php';
?>