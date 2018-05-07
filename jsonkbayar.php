<?php
$hasil = $result->res("SELECT branch,kd,nmkb FROM kkb ORDER BY nmkb");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='json/kbayar.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>