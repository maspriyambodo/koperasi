<?php
$hasil=$result->res("SELECT kode,desc1 FROM kode_provinsi ORDER BY kode");
$emparray = array();
while($row=$result->row($hasil)){
	$emparray[] = $row;
}
$file='json/propinsi.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>