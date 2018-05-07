<?php
include "../gaji/par_atas01.php";
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; 
break;
case "1":
	$id=$result->clean_data($_POST['id']);
	$grade=$result->clean_data($_POST['grade']);
	if($grade==''){
		die('Grade Belum Di Isi...?');
	}
	$kode_grade=$result->clean_data($_POST['kode_grade']);
	$keterangan=$result->clean_data($_POST['keterangan']);
	$gaji_pokok=keangka($result->clean_data($_POST['gaji_pokok']));
	$tunjanan_tkd=keangka($result->clean_data($_POST['tunjangan_tkd']));
	$tunjanan_jabatan=keangka($result->clean_data($_POST['tunjangan_jabatan']));
	$tunjanan_perumahan=keangka($result->clean_data($_POST['tunjangan_perumahan']));
	$tunjanan_telepon=keangka($result->clean_data($_POST['tunjangan_telepon']));
	$tunjanan_kesehatan=keangka($result->clean_data($_POST['tunjangan_kesehatan']));
	$tunjangan_lain=keangka($result->clean_data($_POST['tunjangan_lain']));
	$uang_makan=keangka($result->clean_data($_POST['uang_makan']));
	$uang_hadir=keangka($result->clean_data($_POST['uang_hadir']));
	$uang_transport=keangka($result->clean_data($_POST['uang_transport']));
	$hasil= $result->query_y("SELECT id FROM $tabel_grade WHERE id='$id' LIMIT 1",'');
	if ($result->num($hasil)<1){
		$result->query_y1("INSERT INTO $tabel_grade(id,kode_grade,grade,keterangan,gaji_pokok,tunjangan_tkd,tunjangan_jabatan,tunjangan_perumahan,tunjangan_telepon,tunjangan_kesehatan,tunjangan_lain,uang_makan,uang_hadir,uang_transport) VALUES ('','$kode_grade','$grade','$keterangan','$gaji_pokok','$tunjanan_tkd','$tunjanan_jabatan','$tunjanan_perumahan','$tunjanan_telepon','$tunjanan_kesehatan','$tunjangan_lain','$uang_makan','$uang_hadir','$uang_transport')");
		$result->close();
		echo "Sukses Ditambahkan";
	}else{
		$result->query_y1("UPDATE $tabel_grade SET grade='$grade',keterangan='$keterangan',gaji_pokok='$gaji_pokok',tunjangan_tkd='$tunjanan_tkd',tunjangan_jabatan='$tunjanan_jabatan',tunjangan_perumahan='$tunjanan_perumahan',tunjangan_telepon='$tunjanan_telepon',tunjangan_kesehatan='$tunjanan_kesehatan',tunjangan_lain='$tunjangan_lain',uang_makan='$uang_makan',uang_hadir='$uang_hadir',uang_transport='$uang_transport' WHERE id='$id' LIMIT 1");
		$result->close();
		echo "Sukses Diupdate";
	}
	break;
case "2":
	$id=$result->clean_data($_GET['id']);
	$result->query_y1("DELETE FROM $tabel_grade WHERE id = '$id' LIMIT 1");
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>