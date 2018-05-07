<?php 
include 'h_tetap.php';
$cek_nopen=$_GET['cek_nopen'];
$hasil=$result->res("SELECT notas,jenis,bersih,kdjiwa,nomor_skep,tanggal_skep,penerbit_skep,norutdapem,kdstop FROM $tabel_maspen WHERE notas='$cek_nopen' LIMIT 1");
if(!$hasil){
	$data['pesan']= $result->xpdata("");
	echo json_encode($data);exit();
}
if($result->num($hasil)<1){
	$data['pesan'] = "Nopen Pensiun Tidak Ditemukan";
	echo json_encode($data);exit();
}
$row = $result->row($hasil);
$data['nopen'] = $row['notas'];
$data['jenis'] = $row['jenis'];
$data['gaji'] = $row['bersih'];
$data['kdjiwa'] = $row['kdjiwa'];
$data['nomor_skep'] = $row['nomor_skep'];
$data['tanggal_skep'] = date_sql($row['tanggal_skep']);
$data['penerbit_skep'] = $row['penerbit_skep'];
$data['norutdapem'] = $row['norutdapem'];
$data['kdstop'] = $row['kdstop'];
$data['pesan'] = 'Sukses';
echo json_encode($data);
?>