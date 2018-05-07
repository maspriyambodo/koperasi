<?php
include 'h_tetap.php';
$kd_wilayah=$_POST['nonas'];
$hasil=$result->query_lap("SELECT kode,desc1,bussdate FROM kode_provinsi WHERE kode LIKE '%$kd_wilayah%' OR desc1 LIKE '%$kd_wilayah%' ORDER BY kode");$no=1;
include "tabel_propinsixx.php";