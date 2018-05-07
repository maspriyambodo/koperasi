<?php 
include '../h_tetap.php'; 
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../lap_deposito/daftar_cadnh00.php";
$desc="DAFTAR CADANGAN BUNGA HARIAN TANGGAL : ".date_sql($tgl_buka).' S/D '.date_sql($tgl_akhir);
$tabel_form="../lap_deposito/daftar_cadnh11.php";
$kolom=13;$kertas=1;
include '../pilih_laporan.php';
?>