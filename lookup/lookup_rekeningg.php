<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
//$yyy = $result->c_d($_GET['cabang']);
if($xxx!=''){
	$hasil = $result->res("SELECT a.branch,a.nonas,a.sufix,a.norek,a.produk,b.nama FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.branch='$kcabang' AND (a.nonas LIKE '%$xxx%' OR b.nama LIKE '%$xxx%') UNION ALL SELECT branch,nonas,sufix,norekgssl as norek,produk,nama FROM $tabel_sandi WHERE branch='$kcabang' AND (nonas LIKE '%$xxx%' OR nama LIKE '%$xxx%') ORDER BY produk,nonas");
	$rows = array();
	while ($data = $result->row($hasil)){
		$rows[] = $data;
	}
	echo json_encode($rows);
}
?>