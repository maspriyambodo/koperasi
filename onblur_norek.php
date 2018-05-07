<?php 
include 'h_atas.php';
$text1=$_GET['text1'];
$text2=$_GET['text2'];
$text3=$_GET['text3'];
$term=$text1.$text2.$text3;
$stmt=$result->res("SELECT a.norek,b.nama FROM nabasa.tabungan a JOIN nabasa.nasabah b ON a.nonas=b.nonas WHERE a.norek LIKE '%$term%' UNION ALL SELECT norekgssl AS norek,nama FROM akuntansi.sandi WHERE substr(nonas,-2)!=00 AND norekgssl LIKE '%$term%' LIMIT 1");
if($result->num($stmt)!=0) {
	$row=$result->row($stmt);
	$data['nama'] = $row['nama'];
	$data['branch'] = substr($row['norek'],0,4);
	$data['nonas'] = substr($row['norek'],4,6);
	$data['sufix'] = substr($row['norek'],-3);
	$data['pesan'] = 'Sukses';
	echo json_encode($data);
}else{
	$data['pesan'] = 'Nama Rekening Tidak Di Temukan!';
	echo json_encode($data);
}
?>