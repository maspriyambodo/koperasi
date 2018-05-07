<?php
$hasil=$result->res("SELECT kode,desc1 FROM kode_pos ORDER BY kode");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='json/kpos.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>