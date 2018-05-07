<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
	$kode=$result->c_d($_POST['kode']);
	if($kode=='')die('Kode Cabang Belum Di Isi...?');
	$hasil = $result->query_y1("SELECT kode FROM $tabel_kantor WHERE kode='$kode'");
	if ($result->num($hasil)<1){
		$data = array(
			'kode' => $_POST['kode'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_telepon' => $_POST['no_telepon'],
			'no_handphone' => $_POST['no_handphone'],
			'no_fax' => $_POST['no_fax'],
			'nama_email' => $_POST['nama_email'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_kantor, $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Kantor Cabang ".$kode;
		include 'around.php';			
	}else{
		$data = array(
			'alamat' => $_POST['alamat'],
			'nama' => $_POST['nama'],
			'no_telepon' => $_POST['no_telepon'],
			'no_handphone' => $_POST['no_handphone'],
			'no_fax' => $_POST['no_fax'],
			'nama_email' => $_POST['nama_email'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('kode' => $_POST['kode']);
    	$hasil=$result->update($tabel_kantor, $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Tabel Cabang ".$kode;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete($tabel_kantor, $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Data Cabang";
	$result->close();
	$catat="Menghapus Data Cabang ID ".$id;
	include 'around.php';
	break;
}
?>