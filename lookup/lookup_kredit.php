<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
//$yyy = $result->c_d($_GET['cabang']);
if($xxx!=''){
	$hasil = $result->res("SELECT a.branch,a.nonas,a.sufix,a.norek,b.nama,a.produk,a.saldoa FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.branch='$kcabang' AND (a.nonas LIKE '%$xxx%' OR b.nama LIKE '%$xxx%') ORDER BY a.produk,a.nonas");
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>