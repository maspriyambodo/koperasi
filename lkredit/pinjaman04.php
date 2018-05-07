<?php
include '../h_tetap.php';
include '../lkredit/qpinjaman44.php';
$desc="REKAP PINJAMAN PER KANTOR BAYAR BULAN  : ".strtoupper(nmbulan($bln))." ".$thn;
$tabel_form="../lkredit/fpinjaman44.php";
$kolom=17;$kertas=1;
include '../pilih_laporan.php';
?>