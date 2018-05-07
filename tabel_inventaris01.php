<?php 
include 'h_tetap.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	$id=$result->c_d($_POST['id']);
	$hasil=$result->query_y1("SELECT id FROM akuntansi.prd_inventaris WHERE id='$id'");
	if($result->num($hasil)!=0) {
		$data = array(
			'kode_golongan' => $_POST['kode_golongan'],
			'kode_inventaris' => $_POST['kode_inventaris'],
			'gl_perolehan' => $_POST['gl_perolehan'],
			'gl_pembelian' => $_POST['gl_pembelian'],
			'gl_akumulasi' => $_POST['gl_akumulasi'],
			'gl_biaya' => $_POST['gl_biaya'],
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s')
		);
    	$where = array('id' => $id);
    	$hasil=$result->update('akuntansi.prd_inventaris', $data, $where);
    	if(!$hasil) die('Update Data Tidak Berhasil');
		echo "Sukses Di Update";
		$result->close();
		$catat="Merubah Tabel Inventaris ".$_POST['kode_inventaris'];
		include 'around.php';
	}else{
		$data = array(
			'kode_golongan' => $_POST['kode_golongan'],
			'kode_inventaris' => $_POST['kode_inventaris'],
			'gl_perolehan' => $_POST['gl_perolehan'],
			'gl_pembelian' => $_POST['gl_pembelian'],
			'gl_akumulasi' => $_POST['gl_akumulasi'],
			'gl_biaya' => $_POST['gl_biaya'],
			'user_input' => $userid,
			'tgl_input' => date('Y-m-d H:i:s'),
			'user_update' => $userid,
			'tgl_update' => date('Y-m-d H:i:s')
		);
		$hasil=$result->insert('akuntansi.prd_inventaris', $data);
		if(!$hasil) die('Menambah Data Inventaris Tidak Berhasil');
		echo "Sukses Ditambahkan";
		$result->close();
		$catat="Menambah Inventaris ".$_POST['kode_golongan'].'-'.$_POST['kode_inventaris'];
		include 'around.php';
	}
	break;
case "2" :
	$id=$result->c_d($_POST['id']);
    $where = array('id' => $id);
    $hasil=$result->delete('akuntansi.prd_inventaris', $where,1);
	if(!$hasil) die('Hapus Data Tidak Berhasil');
	echo "Sukses Menghapus Tabel Inventaris";
	$result->close();
	$catat="Menghapus Tabel Inventaris ID ".$id;
	include 'around.php';
	break;
}
?>