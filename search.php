<?php
include 'h_atas.php';
if (isset($_GET['term'])){
	$return_arr = array();
	$term=$_GET['term'];
	$stmt = $result->query_y1("SELECT nama FROM sales WHERE nama LIKE '%$term%'");
	while($row = $stmt->row($stmt)) {
		$return_arr[] =  $row['nama'];
	}
	echo json_encode($return_arr);
}
?>