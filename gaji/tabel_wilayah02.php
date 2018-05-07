<?php
include "../gaji/par_atas01.php";
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->clean_data($_POST['id']);
	$kode_wilayah=$result->clean_data($_POST['kode_wilayah']);
	if($kode_wilayah==''){
		die('Kode Wilayah Belum Di Isi...?');
	}
	$nama_wilayah=$result->clean_data($_POST['nama_wilayah']);
	$kode_organisasi=$result->clean_data($_POST['kode_organisasi']);
	$hasil= $result->query_y("SELECT id FROM $tabel_wilayah WHERE id='$id' LIMIT 1",'');
	if ($result->num($hasil)<1){
		$result->query_y1("INSERT INTO $tabel_wilayah(id,kode_wilayah,nama_wilayah,kode_organisasi) VALUES ('','$kode_wilayah','$nama_wilayah','$kode_organisasi')");
		$result->close();
		echo "Sukses Ditambahkan";
	}else{
		$result->query_y1("UPDATE $tabel_wilayah SET kode_organisasi='$kode_organisasi',nama_wilayah='$nama_wilayah' WHERE id='$id' LIMIT 1");
		$result->close();
		echo "Sukses Diupdate";
	}
	break;
case "2":
	$id=$result->clean_data($_GET['id']);
	$result->query_y1("DELETE FROM $tabel_wilayah WHERE id = '$id' LIMIT 1");
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>