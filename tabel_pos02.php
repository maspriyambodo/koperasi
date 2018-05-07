<?php
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
		$id=$result->c_d($_POST['id']);
		$kode=$result->c_d($_POST['kode']);
		if($kode=='') die('Kode Kantor Pos Belum Di Isi...?');
		$hasil = $result->query_y1("SELECT id FROM kode_pos WHERE id='$id' LIMIT 1");
		if ($result->num($hasil)<1){
			$data = array(
				'kode' => $_POST['kode'],
				'desc1' => $_POST['desc1'],
				'desc2' => $_POST['desc2'],
				'desc3' => $_POST['desc3'],
				'desc4' => $_POST['desc4']
			);
			$hasil=$result->insert('kode_pos', $data);
			if(!$hasil) die('Menambah Data Tidak Berhasil');
			echo "Sukses Ditambahkan";
			include 'jsonpos.php';
			$result->close();
			$catat="Menambah Kantor Pos ".$kode;
			include 'around.php';	
		}else{
			$data = array(
				'desc1' => $_POST['desc1'],
				'desc2' => $_POST['desc2'],
				'desc3' => $_POST['desc3'],
				'desc4' => $_POST['desc4']
			);
		    $where = array('id' => $_POST['id']);
	    	$hasil=$result->update('kode_pos', $data, $where);
	    	if(!$hasil) die('Update Data Tidak Berhasil');
			echo "Sukses Di Update";
			include 'jsonpos.php';
			$result->close();
			$catat="Merubah Tabel Kode Pos ".$kode;
			include 'around.php';
		}
		break;
	case "2":
		$id=$result->c_d($_GET['id']);
	    $where = array('ID' => $id);
	    $hasil=$result->delete('kode_pos', $where,1);
		if(!$hasil) die('Hapus Data Tidak Berhasil');
		echo "Sukses Menghapus Data Kode Pos";
		include 'jsonpos.php';
		$result->close();
		$catat="Menghapus Data Kode Pos".$id;
		include 'around.php';
		break;
}
?>