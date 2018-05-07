<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
if($xxx!=''){
	$hasil = $result->res("SELECT a.kode,a.desc1,b.desc1 AS desc2 FROM kode_kabupaten a JOIN kode_provinsi b ON a.kode_provinsi=b.kode WHERE a.kode LIKE '%$xxx%' OR a.desc1 LIKE '%$xxx%' OR b.desc1 LIKE '%$xxx%' ORDER BY a.desc1"); 
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>