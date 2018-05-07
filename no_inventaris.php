<?php 
include 'h_tetap.php';
$kode_inventaris=$result->c_d($_GET['kode_inventaris']);
$bln=date('m',strtotime($tanggal));
$thn=date('Y',strtotime($tanggal));
$hasil=$result->res("SELECT id FROM $tabel_inventaris ORDER BY id DESC LIMIT 1");
if(!$hasil) {
	$xp=$result->display_errors($str='');
	$data['pesan'] = $xp;
	echo json_encode($data);exit();
}
if($result->num($hasil)<1){
	$num_id=0;
}else{
	$datamax= $result->row($hasil);
	$num_id =intval($datamax['id']);
}
$num_id=$num_id+1;
$kode_inventaris=substr('00'.$kode_inventaris,-2);
$no_inventaris=substr('00000'.$num_id,-5);
$no_inventaris='INV'.$kcabang.$kode_inventaris.$bln.$thn.$no_inventaris;
$data['no_inventaris']=$no_inventaris;
$data['pesan'] = 'Sukses';
echo json_encode($data);
$result->close();
?>