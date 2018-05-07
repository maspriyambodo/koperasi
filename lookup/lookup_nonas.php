<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
if($xxx!=''){
	$hasil = $result->res("SELECT branch,nonas,nama,noktp FROM $tabel_nasabah WHERE branch='$kcabang' AND (nonas LIKE '%$xxx%' OR nama LIKE '%$xxx%') ORDER BY nonas,nama");
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>