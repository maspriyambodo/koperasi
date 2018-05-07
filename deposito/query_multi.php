<?php
$result=$mysql->multi_query($text);
 if(!$result){
 	$error=mysqli_errno($mysql);$err='';
 	include 'query_data_error.php';
	die("Proses Tidak Berhasil, ".$err." Error No :".$error);
}
?>