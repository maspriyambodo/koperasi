<?php
include "../gaji/par_atas01.php";
if($result->clean_data($_GET['p']!=3)){
	$bln=$result->clean_data($_POST['bln']);
	$thn=$result->clean_data($_POST['thn']);
	$nik=$result->clean_data($_POST['nik']);
	$bulan_absensi=$bln.$thn;
}
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$data = array(
		'nik' => $_POST['nik'],
		'jumlah_sakit' => $_POST['jumlah_sakit'],
		'jumlah_izin' => $_POST['jumlah_izin'],
		'jumlah_alpha' => date_sql($_POST['jumlah_alpha']),
		'jumlah_hadir' => $_POST['jumlah_hadir'],
		'bulan_absensi' => $bulan_absensi,
		'jam_lembur' => $_POST['jumlah_lembur'],
		'user_input' => $userid,
		'tgl_input' => date('Y-m-d H:i:s'),
		'user_update' => $userid,
		'tgl_update' => date('Y-m-d H:i:s'),
	    'bussdate' => date('Y-m-d H:i:s')
	);
	$lastID = $result->insert($tabel_absensi, $data);
	$result->close();
	echo 'Sukses Di Simpan Absensi '.$nik;
	$catat="Menambah Data Absensi Karyawan ".$nik.' '.$userid;
	include '../around.php';
	break;
case "2":
	$id=$result->clean_data($_POST['id']);
	$data = array(
		'nik' => $_POST['nik'],
		'jumlah_sakit' => $_POST['jumlah_sakit'],
		'jumlah_izin' => $_POST['jumlah_izin'],
		'jumlah_alpha' => date_sql($_POST['jumlah_alpha']),
		'jumlah_hadir' => $_POST['jumlah_hadir'],
		'bulan_absensi' => $bulan_absensi,
		'jam_lembur' => $_POST['jumlah_lembur'],
		'user_update' => $userid,
		'tgl_update' => date('Y-m-d H:i:s'),
	    'bussdate' => date('Y-m-d H:i:s')
	);
    $where = array('id' => $id);
    $result->update($tabel_absensi, $data, $where);
	$result->close();
	echo 'Sukses Update Absensi '.$nik;
	$catat="Update Data Absensi Karyawan ".' '.$userid;
	include '../around.php';
	break;
case "3":
	$id=$result->clean_data($_GET['id']);
    $where = array('ID' => $id);
    $result->delete($tabel_absensi, $where,1);
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>