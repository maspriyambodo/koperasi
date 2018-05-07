<?php
include 'h_atas.php';
if (isset($_GET['term'])){
	$return_arr = array();
	$term=$_GET['term'];
	$stmt = $result->query_y1("SELECT userid,nama FROM tbluser WHERE userid LIKE '%$term%' ORDER BY userid LIMIT 15");
	while($row = $stmt->row($stmt)) {
		$json[] = array(
			'label' => $row['userid'].' '.$row['nama'],
			'value' => $row['userid'],
			'nama' => $row['userid']
		);
	}
	echo json_encode($json);
}
?>