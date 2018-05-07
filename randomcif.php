<?php
include 'Lib/random.php';
$hasil = $result->query_y1("SELECT SUBSTR(MAX(nonas),1,4) AS cif FROM nasabah");
$datamax= $result->row($hasil);
if($datamax['cif']=='') {
	$nonas='1000'.random_char(2);
	if($kcabang!='0061'){
		$nonas='2000'.random_char(2);
	}
}else {
	$makscif = $datamax['cif'];
	$nonas=$makscif.random_char(2);
	$hasil = $result->query_y1("SELECT nonas FROM nasabah WHERE nonas='$nonas'");
	$check = $result->num($hasil);
	if(!empty($check)){ 
		$makscif++;
		$nonas=$makscif.random_char(2);
	}	
}?>