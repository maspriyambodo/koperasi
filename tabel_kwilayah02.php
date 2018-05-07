<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
		$kd=$result->c_d($_POST['kd']);
		if($kd=='')die('Kode Kantor Wilayah Belum Di Isi...?'.$kd);
		$hasil = $result->query_y1("SELECT id,branch,kd,nmkb FROM $tabel_wkb WHERE kd='$kd'");
		if ($result->num($hasil)<1){
		$data = array(
			'branch' => $_POST['branch'],
			'kd' => $_POST['kd'],
			'nmkb' => $_POST['nmkb'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_wkb, $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		echo "Sukses Ditambahkan";
		include 'jsonwilayah.php';
		$result->close();
		$catat="Menambah Kantor Wilayah ".$kd;
		include 'around.php';			
	}else{
		$data = array(
			'branch' => $_POST['branch'],
			'nmkb' => $_POST['nmkb'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('kd' => $_POST['kd']);
    	$hasil=$result->update($tabel_wkb, $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		include 'jsonwilayah.php';
		$result->close();
		$catat="Merubah Tabel Wilayah ".$kd;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete($tabel_wkb, $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Data Wilayah";
	include 'jsonwilayah.php';
	$result->close();
	$catat="Menghapus Data Wilayah ID ".$id;
	include 'around.php';
	break;
}
?>