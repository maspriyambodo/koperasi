<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
if($xxx!=''){
	$hasil = $result->res("SELECT nonas,nama,produk,kode FROM akuntansi.sandim WHERE nonas LIKE '%$xxx%' OR nama LIKE '%$xxx%' ORDER BY nonas");
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>