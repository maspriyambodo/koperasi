<?php 
include '../h_tetap.php';$id=$result->c_d($_POST['id']);$branch=$result->c_d($_POST['branch']);$nonas=$result->c_d($_POST['nonas']);$sufix=$result->c_d($_POST['sufix']);$norek=$result->c_d($_POST['norek']);$nama=$result->c_d($_POST['nama']);$produk=$result->c_d($_POST['produk']);$kdkop=$result->c_d($_POST['kdkop']);$jumlah_cair=$result->c_d(keangka($_POST['jumlah_cair']));$angsurke=$result->c_d($_POST['fangsur']);$xuser=$result->c_d($_POST['xuser']);$jenis_klaim=$result->c_d($_POST['jenis_klaim']);$tglcair=date_sql($tanggal);$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
if($jumlah_cair<1)die('Transaksi Batal, Nominal Pencairan Nol');
if($jenis_klaim==0) {
	$desc="PENCAIRAN KLAIM ".$nama.' - '.$norek;
	$giro_btpnx='213805';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==1){
	$desc="PPAP CADANGAN UMUM PENSIUN ".$nama.' - '.$norek;
	$giro_btpnx='108102';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==2){
	$desc="PPAP CADANGAN UMUM PEGAWAI ".$nama.' - '.$norek;
	$giro_btpnx='108103';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==3){
	$desc="PPAP CADANGAN UMUM MICRO ".$nama.' - '.$norek;
	$giro_btpnx='108101';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==4){
	$desc="PPAP CADANGAN KHUSUS PENSIUN ".$nama.' - '.$norek;
	$giro_btpnx='108202';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==5){
	$desc="PPAP CADANGAN KHUSUS PEGAWAI ".$nama.' - '.$norek;
	$giro_btpnx='108203';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==6){
	$desc="PPAP CADANGAN KHUSUS MICRO ".$nama.' - '.$norek;
	$giro_btpnx='108201';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==7){
	$desc="TKAK PENSIUN ".$nama.' - '.$norek;
	$giro_btpnx='113401';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==8){
	$desc="TKAK PEGAWAI AKTIF ".$nama.' - '.$norek;
	$giro_btpnx='113402';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==9){
	$desc="TKAK MICRO ".$nama.' - '.$norek;
	$giro_btpnx='113403';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==10){
	$desc="SKAK PENSIUN ".$nama.' - '.$norek;
	$giro_btpnx='113501';$giro_btpn=$branch.$giro_btpnx.'360';
}elseif($jenis_klaim==11){
	$desc="SKAK PEGAWAI AKTIF  ".$nama.' - '.$norek;
	$giro_btpnx='113502';$giro_btpn=$branch.$giro_btpnx.'360';
}else{
	$desc="SKAK MICRO ".$nama.' - '.$norek;
	$giro_btpnx='113503';$giro_btpn=$branch.$giro_btpnx.'360';
}
include '../config/_glkredit.php';$text1='';$text2='';
$hasil=$result->query_y1("SELECT sufix,nonas,produk,nama,angsurke,bulan,tgtagihan,kdkop,tanggal FROM $tabel_payment WHERE norek='$norek' AND angsurke='$angsurke' LIMIT 1");
if($result->num($hasil)<1) die('Data Tagihan Angsuran Ke '.$angsurke.' Tidak Ada?');
$row=$result->row($hasil);$mbulan=$row['bulan'];$nama=$row['nama'];$msufix=$row['sufix'];$mnonas=$row['nonas'];$mproduk=$row['produk'];$mangsurke=$row['angsurke'];$mkdkop=$row['kdkop'];$tgl1=$row['tanggal'];
//Tabel Payment
$text1 = "INSERT INTO $tabel_payment(id,branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdaktif,kdkop,tanggal) VALUES('','$branch','$norek','$msufix','$mnonas','$nama','$mproduk','$jumlah_cair',0,0,'$jumlah_cair','$t',777,'$angsurke','$mbulan','$userid',now(),60,'$mkdkop','$tgl1');";
$text2 = "DELETE FROM $tabel_payment WHERE norek='$norek' AND angsurke>'$angsurke';";
//Tabel Transaksi
$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
$text .="('".$branch."','".$giro_btpnx."',360,'".$norek."','".$namas[6]."','".$giro_btpn."',NULL,'".$jumlah_cair."',352,60,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
$text .="('".$branch."','".$spokokx."',360,'".$norek."','".$namas[0]."','".$spokok."',NULL,'".$jumlah_cair."',452,60,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
//Gabungan
$text=substr_replace($text,';',-1);if($text1!='')$text .=$text1;if($text2!='')$text .=$text2;
$text .="UPDATE $tabel_kredit SET memkre=memkre+'$jumlah_cair',kode_cair=1,jumlah_cair='$jumlah_cair',tgl_cair='$tglcair',user_cair='$userid',saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now() WHERE id='$id' LIMIT 1;";
$text .="UPDATE $tabel_klaim SET jumlah_cair='$jumlah_cair',tanggal_cair='$tglcair',kode_cair=1,user_cair='$userid',bussdate_cair=now() WHERE id_kredit='$id' LIMIT 1";$hasil=$result->multi_y($text);echo 'Sukses Di Simpan...';$result->close();$catat=$desc;include '../around.php';
?>