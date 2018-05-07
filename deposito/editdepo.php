<?php
include 'koneksi.php'; include 'function.php'; include 'ftanggal.php';

$id=$_POST['id'];$bunga=$_POST['bunga'];$counter_aro=$_POST['counter_aro'];
echo $counter_aro;
$result = $mysql->query("UPDATE deposits SET bunga='$bunga',counter_aro='$counter_aro' WHERE  id='$id'");

if($result){
	echo "Data Deposito Berhasil Diubah";
}else{
	echo "Proses Simpan Data Tidak Berhasil ".mysqli_error($mysql);
}

?>