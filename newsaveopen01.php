<?php 
include 'h_tetap.php';$norek=$result->c_d($_POST['norek']);$kode_buka=$result->c_d($_POST['kode_buka']);$kode_pajak=$result->c_d($_POST['kode_pajak']);$produk=$result->c_d($_POST['produk']);$nonas=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);
$hasil=$result->query_y1("SELECT id FROM $tabel_produkt WHERE kdproduk='$produk' LIMIT 1");
if($result->num($hasil)<1) die('Jenis Produk Tabungan Tidak Di Temukan!');$row=$result->row($hasil);$no_produk=$row['id'];$no_produk=substr("00".$no_produk,-2);
$hasil=$result->query_y1("SELECT MAX(sufix) AS sufix FROM $tabel_tabungan WHERE nonas='$nonas'");$row=$result->row($hasil);$sufix=$row['sufix'];
if($sufix==''){
	$sufix=100;
}else{
	$sufix++;
}
if($kode_buka==0){
	$hasil=$result->query_y1("SELECT SUBSTR(MAX(norek),-6) AS norek FROM $tabel_tabungan WHERE branch='$branch'");
	$row=$result->row($hasil);
	$norek=$row['norek'];
	if($row['norek']==''){
		$norek=1;$norek=substr("0000000".$norek,-7);
		$norek=$branch.$no_produk.$norek;
	}else{
		$norek++;$norek=substr("0000000".$norek,-7);
		$norek=$branch.$no_produk.$norek;
	}
}
$result->query_y1("INSERT INTO $tabel_tabungan(branch,nonas,sufix,norek,tgbuka,produk,user_input,tgl_input,user_update,tgl_update,bussdate,buka_rekening)VALUES('$branch','$nonas','$sufix','$norek','$t','$produk','$userid',now(),'$userid',now(),now(),'$kode_buka')");
echo 'Sukses Menambah Rekening : '.$norek;$result->close();$catat="Buka Rekening Tabungan ".$nonas.' '.$norek.' Oleh '.$userid;include 'around.php';
?>