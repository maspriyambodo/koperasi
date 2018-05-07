<?php
include "../gaji/par_atas01.php";
$xxx = $result->clean_data($_GET['chars']);
$text="SELECT kode_grade,grade,keterangan,gaji_pokok FROM $tabel_grade WHERE kode_grade LIKE '%$xxx%' OR keterangan LIKE '%$xxx%' ORDER BY grade"; 
$hasil = $result->query_2($text,'');
$rows = array();
while ($data = $result->row($hasil)){
	$rows[] = $data;
}
echo json_encode($rows);
?>