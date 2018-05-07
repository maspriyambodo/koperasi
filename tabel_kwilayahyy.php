<?php
include 'h_tetap.php';
$kd_wilayah=$_POST['nonas'];
$hasil=$result->query_lap("SELECT branch,kd,nmkb,tgl_input FROM $tabel_wkb WHERE kd LIKE '%$kd_wilayah%' OR nmkb LIKE '%$kd_wilayah%' ORDER BY kd");$no=1;
include "tabel_kwilayahxx.php";