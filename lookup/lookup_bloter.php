<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
$hasil = $result->res("SELECT a.branch,a.userid,a.bloterid,b.nama,a.saldo_akhir FROM tbl_bloter a JOIN tbluser b ON a.userid=b.userid WHERE a.branch='$kcabang' AND a.bloterid LIKE '%$xxx%' ORDER BY b.nama");
$rows = array();
while ($data = $result->row($hasil)){
	$rows[] = $data;
}
echo json_encode($rows);
?>