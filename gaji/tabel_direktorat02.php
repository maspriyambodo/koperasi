<?php
include "../gaji/par_atas01.php";
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->clean_data($_POST['id']);
	$kode_organisasi=$result->clean_data($_POST['kode_organisasi']);
	if($kode_organisasi==''){
		die('Kode Organisasi Belum Di Isi...?');
	}
	$nama_organisasi=$result->clean_data($_POST['nama_organisasi']);
	$hasil= $result->query_y("SELECT id FROM $tabel_organisasi WHERE id='$id' LIMIT 1",'');
	if ($result->num($hasil)<1){
		$result->query_y1("INSERT INTO $tabel_organisasi(id,kode_organisasi,nama_organisasi) VALUES ('','$kode_organisasi','$nama_organisasi')");
		$result->close();
		echo "Sukses Ditambahkan";
	}else{
		$result->query_y1("UPDATE $tabel_organisasi SET nama_organisasi='$nama_organisasi' WHERE id='$id' LIMIT 1");
		$result->close();
		echo "Sukses Diupdate";
	}
	break;
case "2":
	$id=$result->clean_data($_GET['id']);
	$result->query_y1("DELETE FROM $tabel_organisasi WHERE id = '$id' LIMIT 1");
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>