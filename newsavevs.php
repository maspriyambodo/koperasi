<?php 
include 'h_tetap.php';
if(isset( $_POST['id'])){
	$idCount = count($_POST["id"]);
	for($i=0;$i<$idCount;$i++) {
		$result->res("UPDATE $tabel_tabungan SET kdaktif=1,user_otorisasi='$userid',tgl_otorisasi=now() WHERE Id='". $_POST["id"][$i]."'");
	}
	echo 'Sukses Otorisasi Rekening Tabungan';
	$result->close();
	$catat="Otorisasi Rekening Tabungan ";
	include 'around.php';
}else{
	echo 'Anda Belum Memilih Salah Satu...?';
}?>