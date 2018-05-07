<?php
$hasil=$result->res("SELECT kode,desc1 FROM kode_kabupaten ORDER BY kode");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='json/kabupaten.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>