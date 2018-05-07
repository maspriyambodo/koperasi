<?php 
include 'h_atas.php';
$term = $_GET['sales_id'];
$stmt=$result->res("SELECT nama FROM $tabel_sales WHERE idsales='$term' LIMIT 1");
if($result->num($stmt)!=0) {
	$row=$result->row($stmt);
	$data['nama'] = $row['nama'];
	echo json_encode($data);
}else{
	$data['nama'] = 'Tidak Di Temukan!';
	echo json_encode($data);
}
?>