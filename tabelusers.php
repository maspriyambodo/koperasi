<?php
include 'h_tetap.php';
switch ($_GET['p']){
default: 
	echo "Halaman tidak ditemukan"; 
	break;
case "1":
	$id=$result->c_d($_POST['id']);
	$user_id=$result->c_d($_POST['user_id']);
	if($user_id=='') die('User ID Belum Di Isi...?');
	$hasil = $result->query_y1("SELECT id,userid FROM $tabel_user WHERE id='$id' LIMIT 1");
	if ($result->num($hasil)<1){
		$desired_password='123456';
		$hashedpassword= HashPassword($desired_password);
		$data = array(
			'branch' => substr($_POST['kcabang'],0,4),
			'nik' => $_POST['nik'],
			'cabang' => substr($_POST['kcabang'],5,30),
			'nama' => $_POST['nama'],
			'akses' => $_POST['hakses'],
			'userid' => $_POST['user_id'],
			'telepon' => $_POST['ntelepon'],
			'hmenu' => $_POST['hmenu'],
			'pass' => $hashedpassword,
			'plafon' => keangka($_POST['nlimit']),
			'plafonk' => keangka($_POST['nlimitk']),
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_user, $data);
		if(!$hasil) die('Menambah Data Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah User ".$user_id;
		include 'around.php';
	}else{
		$data = array(
			'branch' => substr($_POST['kcabang'],0,4),
			'nik' => $_POST['nik'],
			'cabang' => substr($_POST['kcabang'],5,30),
			'nama' => $_POST['nama'],
			'akses' => $_POST['hakses'],
			'telepon' => $_POST['ntelepon'],
			'hmenu' => $_POST['hmenu'],
			'plafon' => keangka($_POST['nlimit']),
			'plafonk' => keangka($_POST['nlimitk']),
			'aktif_satu' => $_POST['aktif_satu'],
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s'),
			'bussdate' => date('Y-m-d H:i:s')
		);
    	$where = array('id' => $id);
    	$hasil=$result->update($tabel_user, $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah ID User ".$user_id;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
	$hasil = $result->query_y1("SELECT id,userid,status FROM $tabel_user WHERE id='$id' LIMIT 1");
	if ($result->num($hasil)>0){
		$row= $result->row($hasil);
		$statu=$row['status'];
		if($statu==2){
			die('Status Offline, User Id Tidak Bisa Di Hapus...!!!');
		}elseif($statu==1){
			die('Status Lagi Online, User Id Tidak Bisa Di Hapus...!!!');
		}
	}
    $where = array('ID' => $id);
    $hasil=$result->delete($tabel_user, $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus User ID";
	$result->close();
	$catat="Menghapus ID User ".$id;
	include 'around.php';
	break;
case "3":
	$id=$result->c_d($_GET['id']);
    $data = array(
        'status' => 0,
		'user_enable' => $userid,
		'tgl_enable' => date('Y-m-d H:i:s'),
		'bussdate' => date('Y-m-d H:i:s')
    );
    $where = array('ID' => $id);
    $hasil=$result->update($tabel_user, $data, $where);
	if(!$hasil) die('Online User Tidak Berhasil');
	echo "Sukses Online User";
	$result->close();
	$catat="Mengaktifkan ID User ".$id;
	include 'around.php';
	break;
case "4":
	$id=$result->c_d($_GET['id']);
    $data = array(
        'status' => 2,
		'user_disable' => $userid,
		'tgl_disable' => date('Y-m-d H:i:s'),
		'bussdate' => date('Y-m-d H:i:s')
    );
    $where = array('ID' => $id);
    $hasil=$result->update($tabel_user, $data, $where);
	if(!$hasil) die('Offline User Tidak Berhasil');
	echo "Sukses Offline User";
	$result->close();
	$catat="Menonaktifkan ID User ".$id;
	include 'around.php';
	break;
case "5":
	$id=$result->c_d($_GET['id']);
	$hasil = $result->query_y1("SELECT id,userid,status FROM $tabel_user WHERE id='$id' LIMIT 1");
	if ($result->num($hasil)>0){
		$row= $result->row($hasil);
		$statu=$row['status'];
		if($statu==0){
			die('Status Disable, User Id Tidak Bisa Reset Password...!!!');
		}elseif($statu==1){
			die('Status Lagi Online, User Id Tidak Bisa Reset Password...!!!');
		}
	}
	$desired_password='123456';
	$hashedpassword=HashPassword($desired_password);
    $data = array(
        'pass' => $hashedpassword,
		'user_update' => $userid,
		'tgl_update' => date('Y-m-d H:i:s'),
		'bussdate' => date('Y-m-d H:i:s')
    );
    $where = array('ID' => $id);
    $hasil=$result->update($tabel_user, $data, $where);
	if(!$hasil) die('Riset Password Tidak Berhasil');
	echo "Sukses Reset Password";
	$result->close();
	$catat="Reset Password ID User ".$id;
	include 'around.php';
	break;
}
?>