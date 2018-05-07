<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->c_d($_POST['id']);
	$kode=$result->c_d($_POST['kode']);
	if($kode=='') die('Kode Kabupaten Belum Di Isi...?');
	$hasil=$result->query_y1("SELECT id FROM kode_kabupaten WHERE id='$id' LIMIT 1");
	if ($result->num($hasil)<1){
		$data = array(
			'kode' => $_POST['kode'],
			'desc1' => $_POST['desc1'],
			'kode_provinsi' => $_POST['kode_provinsi'],
			'oper' => $userid,
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert('kode_kabupaten', $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		echo "Sukses Ditambahkan";
		include 'jsonkabupaten.php';
		$result->close();
		$catat="Menambah Kode Kabupaten ".$kode;
		include 'around.php';		
	}else{
		$data = array(
			'desc1' => $_POST['desc1'],
			'kode_provinsi' => $_POST['kode_provinsi'],
			'oper' => $userid,
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('id' => $_POST['id']);
    	$hasil=$result->update('kode_kabupaten', $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		include 'jsonkabupaten.php';
		$result->close();
		$catat="Merubah Kode Kabupaten ".$kode;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete('kode_kabupaten', $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Data Kabupaten";
	include 'jsonkabupaten.php';
	$result->close();
	$catat="Menghapus Data Kabupaten".$id;
	include 'around.php';
	break;
}
?>