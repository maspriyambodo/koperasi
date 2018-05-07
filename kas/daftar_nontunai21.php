<?php
include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../kas/daftar_nontunai11.php";
$desc="DAFTAR JURNAL KAS HARIAN TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../harian/daftar_nontunaiyy.php";
$kolom=10;$kertas=1;
include '../pilih_laporan.php';
?>