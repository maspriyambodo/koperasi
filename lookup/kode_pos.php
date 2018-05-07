<?php
include "../h_atas.php";
if (isset($_GET['term'])){
	$return_arr = array();
	$term=$_GET['term'];
	$stmt = $result->res("SELECT kode,desc1 FROM kode_pos WHERE kode LIKE '%$term%' ORDER BY kode,desc1 LIMIT 15");
	while($row = $result->row($stmt)) {
		$json[] = array(
			'label' => $row['kode'].' '.$row['desc1'],
			'value' => $row['kode'],
			'nama' => $row['desc1']
		);
	}
	echo json_encode($json);
}
?>