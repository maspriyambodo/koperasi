<?php
include "../gaji/par_atas01.php";
if($result->clean_data($_GET['p']!=3)){
	$nik=$result->clean_data($_POST['nik']);
	$tgl_1=$result->clean_data($_POST['tgl']);
	$bln_1=$result->clean_data($_POST['bln']);
	$thn_1=$result->clean_data($_POST['thn']);
	$tgl_2=$result->clean_data($_POST['tgl_x']);
	$bln_2=$result->clean_data($_POST['bln_x']);
	$thn_2=$result->clean_data($_POST['thn_x']);
	$tgl_x=$thn_1.'-'.$bln_1.'-'.$tgl_1;
	$tgl_y=$thn_2.'-'.$bln_2.'-'.$tgl_2;
}
switch ($result->clean_data($_GET['p'] )) {
default: echo "Halaman tidak ditemukan"; break;
case "1":
	$hasil=$result->query_y("SELECT MAX(no_index) AS no_index FROM $tabel_riwayat WHERE nik='$nik'",'');
	$row=$result->row($hasil);
	if ($row['no_index']==0){
		$no_index=1;
		$no_index=substr("0000".$no_index,-4);
	}else{
		$no_index=$row['no_index'];
		$no_index++;
		$no_index=substr("0000".$no_index,-4);
	}
	$data = array(
		'nik' => $_POST['nik'],
		'nama_perusahaan' => $_POST['nama_perusahaan'],
		'no_index' => $no_index,
		'jabatan' => $_POST['jabatan'],
		'predikat' => $_POST['predikat'],
		'keterangan' => $_POST['keterangan'],
		'tgl_masuk' => $tgl_x,
		'tgl_keluar' => $tgl_y
	);
	$lastID = $result->insert($tabel_riwayat, $data);
	$result->close();
	echo 'Sukses Di Simpan Riwayat '.$nik;
	$catat="Menambah Data Riwayat Karyawan ".$nik.' '.$userid;
	include '../around.php';
	break;
case "2":
	$id=$result->clean_data($_POST['id']);
	$data = array(
		'nama_perusahaan' => $_POST['nama_perusahaan'],
		'jabatan' => $_POST['jabatan'],
		'predikat' => $_POST['predikat'],
		'keterangan' => $_POST['keterangan'],
		'tgl_masuk' => $tgl_x,
		'tgl_keluar' => $tgl_y,
	    'bussdate' => date('Y-m-d H:i:s')
	);
    $where = array('id' => $id);
    $result->update($tabel_riwayat, $data, $where);
	$result->close();
	echo 'Sukses Update Riwayat '.$nik;
	$catat="Update Data Riwayat Karyawan ".' '.$userid;
	include '../around.php';
	break;
case "3":
	$id=$result->clean_data($_GET['id']);
    $where = array('ID' => $id);
    $result->delete($tabel_riwayat, $where,1);
	$result->close();
	echo "Sukses Dihapus";
	break;
}
?>