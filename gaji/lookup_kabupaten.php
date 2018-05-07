<?php
include "../gaji/par_atas01.php";
$xxx = $result->clean_data($_GET['chars']);
if($xxx!=''){
	$text="SELECT a.kode,a.desc1,b.kode AS kode2,b.desc1 AS desc2 FROM $tabel_kabupaten a JOIN $tabel_propinsi b ON a.kode_provinsi=b.kode WHERE a.kode LIKE '%$xxx%' OR a.desc1 LIKE '%$xxx%' OR b.desc1 LIKE '%$xxx%' ORDER BY a.desc1"; 
	$hasil = $result->query_2($text,'');
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>