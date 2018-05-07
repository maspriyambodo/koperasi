<?php
$hasil=$result->res("SELECT branch,kd,nmkb FROM wkb ORDER BY nmkb");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='json/wilayah.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>