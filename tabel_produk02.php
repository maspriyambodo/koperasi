<?php 
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	$kdproduk=$result->c_d($_POST['kdproduk']);
	if($kdproduk=='')die('Kode Produk Belum Di Isi...?');
	$hasil=$result->query_y1("SELECT kdproduk FROM $tabel_produk WHERE kdproduk='$kdproduk'");
	if($result->num($hasil)!=0){
		$data = array(
			'nmproduk' => $_POST['nmproduk'],
			'suku' => $_POST['suku'],
			'bbtl' => $_POST['bbtl'],
			'badm' => $_POST['badm'],
			'bmeterai' => keangka($_POST['bmeterai']),
			'bpremi' => $_POST['bpremi'],
			'htagih' => $_POST['kdkop'],
			'bdenda' => $_POST['bdenda'],
			'bprovisi' => $_POST['bprovisi'],
			'mplafon' => $_POST['mplafon'],
			'spokok' => $_POST['spokok'],
			'sbunga' => $_POST['sbunga'],
			'sadm' => $_POST['sadm'],
			'sdenda' => $_POST['sdenda'],
			'sbtl' => $_POST['sbtl'],
			'btagih' => $_POST['btagih'],
			'slunas' => $_POST['slunas'],
			'sprovisi' => $_POST['sprovisi'],
			'spremi' => $_POST['spremi'],
			'srefund' => $_POST['srefund'],
			'smeterai' => $_POST['smeterai'],
			'flunas' => $_POST['flunas'],
			'bumur' => $_POST['bumur'],
			'hbunga' => $_POST['hbunga'],
			'glfinalti' => $_POST['glfinalti'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
    	$where = array('kdproduk' => $kdproduk);
    	$hasil=$result->update($tabel_produk, $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Tabel Produk ".$kdproduk;
		include 'around.php';
	}else{
		$data = array(
			'kdproduk' => $_POST['kdproduk'],
			'nmproduk' => $_POST['nmproduk'],
			'suku' => $_POST['suku'],
			'bbtl' => $_POST['bbtl'],
			'badm' => $_POST['badm'],
			'bmeterai' => keangka($_POST['bmeterai']),
			'bpremi' => $_POST['bpremi'],
			'htagih' => $_POST['kdkop'],
			'bdenda' => $_POST['bdenda'],
			'bprovisi' => $_POST['bprovisi'],
			'mplafon' => $_POST['mplafon'],
			'spokok' => $_POST['spokok'],
			'sbunga' => $_POST['sbunga'],
			'sadm' => $_POST['sadm'],
			'sdenda' => $_POST['sdenda'],
			'sbtl' => $_POST['sbtl'],
			'btagih' => $_POST['btagih'],
			'slunas' => $_POST['slunas'],
			'sprovisi' => $_POST['sprovisi'],
			'spremi' => $_POST['spremi'],
			'srefund' => $_POST['srefund'],
			'smeterai' => $_POST['smeterai'],
			'flunas' => $_POST['flunas'],
			'bumur' => $_POST['bumur'],
			'hbunga' => $_POST['hbunga'],
			'glfinalti' => $_POST['glfinalti'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_produk, $data);
		if(!$hasil) die('Menambah Data Produk Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Produk ".$kdproduk;
		include 'around.php';
	}
	break;
case "2" :
	$id=$result->c_d($_POST['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete($tabel_produk, $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Tabel Produk";
	$result->close();
	$catat="Menghapus Tabel Produk ID ".$id." Produk ".$kdproduk;
	include 'around.php';
	break;
}
?>