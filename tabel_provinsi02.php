<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->c_d($_POST['id']);
	$kode=$result->c_d($_POST['kode']);
	if($kode=='') die('Kode Propnsi Belum Di Isi...?');
	$hasil=$result->query_y1("SELECT id,kode,desc1 FROM kode_provinsi WHERE id='$id' LIMIT 1");
	if ($result->num($hasil)<1){
		$data = array(
			'kode' => $_POST['kode'],
			'desc1' => $_POST['desc1'],
			'oper' => $userid,
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert('kode_provinsi', $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		echo "Sukses Ditambahkan";
		include 'jsonpropinsi.php';
		$result->close();
		$catat="Menambah Kode provinsi ".$kode;
		include 'around.php';
	}else{
		$data = array(
			'desc1' => $_POST['desc1'],
			'oper' => $userid,
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('id' => $_POST['id']);
    	$hasil=$result->update('kode_provinsi', $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		include 'jsonpropinsi.php';
		$result->close();
		$catat="Merubah Data Provinsi ".$kode;
		include 'around.php';
	}					
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete('kode_provinsi', $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Data Provinsi";
	include 'jsonpropinsi.php';
	$result->close();
	$catat="Menghapus Data Provinsi".$id;
	include 'around.php';
	break;
}
?>