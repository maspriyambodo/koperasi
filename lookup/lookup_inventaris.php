<?php
include '../h_tetap.php';
$xxx = $result->c_d($_GET['chars']);
$hasil = $result->res("SELECT branch,no_inventaris,nama_inventaris,nilai_perolehan,akumulasi_penyusutan FROM $tabel_inventaris WHERE no_inventaris LIKE '%$xxx%' OR nama_inventaris LIKE '%$xxx%' ORDER BY no_inventaris");
$rows = array();
while ($data = $result->row($hasil)){
	$rows[] = $data;
}
echo json_encode($rows);
?>