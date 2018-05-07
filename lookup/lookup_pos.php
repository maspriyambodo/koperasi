<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
if($xxx!=''){
	$hasil = $result->res("SELECT kode,desc1,desc2,desc3,desc4 FROM kode_pos WHERE kode LIKE '%$xxx%' OR desc1 LIKE '%$xxx%' OR desc2 LIKE '%$xxx%' OR desc3 LIKE '%$xxx%' OR desc4 LIKE '%$xxx%' ORDER BY kode,desc1");
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>