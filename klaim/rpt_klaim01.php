<?php include '../h_tetap.php';
$pilih=$result->c_d($_GET['p']);
$ada=TRUE;include "../klaim/rpt_klaim00.php";
$desc="DAFTAR PENCAIRAN PENGHAPUSAN OBD TANGGAL : ".date_sql($tgl1)." S/D ".date_sql($tgl2);
$tabel_form="../klaim/rpt_klaimxx.php";
$kolom=14;$kertas=1;
include '../pilih_laporan.php';
?>