<?php
include 'h_atas.php';
$return_arr = array();
$stmt = $result->res("SELECT branch,norek,nama FROM master WHERE branch='$kcabang' ORDER BY norek");no=1;
while($row = $stmt->row($stmt)) {
	$json[] = array(
		'id' => $no, 
		'norek' => $row['norek'], 
		'nama' => $row['nama']
	);
	$no++;
}
echo json_encode($json);
?>