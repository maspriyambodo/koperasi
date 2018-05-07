<?php 
include '../h_tetap.php';
if($result->c_d(keangka($_POST['jumlah_klaim']))>0){
	$where = array('id_kredit' => $result->c_d($_POST['id']));
	$hasil=$result->jumlah_data($tabel_klaim, 'id_kredit', $where);
	$xtgtran=$result->jatuh_tempo($_POST['norek']);
	$r=$result->row($result->query_y1("SELECT angsurke FROM $tabel_payment WHERE norek='".$result->c_d($_POST['norek'])."' AND tanggal<='".date_sql($result->c_d($_POST['tgl_mati']))."' ORDER BY angsurke DESC LIMIT 1"));
	if($hasil==TRUE){
		$data = array(
			'norek' => $result->c_d($_POST['norek']),
			'nama' => $result->c_d($_POST['nama']),
			'tgl_lahir' => date_sql($result->c_d($_POST['tgl_lahir'])),
			'tmp_lahir' => $result->c_d($_POST['tmp_lahir']),
			'tgl_mati' => date_sql($result->c_d($_POST['tgl_mati'])),
			'tmp_mati' => $result->c_d($_POST['tmp_mati']),
			'sebab_mati' => $result->c_d($_POST['sebab_mati']),
			'ket_mati' => $result->c_d($_POST['ket_mati']),
			'tgl_klaim' => date_sql($result->c_d($_POST['tgl_klaim'])),
			'jenis_klaim' => $result->c_d($_POST['jenis_klaim']),
			'tgl_jatuh_tempo' => $xtgtran,
			'plafond' => $result->c_d(keangka($_POST['nomi'])),
			'saldo' => $result->c_d(keangka($_POST['saldoa'])),
			'jumlah_klaim' => $result->c_d(keangka($_POST['jumlah_klaim'])),
			'no_akte_kematian' => $result->c_d($_POST['no_akte_kematian']),
			'tgl_akte_kematian' => date_sql($result->c_d($_POST['tgl_akte_kematian'])),
			'no_surat_taspen' => $result->c_d($_POST['no_surat_taspen']),
			'tgl_surat_taspen' => date_sql($result->c_d($_POST['tgl_surat_taspen'])),
			'nama_ahli_waris' => $result->c_d($_POST['nama_ahli_waris']),
			'hub_ahli_waris' => $result->c_d($_POST['hub_ahli_waris']),
			'alt_ahli_waris' => date_sql($result->c_d($_POST['alt_ahli_waris'])),
			'tlp_ahli_waris' => $result->c_d($_POST['tlp_ahli_waris']),
			'ketnas' => $result->c_d($_POST['ketnas']),
			'status_klaim' => $result->c_d($_POST['status_klaim']),
			'kketnas' => $result->c_d($_POST['kketnas']),
			'angsur_ke' => $r['angsurke'],
			'kode_hapus' => 0,
			'user_klaim' => $userid,
			'bussdate' => date('Y-m-d H:i:s')
		);
		$where = array('id_kredit' => $result->c_d($_POST['id']));
		$hasil=$result->update($tabel_klaim, $data, $where);
		if(!$hasil) die('Update Data Tidak Berhasil');
	}else{
		$data = array(
			'id_kredit' => $result->c_d($_POST['id']),
			'norek' => $result->c_d($_POST['norek']),
			'nama' => $result->c_d($_POST['nama']),
			'tgl_lahir' => date_sql($result->c_d($_POST['tgl_lahir'])),
			'tmp_lahir' => $result->c_d($_POST['tmp_lahir']),
			'tgl_mati' => date_sql($result->c_d($_POST['tgl_mati'])),
			'tmp_mati' => $result->c_d($_POST['tmp_mati']),
			'sebab_mati' => $result->c_d($_POST['sebab_mati']),
			'ket_mati' => $result->c_d($_POST['ket_mati']),
			'tgl_klaim' => date_sql($result->c_d($_POST['tgl_klaim'])),
			'jenis_klaim' => $result->c_d($_POST['jenis_klaim']),
			'tgl_jatuh_tempo' => $xtgtran,
			'plafond' => $result->c_d(keangka($_POST['nomi'])),
			'saldo' => $result->c_d(keangka($_POST['saldoa'])),
			'jumlah_klaim' => $result->c_d(keangka($_POST['jumlah_klaim'])),
			'no_akte_kematian' => $result->c_d($_POST['no_akte_kematian']),
			'tgl_akte_kematian' => date_sql($result->c_d($_POST['tgl_akte_kematian'])),
			'no_surat_taspen' => $result->c_d($_POST['no_surat_taspen']),
			'tgl_surat_taspen' => date_sql($result->c_d($_POST['tgl_surat_taspen'])),
			'nama_ahli_waris' => $result->c_d($_POST['nama_ahli_waris']),
			'hub_ahli_waris' => $result->c_d($_POST['hub_ahli_waris']),
			'alt_ahli_waris' => date_sql($result->c_d($_POST['alt_ahli_waris'])),
			'tlp_ahli_waris' => $result->c_d($_POST['tlp_ahli_waris']),
			'ketnas' => $result->c_d($_POST['ketnas']),
			'status_klaim' => $result->c_d($_POST['status_klaim']),
			'kketnas' => $result->c_d($_POST['kketnas']),
			'angsur_ke' => $r['angsurke'],
			'kode_hapus' => 0,
			'user_klaim' => $userid,
			'bussdate' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert($tabel_klaim, $data);
		if(!$hasil) die('Insert Data Tidak Berhasil');
	}
	$catat='Sukses Di Simpan Pengajuan Klaim Rekening '.$result->c_d($_POST['norek']);
	echo $catat;
	$result->close();include '../around.php';		
}else{
	echo 'Transaksi Batal, Nominal Pengajuan Nol';
}
?>