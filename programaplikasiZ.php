<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
case "1":
	$url=$result->c_d($_POST['url']);
	if($url=='')die('Kode Program Belum Di Isi...?');
	$hasil = $result->query_y1("SELECT url FROM tabel_menu WHERE url='$url'");
	if($result->num($hasil)==0) { 
		$data = array(
			'parent_id' => $_POST['parent_id'],
			'title' => $_POST['title'],
			'url' => $_POST['url'].'.php',
			'menu_order' => $_POST['menu_order'],
			'kode0' => $_POST['kode0'],
			'kode1' => $_POST['kode1'],
			'kode2' => $_POST['kode2'],
			'kode3' => $_POST['kode3'],
			'kode4' => $_POST['kode4'],
			'kodem0' => $_POST['kodem0'],
			'kodem1' => $_POST['kodem1'],
			'kodem2' => $_POST['kodem2'],
			'kodem3' => $_POST['kodem3'],
			'kodem4' => $_POST['kodem4'],
			'kodem5' => $_POST['kodem5'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert('tabel_menu', $data);
		if(!$hasil) die('Menambah Data Program Aplikasi Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Program Aplikasi ".$url;
		include 'around.php';
	}else{
//		$data = array(
//		);
//	    $where = array('url' => $url);
//		$hasil=$result->update('tabel_menu', $data, $where);
//    	if(!$hasil) die('Update Data Tidak Berhasil');
//		echo "Sukses Di Update";
//		$result->close();
//		$catat="Merubah Program Aplikasi ".$kdproduk;
//		include 'around.php';
	}
	break;
case "2":
	//$id=$result->c_d($_GET['id']);
    //$where = array('ID' => $id);
    //$hasil=$result->delete($tabel_produkt, $where,1);
	//if(!$hasil) die('Hapus Data Tidak Berhasil');
	//echo "Sukses Menghapus Tabel Produk";
	//$result->close();
	//$catat="Menghapus Tabel Produk Tabungan ID ".$id;
	//include 'around.php';	
	break;
case "3":
	$id=$result->c_d($_GET['id']);
    $data = array(
        'aktif' => 1,
		'bussdate' => date('Y-m-d H:i:s')
    );
    $where = array('id' => $id);
    $hasil=$result->update('tabel_menu', $data, $where);
	if(!$hasil) die('Enable Menu Tidak Berhasil');
	echo "Sukses Di Aktifkan";
	$result->close();
	$catat="Mengaktifkan ID Menu ".$id;
	include 'around.php';
	break;
case "4":
	$id=$result->c_d($_GET['id']);
    $data = array(
        'aktif' => 0,
		'bussdate' => date('Y-m-d H:i:s')
    );
    $where = array('id' => $id);
    $hasil=$result->update('tabel_menu', $data, $where);
	if(!$hasil) die('Disable Menu Tidak Berhasil');
	echo "Sukses Di Non Aktifkan";
	$result->close();
	$catat="Menonaktifkan ID Menu ".$id;
	include 'around.php';
	break;
}
?>