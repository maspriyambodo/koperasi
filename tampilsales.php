<?php 
include 'h_atas.php';
$nrekom=$_GET['nrekom'];$hasil=$result->res("SELECT nama,alamat,notlp,kelurahan,kecamatan,kabupaten,noktp,tglktp FROM sales WHERE nama LIKE '%$nrekom%'");
if ($result->num($hasil)!=0) {
	$row = $result->row($hasil);
	$data['arekom'] = $row['alamat'];
	$data['trekom'] = $row['notlp'];
	$data['lrekom'] = $row['kelurahan'];
	$data['krekom'] = $row['kecamatan'];
	$data['brekom'] = $row['kabupaten'];
	$data['nktprekom'] = $row['noktp'];
	$data['tktprekom'] =date_sql($row['tglktp']);
	$data['pesan'] = 'Sukses';
	echo json_encode($data);
}else{
	$data['pesan'] = 'Nama Sales Tidak Di Temukan...!';
	echo json_encode($data);
}
?>