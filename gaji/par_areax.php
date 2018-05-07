<?php 
$hasilx=$result->query_y("SELECT nama_lokasi FROM $tabel_lokasi WHERE kode_lokasi='$kode_lokasi' LIMIT 1",'');$data = $result->row($hasilx);$nama_lokasix=$data['nama_lokasi'];
?>