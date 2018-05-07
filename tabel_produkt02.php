<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
case "1":
	$kdproduk=$result->c_d($_POST['kdproduk']);
	if($kdproduk=='')die('Kode Produk Belum Di Isi...?');
	$hasil = $result->query_y1("SELECT kdproduk FROM $tabel_produkt WHERE kdproduk='$kdproduk'");
	if($result->num($hasil)!=0) { 
		$data = array(
			'nmproduk' => $_POST['nmproduk'],
			'sminimum' => keangka($_POST['sminimum']),
			'sawal' => keangka($_POST['sawal']),
			'bunga1' => $_POST['bunga1'],
			'bunga2' => $_POST['bunga2'],
			'bunga3' => $_POST['bunga3'],
			'bunga4' => $_POST['bunga4'],
			'saldo1' => keangka($_POST['saldo1']),
			'saldo2' => keangka($_POST['saldo2']),
			'saldo3' => keangka($_POST['saldo3']),
			'saldo4' => keangka($_POST['saldo4']),
			'hbunga' => $_POST['hbunga'],
			'spajak' => $_POST['spajak'],
			'sbunga' => $_POST['sbunga'],
			'sadm' => $_POST['sadm'],
			'adm' => keangka($_POST['adm']),
			'gssl' => $_POST['gssl'],
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('kdproduk' => $kdproduk);
    	$hasil=$result->update($tabel_produkt, $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Tabel Produk Tabungan ".$kdproduk;
		include 'around.php';
	}else{
		$data = array(
			'kdproduk' => $_POST['kdproduk'],
			'nmproduk' => $_POST['nmproduk'],
			'sminimum' => keangka($_POST['sminimum']),
			'sawal' => keangka($_POST['sawal']),
			'bunga1' => $_POST['bunga1'],
			'bunga2' => $_POST['bunga2'],
			'bunga3' => $_POST['bunga3'],
			'bunga4' => $_POST['bunga4'],
			'saldo1' => keangka($_POST['saldo1']),
			'saldo2' => keangka($_POST['saldo2']),
			'saldo3' => keangka($_POST['saldo3']),
			'saldo4' => keangka($_POST['saldo4']),
			'hbunga' => $_POST['hbunga'],
			'spajak' => $_POST['spajak'],
			'sbunga' => $_POST['sbunga'],
			'sadm' => $_POST['sadm'],
			'adm' => keangka($_POST['adm']),
			'gssl' => $_POST['gssl'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_produkt, $data);
		if(!$hasil) die('Menambah Data Produk Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Produk Tabungan ".$kdproduk;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete($tabel_produkt, $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Tabel Produk";
	$result->close();
	$catat="Menghapus Tabel Produk Tabungan ID ".$id;
	include 'around.php';	
	break;
}
?>