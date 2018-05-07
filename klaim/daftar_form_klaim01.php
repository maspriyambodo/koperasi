<?php 
include '../h_tetap.php';$id=$result->c_d($_GET['id']);
$data = array(
	'tgmati' => NULL,
	'tgklaim' => NULL,
	'jenis_klaim' => 0,
	'jumlah_klaim' => 0,
	'ketnas' => 0,
	'status_klaim' => 0,
	'kketnas' => 0,
	'user_klaim' => NULL
);
$where = array('id' => $id);
$hasil=$result->update($tabel_kredit, $data, $where);
if(!$hasil) die('Update Data Tidak Berhasil');
$data = array(
	'status_klaim' => 1,
	'user_otorisasi' => NULL,
	'tgl_otorisasi' => NULL,
	'tgl_hapus' => date('Y-m-d H:i:s'),
	'user_hapus' => $userid,
	'kode_hapus' => 1
);
$where = array('id_kredit' => $id);
$hasil=$result->update($tabel_klaim, $data, $where);
$catat='Sukses Di Simpan Pembatalan Pengajuan Klaim Rekening '.$id;
echo $catat;$result->close();include '../around.php'; ?>