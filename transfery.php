<?php
include 'h_tetap.php';
$branch=$kcabang;
$r=$result->res("SELECT id,norek FROM transaksi ORDER BY norek");
if (!$r){
	die("Query failed : ".mysqli_error($mysql));
}
while ($row = $result->row($r)) {
	$norek='00'.$row['norek'];
	$id=$row['id'];
	$result->res("UPDATE transaksi SET norekx='$norek' WHERE id='$id' LIMIT 1");
	echo $norek;
}
?>