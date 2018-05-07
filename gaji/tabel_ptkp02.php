<?php
include "../gaji/par_atas01.php";
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->clean_data($_POST['id']);
	$kode_ptkp=$result->clean_data($_POST['kode_ptkp']);
	if($kode_ptkp==''){
		die('Kode PTKP Belum Di Isi...?');
	}
	$keterangan=$result->clean_data($_POST['keterangan']);
	$jumlah_ptkp=keangka($result->clean_data($_POST['jumlah_ptkp']));
	$hasil= $result->query_y("SELECT id FROM $tabel_ptkp WHERE id='$id' LIMIT 1",'');
	if ($result->num($hasil)<1){
		$result->query_y1("INSERT INTO $tabel_ptkp(id,kode_ptkp,keterangan,jumlah_ptkp) VALUES ('','$kode_ptkp','$keterangan','$jumlah_ptkp')");
		$result->close();
		echo "Sukses Ditambahkan";
	}else{
		$result->query_y1("UPDATE $tabel_ptkp SET kode_ptkp='$kode_ptkp',keterangan='$keterangan',jumlah_ptkp='$jumlah_ptkp' WHERE id='$id' LIMIT 1");
		$result->close();
		echo "Sukses Diupdate";
	}
	break;
case "2":
	$id=$result->clean_data($_GET['id']);
	$result->query_y1("DELETE FROM $tabel_ptkp WHERE id = '$id' LIMIT 1");
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>