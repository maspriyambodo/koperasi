<?php 
include 'h_tetap.php';
$catat='';
$ide =$result->c_d($_POST["ide"]);
$tabel="deposito.deposits_cadangan";
if(isset($_POST['id'])){
	$idCount = count($_POST["id"]);
	for($i=0;$i<$idCount;$i++) {
		$result->query_y1("DELETE FROM deposito.deposits_cadangan WHERE Id='".$_POST["id"][$i]."'");
		$catat .="Hapus Bunga Deposito ".$_POST["id"][$i]." Oleh ".$userid." - ";
	}
	$hasil=$result->query_y1("UPDATE deposito.deposits a INNER JOIN (SELECT id_deposito,SUM(IF(flag_bayar=1,bunga_bersih,0)) AS bunga_bayar FROM $tabel GROUP BY id_deposito) b ON  a.id=b.id_deposito SET a.total_tarik=b.bunga_bayar WHERE a.id='$ide'");
	include 'around.php';
	echo 'Sukses';
	$result->close();
}else{
	echo 'Anda Belum Memilih Salah Satu...?';
}
?>