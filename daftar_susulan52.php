<?php 
include 'h_tetap.php';
if(isset($_POST['id'])){
	$result->tem_tabel($userid,'tem_norek');
	$idCount = count($_POST["id"]);
	for($i=0;$i<$idCount;$i++) {
		$result->query_y1("UPDATE $tabelSusulan SET kdtran=111,alasan_tt=0,solusi_tt=NULL,bussdate=now() WHERE Id='". $_POST["id"][$i]."'");
		$result->query_y1("INSERT INTO $userid SELECT id,norek,kdkop FROM $tabelSusulan WHERE Id='". $_POST["id"][$i]."'");
	}
	$hasil=$result->res("SELECT norek,kdkop FROM $userid ORDER BY norek");
	if($result->num($hasil)!=0){ 
		while($row = $result->row($hasil)){ 
			$norek=$row['norek'];
			$kdkop=$row['kdkop'];
			include '_kolektibilitasx.php';
		}
	}
	echo 'Sukses';
	$result->close();
	$catat="Koreksi Kwitansi Kembali Susulan ".$tabelTagihan.' Oleh '.$userid;
	include 'around.php';
}else{
	echo 'Anda Belum Memilih Salah Satu...?';
}?>