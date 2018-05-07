<?php 
include 'h_atas.php';
$term = $_GET['nama_sales'];
$stmt=$result->res("SELECT idsales FROM $tabel_sales WHERE nama='$term' LIMIT 1");
if($result->num($stmt)!=0) {
	$row=$result->row($stmt);
	$data['idsales'] = $row['idsales'];
	echo json_encode($data);
}else{
	$data['idsales'] = 'None';
	echo json_encode($data);
}
?>