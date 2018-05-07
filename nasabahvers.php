<?php 
include 'h_tetap.php';
if(isset( $_POST['id'])){
	$idCount = count($_POST["id"]);
	for($i=0;$i<$idCount;$i++) {
		$result->query_y1("UPDATE $tabel_nasabah SET status_cif=1,user_otorisasi='$userid',tgl_otorisasi=now() WHERE Id='". $_POST["id"][$i]."'");
	}
	echo 'Sukses Otorisasi Data Nasabah';
	$result->close();
	$catat="Otorisasi Data Nasabah Oleh ";
	include 'around.php';
}else{
	echo 'Anda Belum Memilih Salah Satu...?';
}?>