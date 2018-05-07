<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
		$kode_asuransi=$result->c_d($_POST['kode_asuransi']);
		if($kode_asuransi=='')die('Kode Asuransi Belum Di Isi...?'.$kd);
		$hasil = $result->query_y1("SELECT kode_asuransi FROM tbl_asuransi WHERE kode_asuransi='$kode_asuransi'");
		if ($result->num($hasil)<1){
		$data = array(
			'kode_asuransi' => $_POST['branch'],
			'nama_asuransi' => $_POST['nama_asuransi'],
			'nomor_spk' => $_POST['nomor_spk'],
			'tgl_spk' => date_sql($_POST['tgl_spk']),
			'tgl_mulai' => date_sql($_POST['tgl_mulai']),
			'tgl_berakhir' => date_sql($_POST['tgl_berakhir']),
			'status_asuransi' => $_POST['status_asuransi'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert('tbl_asuransi', $data);
		if(!$hasil) echo 'Menambah Data Tidak Berhasil';
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Kode Asuransi ".$kode_asuransi;
		include 'around.php';			
	}else{
		$data = array(
			'nama_asuransi' => $_POST['nama_asuransi'],
			'nomor_spk' => $_POST['nomor_spk'],
			'tgl_spk' => date_sql($_POST['tgl_spk']),
			'tgl_mulai' => date_sql($_POST['tgl_mulai']),
			'tgl_berakhir' => date_sql($_POST['tgl_berakhir']),
			'status_asuransi' => $_POST['status_asuransi'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),			
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
	    $where = array('kode_asuransi' => $_POST['kode_asuransi']);
    	$hasil=$result->update('tbl_asuransi', $data, $where);
    	if(!$hasil) echo 'Update Data Tidak Berhasil';
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Kode Asuransi ".$kode_asuransi;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
    $where = array('ID' => $id);
    $hasil=$result->delete('tbl_asuransi', $where,1);
	if(!$hasil) echo 'Hapus Data Tidak Berhasil';
	echo "Sukses Menghapus Data Asuransi";
	$result->close();
	$catat="Menghapus Data Asuransi ID ".$id;
	include 'around.php';
	break;
}
?>