<?php
$hasil = $result->res("SELECT kdpen,ketpen FROM jenpen ORDER BY kdpen");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='./json/jpensiun.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>