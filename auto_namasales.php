<?php 
include 'h_atas.php';
if(isset($_GET['term'])){
	$return_arr=array();
	$term=$_GET['term'];
	$hasil = $result->res("SELECT branch,idsales,nama FROM $tabel_sales WHERE branch='$kcabang' AND (idsales LIKE '%$term%' OR nama LIKE '%$term%') ORDER BY nama");
	while($row = $result->row($hasil)) {
		$json[] = array(
			'label'  => $row['idsales'].' '.$row['nama'],
			'value'  => $row['nama'],
			'idsales'=> $row['idsales']
		);
	}
	echo json_encode($json);
}
?>