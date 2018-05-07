<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
if($xxx!=''){
	$hasil = $result->res("SELECT a.branch,a.nonas,a.sufix,a.norek,b.nama,a.produk FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.nonas LIKE '%$xxx%' OR b.nama LIKE '%$xxx%' ORDER BY a.nonas");
	$rows = array();
	while ($data = $result->row($hasil)){
	  $rows[] = $data;
	}
	echo json_encode($rows);
}
?>