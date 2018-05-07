<?php
include "../gaji/par_atas01.php";
$xxx = $result->clean_data($_GET['chars']);
//if($xxx!=''){
	$text="SELECT a.kode_lokasi,a.nama_lokasi,a.kode_wilayah,a.kode_organisasi,b.nama_wilayah,c.nama_organisasi FROM $tabel_lokasi a JOIN $tabel_wilayah b ON a.kode_wilayah=b.kode_wilayah JOIN $tabel_organisasi c ON a.kode_organisasi=c.kode_organisasi WHERE a.kode_lokasi LIKE '%$xxx%' OR a.nama_lokasi LIKE '%$xxx%' OR b.nama_wilayah LIKE '%$xxx%' OR c.nama_organisasi LIKE '%xxx%' ORDER BY a.kode_lokasi"; 
	$hasil = $result->query_2($text,'');
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
//}
?>