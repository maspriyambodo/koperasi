<?php
include "../gaji/par_atas01.php";
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->clean_data($_POST['id']);
	$kode_jabatan=$result->clean_data($_POST['kode_jabatan']);
	if($kode_jabatan==''){
		die('Kode Organisasi Belum Di Isi...?');
	}
	$nama_jabatan=$result->clean_data($_POST['nama_jabatan']);
	$hasil= $result->query_y("SELECT id FROM $tabel_jabatan WHERE id='$id' LIMIT 1",'');
	if ($result->num($hasil)<1){
		$result->query_y1("INSERT INTO $tabel_jabatan(id,kode_jabatan,nama_jabatan) VALUES ('','$kode_jabatan','$nama_jabatan')");
		$result->close();
		echo "Sukses Ditambahkan";
	}else{
		$result->query_y1("UPDATE $tabel_jabatan SET nama_jabatan='$nama_jabatan' WHERE id='$id' LIMIT 1");
		$result->close();
		echo "Sukses Diupdate";
	}
	break;
case "2":
	$id=$result->clean_data($_GET['id']);
	$result->query_y1("DELETE FROM $tabel_jabatan WHERE id = '$id' LIMIT 1");
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>