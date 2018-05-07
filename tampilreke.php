<?php 
include 'h_atas.php';
$text1=$_GET['text1'];$text2=$_GET['text2'];$text3=$_GET['text3'];$term=$text1.$text2.$text3;
$stmt=$result->res("SELECT b.nama FROM nabasa.tabungan a JOIN nabasa.nasabah b ON a.nonas=b.nonas WHERE a.norek LIKE '%$term%' UNION ALL SELECT nama FROM akuntansi.sandi WHERE substr(nonas,-2)!=00 AND norekgssl LIKE '%$term%' LIMIT 1");
if($result->num($stmt)!=0) {
	$row = $result->row($stmt);
	$data['nama'] = $row['nama'];
	$data['pesan'] = 'Sukses';
	echo json_encode($data);
}else{
	$data['pesan'] = 'Nama Rekening Tidak Di Temukan!';
	echo json_encode($data);
}
?>