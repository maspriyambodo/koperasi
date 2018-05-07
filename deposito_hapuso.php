<?php 
include 'h_tetap.php';
$catat='';
$ide =$result->c_d($_POST["ide"]);
$tabel="deposito.deposits_cadangan";
$hasil="UPDATE deposito.deposits a INNER JOIN (SELECT id_deposito,SUM(IF(flag_bayar=1,bunga_bersih,0)) AS bunga_bayar FROM $tabel GROUP BY id_deposito) b ON  a.id=b.id_deposito SET a.total_tarik=b.bunga_bayar WHERE a.id='$ide'";
if($result->c_d($_POST["p"])==1){
	if(isset($_POST['id'])){
		$idCount = count($_POST["id"]);
		for($i=0;$i<$idCount;$i++) {
			$result->query_y1("UPDATE deposito.deposits_cadangan SET flag_bayar=1 WHERE Id='".$_POST["id"][$i]."'");
			$catat .="Edit Flag Bayar Bunga Deposito ".$_POST["id"][$i]." Oleh ".$userid." - ";
		}
		$result->query_y1($hasil);
	}		
}else{
	if(isset($_POST['id'])){
		$idCount = count($_POST["id"]);
		for($i=0;$i<$idCount;$i++) {
			$result->query_y1("UPDATE deposito.deposits_cadangan SET flag_bayar=0 WHERE Id='".$_POST["id"][$i]."'");
			$catat .="Edit Flag Belum Bayar Bunga Deposito ".$_POST["id"][$i]." Oleh ".$userid." - ";
		}
		$result->query_y1($hasil);
	}		
}
echo 'Sukses';
$result->close();
include 'around.php';
?>