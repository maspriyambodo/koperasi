<?php
include "h_tetap.php";
$pilih=$result->c_d($_GET['p']);
switch ($pilih) {
	default: echo "Halaman tidak ditemukan"; break;
case 1:
	$id = $result->c_d($_POST['id']);
	$nonas = $result->c_d($_POST['nonas']);
	if($nonas=="") die('No Rekening Belim Di Isi...?');
	$kode=$result->c_d($_POST['kode']);
	$kode_tarik=$result->c_d($_POST['kode_tarik']);
	$nama=$result->c_d($_POST['nama']);$sufix='360';
	$norekgl=substr($nonas,0,3).'000360';
	$norekgsl=substr($nonas,0,4).'00360';
	$norekgssl=$nonas.'360';
	$hasil = $result->query_y1("SELECT id,nonas,kode,nama FROM akuntansi.sandim WHERE id='$id'");
	if ($result->num($hasil)<1){
		$data = array(
			'nonas' => $nonas,
			'sufix' => '360',
			'norekgl' => substr($nonas,0,3).'000360',
			'norekgsl' => substr($nonas,0,4).'00360',
			'norekgssl' => $nonas.'360',
			'nama' => $_POST['nama'],
			'produk' => '360',
			'kode' => $_POST['kode'],
			'tarik' => $_POST['kode_tarik'],
			'userid' => $userid,
		    'bussdate' => date('Y-m-d H:i:s')
		);
		$result->insert('akuntansi.sandim', $data);
		$hasil = $result->query_y1("SELECT nonas FROM $tabel_sandi WHERE nonas='$nonas' LIMIT 1");
		if($result->num($hasil)!=0){
			$data = array(
				'nama' => $_POST['nama'],
				'kode' => $_POST['kode'],
				'tarik' => $_POST['kode_tarik']
			);
		    $where = array('nonas' => $nonas);
		    $result->update($tabel_sandi, $data, $where);
		}else{
			$hasil = $result->query_y1("SELECT kode FROM $tabel_kantor ORDER BY kode");
			if($result->num($hasil)!=0){
				while($row = $result->row($hasil)){ 
					if($row['kode']!='0111'){
						$cabang=$row['kode'];
						$p=$cabang.$norekgl;
						$n=$cabang.$norekgsl;
						$m=$cabang.$norekgssl;
						$result->res("INSERT INTO $tabel_sandi(branch,nonas,sufix,norekgl,norekgsl,norekgssl,nama,produk,kode,tarik) VALUES('$cabang','$nonas',360,'$p','$n','$m','$nama',360,'$kode','$kode_tarik')");
					}
				}
			}else{
				die("Tabel Sandi Akuntansi Belum Terdaftar...? ");
			}
		}
		include 'jsonsandi.php';
		echo "Sukses Menambah Data";
		$result->close();
		$catat="Menambah Sandi GL ".$nonas." Tanggal : ".$tanggal;
		include 'around.php';
	}else{
		$data = array(
			'nama' => $_POST['nama'],
			'kode' => $_POST['kode'],
			'tarik' => $_POST['kode_tarik']
		);
	    $where = array('id' => $id);
	    $result->update('akuntansi.sandim', $data, $where);
		$hasil = $result->query_y1("SELECT nonas FROM $tabel_sandi WHERE nonas='$nonas' LIMIT 1");
		if($result->num($hasil)!=0){
			$data = array(
				'nama' => $_POST['nama'],
				'kode' => $_POST['kode'],
				'tarik' => $_POST['kode_tarik']
			);
		    $where = array('nonas' => $nonas);
		    $result->update($tabel_sandi, $data, $where);
		}else{
			$hasil = $result->query_y1("SELECT kode FROM $tabel_kantor ORDER BY kode");
			if($result->num($hasil)!=0){
				while($row = $result->row($hasil)){ 
					if($row['kode']!='0111'){
						$cabang=$row['kode'];
						$p=$cabang.$norekgl;
						$n=$cabang.$norekgsl;
						$m=$cabang.$norekgssl;
						$result->query_y("INSERT INTO $tabel_sandi(branch,nonas,sufix,norekgl,norekgsl,norekgssl,nama,produk,kode,tarik) VALUES('$cabang','$nonas',360,'$p','$n','$m','$nama',360,'$kode','$kode_tarik')",'');
					}
				}
			}else{
				die("Tabel Sandi Akuntansi Belum Terdaftar...? ");
			}
		}
		include 'jsonsandi.php';
		echo "Sukses Update Data";
		$result->close();
		$catat="Merubah Sandi GL ".$nonas." Tanggal : ".$tanggal;
		include 'around.php';
	}
	break;
case "2":
	$id=$result->c_d($_GET['id']);
	$hasil = $result->query_y1("SELECT nonas FROM akuntansi.sandim WHERE id='$id' LIMIT 1");
	if($result->num($hasil)!=0){
		$row=$result->row($hasil);
		$nonas=$row['nonas'];
	}
    $where = array('id' => $id);
    $result->delete('akuntansi.sandim', $where,1);
    $where = array('nonas' => $nonas);
    $result->delete($tabel_sandi, $where,'');
	include 'jsonsandi.php';
	echo "Data Sukses Dihapus";
	$result->close();
	$catat="Menghapus Sandi GL ID : ".$id." Tanggal : ".$tanggal;
	include 'around.php';
	break;
}
?>