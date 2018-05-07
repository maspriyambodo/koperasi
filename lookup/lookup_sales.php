<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
if($xxx!=''){
	$hasil = $result->res("SELECT branch,idsales,nama FROM $tabel_sales WHERE branch='$kcabang' AND (idsales LIKE '%$xxx%' OR nama LIKE '%$xxx%') ORDER BY nama");
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>