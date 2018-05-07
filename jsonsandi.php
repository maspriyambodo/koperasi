<?php
$hasil=$result->res("SELECT nonas,nama FROM akuntansi.sandim ORDER BY nonas");
if($result->num($hasil)==0)die("Data Sandi Akuntansi Tidak Ada...?  ");
$emparray = array();
while($row = $result->row($hasil)){
	$emparray[]=$row;
}
$file='json/sandi.json';
$fp = fopen($file, 'w');
fwrite($fp, json_encode($emparray));
fclose($fp);
?>