<?php
include 'h_tetap.php';$ada=FALSE;
if(isset($_POST["alasan_tt"])){
	$result->tem_tabel($userid,'tem_norek');
	$idCount = count($_POST["alasan_tt"]);
	for($i=0;$i<$idCount;$i++) {
		if($_POST["alasan_tt"][$i]!=0){
		$result->query_y1("UPDATE $tabelTagihan SET kdtran=333,alasan_tt='".$_POST["alasan_tt"][$i]."',solusi_tt='".$_POST["solusi_tt"][$i]."',bussdate=now() WHERE id='".$_POST["id"][$i]."'");
		$result->query_y1("INSERT INTO $userid SELECT id,norek,kdkop FROM $tabelTagihan WHERE Id='".$_POST["id"][$i]."'");
		$ada=TRUE;
		}
	}
	if($ada){
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
		$catat="Transaksi Kwitansi Kembali ".$t;
		include 'around.php';
	}else{
		echo 'Anda Belum Menilih Alasan Tidak Di Tagih...?';
	}
}else{
	echo 'Anda Belum Menilih Alasan Tidak Di Tagih...?';
}
?>