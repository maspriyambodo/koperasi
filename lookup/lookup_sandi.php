<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
$hasil = $result->res("SELECT branch,nonas,sufix,norekgssl as norek,nama FROM $tabel_sandi WHERE branch='$kcabang' AND (nonas LIKE '%$xxx%' OR nama LIKE '%$xxx%') ORDER BY norekgssl");
$rows = array();
while ($data = $result->row($hasil)){
	$rows[] = $data;
}
echo json_encode($rows);
?>