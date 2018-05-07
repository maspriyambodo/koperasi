<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
		$idsales=$result->c_d($_POST['idsales']);
		if($idsales=='')die('ID Sales Belum Di Isi...?');
		$hasil = $result->query_y1("SELECT idsales FROM $tabel_sales WHERE idsales='$idsales'");
		if ($result->num($hasil)<1){
		$data = array(
			'branch' => $_POST['branch'],
			'idsales' => $_POST['idsales'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'kelurahan' => $_POST['kelurahan'],
			'kecamatan' => $_POST['kecamatan'],
			'kabupaten' => $_POST['kabupaten'],
			'notlp' => $_POST['notlp'],
			'tglmasuk' => date_sql($_POST['tglsk']),
			'nosk' => $_POST['nosk'],
			'noktp' => $_POST['noktp'],
			'tglktp' => date_sql($_POST['tglktp']),
			'nama_bank_sales' => $_POST['nama_bank_sales'],
			'rekening_bank_sales' => $_POST['rekening_bank_sales'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_sales, $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		include 'jsonsales.php';
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Data Sales Bayar ".$idsales;
		include 'around.php';			
	}else{
		$data = array(
			'branch' => $_POST['branch'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'kelurahan' => $_POST['kelurahan'],
			'kecamatan' => $_POST['kecamatan'],
			'kabupaten' => $_POST['kabupaten'],
			'notlp' => $_POST['notlp'],
			'tglmasuk' => date_sql($_POST['tglsk']),
			'nosk' => $_POST['nosk'],
			'noktp' => $_POST['noktp'],
			'tglktp' => date_sql($_POST['tglktp']),
			'nama_bank_sales' => $_POST['nama_bank_sales'],
			'rekening_bank_sales' => $_POST['rekening_bank_sales'],			
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('idsales' => $_POST['idsales']);
    	$hasil=$result->update($tabel_sales, $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
    	include 'jsonsales.php';
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Kode ID Sales ".$idsales;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete($tabel_sales, $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	include 'jsonsales.php';
	echo "Sukses Menghapus Data Sales";
	$result->close();
	$catat="Menghapus Data Sales ID ".$id;
	include 'around.php';
	break;
}
?>