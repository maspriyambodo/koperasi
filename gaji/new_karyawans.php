<?php 
include "../gaji/par_atas01.php";
$t=date_sql($tanggal);
$id=$result->clean_data($_POST['id']);
$nik=$result->clean_data($_POST['nik']);
$kode_grade=$result->clean_data($_POST['kode_grade']);
$hasil=$result->query_2("SELECT grade,gaji_pokok,tunjangan_tkd,tunjangan_jabatan,tunjangan_perumahan,tunjangan_telepon,tunjangan_kesehatan,tunjangan_lain,uang_makan,uang_hadir,uang_transport FROM $tabel_grade WHERE kode_grade='$kode_grade' ORDER BY kode_grade LIMIT 1",'');
$row= $result->row($hasil);
$grade=$row['grade'];
$gaji_pokok=$row['gaji_pokok'];
$tunjanan_tkd=$row['tunjangan_tkd'];
$tunjanan_jabatan=$row['tunjangan_jabatan'];
$tunjanan_perumahan=$row['tunjangan_perumahan'];
$tunjanan_telepon=$row['tunjangan_telepon'];
$tunjanan_kesehatan=$row['tunjangan_kesehatan'];
$tunjangan_lain=$row['tunjangan_lain'];
$uang_makan=$row['uang_makan'];
$uang_hadir=$row['uang_hadir'];
$uang_transport=$row['uang_transport'];
switch ($result->clean_data($_GET['p'] )) {
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	$data = array(
		'branch'=>$_POST['branch'],
		'nik' => $_POST['nik'],
		'nama_karyawan' => $_POST['nama_karyawan'],
		'no_ktp' => $_POST['no_ktp'],
		'tgl_lahir' => date_sql($_POST['tgl_lahir']),
		'tempat_lahir' => $_POST['tempat_lahir'],
		'alamat' => $_POST['alamat'],
		'kelurahan' => $_POST['kelurahan'],
		'kecamatan' => $_POST['kecamatan'],
		'kabupaten' => $_POST['kabupaten'],
		'propinsi' => $_POST['propinsi'],
		'kode_ptkp' => $_POST['kode_ptkp'],
		'jenis_kelamin' => $_POST['jenis_kelamin'],
		'no_telepon_1' => $_POST['no_telepon_1'],
		'no_telepon_2' => $_POST['no_telepon_2'],
		'kode_grade' => $_POST['kode_grade'],
		'kode_jabatan' => $_POST['kode_jabatan'],
		'kode_lokasi' => $_POST['kode_lokasi'],
		'kode_wilayah' => $_POST['kode_wilayah'],
		'kode_organisasi' => $_POST['kode_organisasi'],
		'no_npwp' => $_POST['no_npwp'],
		'no_jamsostek' => $_POST['no_jamsostek'],
		'no_rekening' => $_POST['no_rekening'],
		'no_rekening_lain' => $_POST['no_rekening_lain'],
		'no_kredit' => $_POST['no_kredit'],
		'grade' => $row['grade'],
		'gaji_pokok' => $row['gaji_pokok'],
		'tunjangan_tkd' => $row['tunjangan_tkd'],
		'tunjangan_jabatan' => $row['tunjangan_jabatan'],
		'tunjangan_perumahan' => $row['tunjangan_perumahan'],
		'tunjangan_telepon' => $row['tunjangan_telepon'],
		'tunjangan_kesehatan' => $row['tunjangan_kesehatan'],
		'tunjangan_lain' => $row['tunjangan_lain'],
		'uang_makan' => $row['uang_makan'],
		'uang_hadir' => $row['uang_hadir'],
		'uang_transport' => $row['uang_transport'],
		'user_input' => $userid,
		'tgl_input' => date('Y-m-d H:i:s'),
		'user_update' => $userid,
		'tgl_update' => date('Y-m-d H:i:s'),
	    'bussdate' => date('Y-m-d H:i:s')
	);
	$lastID = $result->insert($tabel_master, $data);
	echo 'Sukses Di Simpan NIK '.$nik;
	$result->close();
	$catat="Menambah Data Karyawan ".$nik;
	include '../around.php';
	break;
case "2":
	$data = array(
		'branch'=>$_POST['branch'],
		'nik' => $_POST['nik'],
		'nama_karyawan' => $_POST['nama_karyawan'],
		'no_ktp' => $_POST['no_ktp'],
		'tgl_lahir' => date_sql($_POST['tgl_lahir']),
		'tempat_lahir' => $_POST['tempat_lahir'],
		'alamat' => $_POST['alamat'],
		'kelurahan' => $_POST['kelurahan'],
		'kecamatan' => $_POST['kecamatan'],
		'kabupaten' => $_POST['kabupaten'],
		'propinsi' => $_POST['propinsi'],
		'kode_ptkp' => $_POST['kode_ptkp'],
		'jenis_kelamin' => $_POST['jenis_kelamin'],
		'no_telepon_1' => $_POST['no_telepon_1'],
		'no_telepon_2' => $_POST['no_telepon_2'],
		'kode_grade' => $_POST['kode_grade'],
		'kode_jabatan' => $_POST['kode_jabatan'],
		'kode_lokasi' => $_POST['kode_lokasi'],
		'kode_wilayah' => $_POST['kode_wilayah'],
		'kode_organisasi' => $_POST['kode_organisasi'],
		'no_npwp' => $_POST['no_npwp'],
		'no_jamsostek' => $_POST['no_jamsostek'],
		'no_rekening' => $_POST['no_rekening'],
		'no_rekening_lain' => $_POST['no_rekening_lain'],
		'no_kredit' => $_POST['no_kredit'],
		'grade' => $row['grade'],
		'gaji_pokok' => $row['gaji_pokok'],
		'tunjangan_tkd' => $row['tunjangan_tkd'],
		'tunjangan_jabatan' => $row['tunjangan_jabatan'],
		'tunjangan_perumahan' => $row['tunjangan_perumahan'],
		'tunjangan_telepon' => $row['tunjangan_telepon'],
		'tunjangan_kesehatan' => $row['tunjangan_kesehatan'],
		'tunjangan_lain' => $row['tunjangan_lain'],
		'uang_makan' => $row['uang_makan'],
		'uang_hadir' => $row['uang_hadir'],
		'uang_transport' => $row['uang_transport'],
		'user_update' => $userid,
		'tgl_update' => date('Y-m-d H:i:s'),
	    'bussdate' => date('Y-m-d H:i:s')
	);
    $where = array('id' => $id);
    $result->update($tabel_master, $data, $where);
	echo 'Sukses Update NIK '.$nik;
	$result->close();
	$catat="Update Data Karyawan ".$nik;
	include '../around.php';
	break;
}
?>