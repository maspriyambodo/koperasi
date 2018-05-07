<?php 
include 'h_tetap.php';
$noktp=$result->c_d($_POST['noktp']);$nonas=$result->c_d($_POST['nonas']);
switch ($result->c_d($_GET['p'] )) {
	default: echo "Halaman tidak ditemukan"; break;
case "1":
	$hasil=$result->query_y1("SELECT nonas,noktp,nama,user_buka,bussdate FROM $tabel_nasabah WHERE noktp='$noktp' LIMIT 1");
	if ($result->num($hasil)>0){
		$row=$result->row($hasil);
		echo "No KTP : ".$noktp." Nama ".$row['nama']." Sudah Terdaftar Pada No Nasabah ".$row['nonas']." Tanggal ".$row['bussdate']." Oleh User ".$row['user_buka'];exit();
	}
	include 'Lib/random.php';
	$hasil=$result->query_y1("SELECT nonas FROM $tabel_nasabah WHERE nonas='$nonas' LIMIT 1");
	$count=$result->num($hasil);
	if(!empty($count)){ 
		$hasil=$result->query_y1("SELECT SUBSTR(MAX(nonas),1,4) AS cif FROM $tabel_nasabah");
		$datamax= $result->row($hasil);
		$makscif = $datamax['cif'];
		$makscif++;
		$nonas=$makscif.random_char(2);
	}
	$tgllahir=$result->c_d($_POST['thn_lahir']).'-'.$result->c_d($_POST['bln_lahir']).'-'.$result->c_d($_POST['tgl_lahir']);
	$masaktp=$result->c_d($_POST['thn_ktp']).'-'.$result->c_d($_POST['bln_ktp']).'-'.$result->c_d($_POST['tgl_ktp']);
	$data = array('branch'=>$_POST['branch'],'nonas' => $_POST['nonas'],'nama' => $_POST['nama'],'tgllahir' => $tgllahir,'tmplahir' => $_POST['tmplahir'],'noktp' => $_POST['noktp'],'masaktp' => $masaktp,'npwp' => $_POST['npwp'],'jkelamin' => $_POST['jkelamin'],'agama' => $_POST['agama'],'pendidikan' => $_POST['pendidikan'],'namaibu' => $_POST['namaibu'],'tanggungan' => $_POST['tanggungan'],'tlprumah' => $_POST['tlprumah'],'tlpfax' => $_POST['tlpfax'],'tlphp1' => $_POST['tlphp1'],'tlphp2' => $_POST['tlphp2'],'alamat' => $_POST['alamat'],'lurah' => $_POST['lurah'],'camat' => $_POST['camat'],'kdpos' => $_POST['kdpos'],'kota' => $_POST['kota'],'propinsi' => $_POST['propinsi'],
	'negara' => $_POST['negara'],
	'status_anggota' =>$_POST['status_anggota'],
	'lamarmh' => $_POST['lamarmh'],'pekerjaan1' => $_POST['pekerjaan1'],'pekerjaan2' => $_POST['pekerjaan2'],'alamatb' => $_POST['alamatb'],'lurahb' => $_POST['lurahb'],'camatb' => $_POST['camatb'],'kdposb' => $_POST['kdposb'],'kotab' => $_POST['kotab'],'npwpu' => $_POST['npwpu'],'usaha1' => $_POST['usaha1'],'usaha2' => $_POST['usaha2'],'alamatu' => $_POST['alamatu'],'lurahu' => $_POST['lurahu'],'camatu' => $_POST['camatu'],'kdposu' => $_POST['kdposu'],'kotau' => $_POST['kotau'],'propinsiu' => $_POST['propinsiu'],'bidang' => $_POST['bidang'],'tlpfaxu' => $_POST['tlpfaxu'],'tlphpu' => $_POST['tlphpu'],'hasilk' => $_POST['hasilk'],'hasilb' => $_POST['hasilb'],'sumberl' => $_POST['sumberl'],'sistri' => $_POST['sistri'],'kstatus' => $_POST['kstatus'],'rumah' => $_POST['rumah'],'tujuanrek' => $_POST['tujuanrek'],'propinsib' => $_POST['propinsib'],'tgl_buka' => date('Y-m-d H:i:s'),'user_buka' => $userid,'tgl_pengkinian' => date('Y-m-d H:i:s'),'user_pengkinian' => $userid,'bussdate' => date('Y-m-d H:i:s'));
	$lastID = $result->insert($tabel_nasabah, $data);
	echo "Sukses Ditambakan, Nomor Nasabah : ".$nonas;
	$catat="Menambah Data Nasabah ".$nonas." Oleh ".$userid;
	include 'around.php';
	break;
case "2":
	$hasil=$result->query_y1("SELECT nonas,noktp,nama,user_buka,bussdate FROM $tabel_nasabah WHERE noktp='$noktp' AND nonas!='$nonas' LIMIT 1");
	if ($result->num($hasil)>0){
		$row=$result->row($hasil);
		echo "No KTP : ".$noktp." Nama ".$row['nama']." Sudah Terdaftar Pada No Nasabah ".$row['nonas']." Tanggal ".$row['bussdate']." Oleh User ".$row['user_buka'];exit();
	}
	$tgllahir=$result->c_d($_POST['thn_lahir']).'-'.$result->c_d($_POST['bln_lahir']).'-'.$result->c_d($_POST['tgl_lahir']);
	$masaktp=$result->c_d($_POST['thn_ktp']).'-'.$result->c_d($_POST['bln_ktp']).'-'.$result->c_d($_POST['tgl_ktp']);
	$data = array('branch' => $_POST['branch'],'nama' => $_POST['nama'],'tgllahir' => $tgllahir,'tmplahir' => $_POST['tmplahir'],'noktp' => $_POST['noktp'],'masaktp' => $masaktp,'npwp' => $_POST['npwp'],'jkelamin' => $_POST['jkelamin'],'agama' => $_POST['agama'],'pendidikan' => $_POST['pendidikan'],'namaibu' => $_POST['namaibu'],'tanggungan' => $_POST['tanggungan'],'tlprumah' => $_POST['tlprumah'],'tlpfax' => $_POST['tlpfax'],'tlphp1' => $_POST['tlphp1'],'tlphp2' => $_POST['tlphp2'],'alamat' => $_POST['alamat'],'lurah' => $_POST['lurah'],'camat' => $_POST['camat'],'kdpos' => $_POST['kdpos'],'kota' => $_POST['kota'],'propinsi' => $_POST['propinsi'],
	'negara' => $_POST['negara'],
	'status_anggota' =>$_POST['status_anggota'],
	'lamarmh' => $_POST['lamarmh'],'pekerjaan1' => $_POST['pekerjaan1'],'pekerjaan2' => $_POST['pekerjaan2'],'alamatb' => $_POST['alamatb'],'lurahb' => $_POST['lurahb'],'camatb' => $_POST['camatb'],'kdposb' => $_POST['kdposb'],'kotab' => $_POST['kotab'],'npwpu' => $_POST['npwpu'],'usaha1' => $_POST['usaha1'],'usaha2' => $_POST['usaha2'],'alamatu' => $_POST['alamatu'],'lurahu' => $_POST['lurahu'],'camatu' => $_POST['camatu'],	'kdposu' => $_POST['kdposu'],'kotau' => $_POST['kotau'],'propinsiu' => $_POST['propinsiu'],'bidang' => $_POST['bidang'],'tlpfaxu' => $_POST['tlpfaxu'],'tlphpu' => $_POST['tlphpu'],'hasilk' => $_POST['hasilk'],'hasilb' => $_POST['hasilb'],'sumberl' => $_POST['sumberl'],'sistri' => $_POST['sistri'],'kstatus' => $_POST['kstatus'],'rumah' => $_POST['rumah'],'tujuanrek' => $_POST['tujuanrek'],'propinsib' => $_POST['propinsib'],'tgl_pengkinian' => date('Y-m-d H:i:s'),'user_pengkinian' => $userid,'bussdate' => date('Y-m-d H:i:s'));
	$where = array('id' => $_POST['id']);
	$result->update($tabel_nasabah, $data, $where);
	echo "Sukses Update Data, Nomor Nasabah : ".$nonas;
	$catat="Koreksi Data Nasabah ".$nonas;
	include 'around.php';
	break;
}?>