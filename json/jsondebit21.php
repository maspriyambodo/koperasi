<?php
$hasil = $result->res("SELECT kode,desc1,grp FROM debit21 ORDER BY desc1,grp");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='./json/debit21.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>