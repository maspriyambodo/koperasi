<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$id=$result->c_d($_POST['id']);
	$kode_asuransi=$result->c_d($_POST['kode_asuransi']);
	if($kode_asuransi=='')die('Kode Asuransi Belum Di Isi...?');
	$hasil = $result->query_y1("SELECT id,kode_asuransi FROM tbl_premi WHERE id='$id' ORDER BY kode_asuransi LIMIT 1");
	if ($result->num($hasil)<1){
		$data = array(
			'kode_asuransi' => $_POST['kode_asuransi'],
			'umur' => $_POST['umur'],
			'jangka_waktu' => $_POST['jangka_waktu'],
			'tenor_premi' => $_POST['tenor_premi'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert('tbl_premi', $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Tarif Asuransi ".$kode_asuransi;
		include 'around.php';			
	}else{
		$data = array(
			'umur' => $_POST['umur'],
			'jangka_waktu' => $_POST['jangka_waktu'],
			'tenor_premi' => $_POST['tenor_premi'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('id' => $_POST['id']);
    	$hasil=$result->update('tbl_premi', $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Tarif Asuransi ".$kode_asuransi;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete('tbl_premi', $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Data Asuransi";
	$result->close();
	$catat="Menghapus Tarif Asuransi ID ".$id;
	include 'around.php';
	break;
}
?>