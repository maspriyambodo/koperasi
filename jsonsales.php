<?php
$hasil=$result->query_lap("SELECT idsales,nama,notlp FROM $tabel_sales ORDER BY idsales");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[] = $row;
}
$file='json/sales.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>