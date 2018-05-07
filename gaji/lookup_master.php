<?php
include "../gaji/par_atas01.php";
$xxx = $result->clean_data($_GET['chars']);
$text="SELECT branch,nik,nama_karyawan,no_ktp,tgl_lahir FROM $tabel_master WHERE nik LIKE '%$xxx%' OR nama_karyawan LIKE '%$xxx%') ORDER BY nik";
$hasil = $result->query_2($text,'');
$rows = array();
while ($data = $result->row($hasil)){
	$rows[] = $data;
}
echo json_encode($rows);
?>