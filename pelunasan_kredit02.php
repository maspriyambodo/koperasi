<?php include 'h_tetap.php';$result->buatTabel($temPelunasan,'payment');$t=date_sql($tanggal);$noreks=$result->c_d($_POST['noreks']);
$nama=$result->c_d($_POST['nama']);$id=$result->c_d($_POST['id']);$branch=$result->c_d($_POST['branch']);$nonas=$result->c_d($_POST['nonas']);$sufix=$result->c_d($_POST['sufix']);$norek=$result->c_d($_POST['norek']);$produk=$result->c_d($_POST['produk']);$kdkop=$result->c_d($_POST['kdkop']);$blunas=$result->c_d(keangka($_POST['blunas']));$bungakk=$result->c_d(keangka($_POST['bungakk']));$alunas=$result->c_d(keangka($_POST['alunas']));$flunas=$result->c_d(keangka($_POST['flunas']));$jumlah=$result->c_d(keangka($_POST['jumlah']));$saldoa=$result->c_d(keangka($_POST['saldoa']));$angsurke=$result->c_d($_POST['angsurke']);$xuser=$result->c_d($_POST['xuser']);$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);$kode_cair=$result->c_d($_POST['kode_cair']);$ada=FALSE;if($jumlah<1) die('Transaksi Batal');if($kode_cair==0){$giro_btpnx='102102';$giro_btpn=$branch.$giro_btpnx.'360';}elseif($kode_cair==1){$giro_btpnx='213204';$giro_btpn=$branch.$giro_btpnx.'360';$ada=TRUE;}else{$giro_btpnx='103101';$giro_btpn=$branch.$giro_btpnx.'360';}include 'config/_glkreditx.php';$jumangsur=$saldoa+$blunas+$alunas;$text1='';
if($jumangsur>0){
	$hasil=$result->query_y1("SELECT sufix,nonas,produk,nama,angsurke,bulan,tgtagihan,kdkop,tanggal,kd_tagih FROM $tabel_payment WHERE norek='$norek' AND angsurke='$angsurke' LIMIT 1");
	if($result->num($hasil)>0){
		$row=$result->row($hasil);
		$mbulan=$row['bulan'];$nama=$row['nama'];$msufix=$row['sufix'];$mnonas=$row['nonas'];$mproduk=$row['produk'];$mangsurke=$row['angsurke'];$mkdkop=$row['kdkop'];$tgl1=$row['tanggal'];$kd_tagih=$row['kd_tagih'];
		$text1="INSERT INTO $tabel_payment(branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdaktif,kdkop,tanggal,kd_tagih) VALUES('$branch','$norek','$msufix','$mnonas','$nama','$mproduk','$saldoa','$blunas','$alunas','$jumangsur','$t',777,'$angsurke','$mbulan','$userid',now(),50,'$mkdkop','$tgl1','$kd_tagih');";
		$text1 .="INSERT INTO $temPelunasan SELECT '',branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,kdaktif,oper,bussdate,bulan,kdkop,tanggal,alasan_tt,solusi_tt,kd_tagih FROM $tabel_payment WHERE norek='$norek' AND angsurke>'$angsurke';";
		$text1 .="DELETE FROM $tabel_payment WHERE norek='$norek' AND angsurke>'$angsurke';";
	}
}
$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";$desc="PELUNASAN MEMORIAL ".$nama.' - '.$norek;
if($ada==FALSE){
	$text .="('".$branch."','".$giro_btpnx."',360,'".$giro_btpn."','".$namas[6]."','".$giro_btpn."',NULL,'".$jumlah."',300,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	if($kdkop>1){
		$text .="('".$branch."','".$pp_microx."',360,'".$pp_micro."','".$namas[9]."','".$pp_micro."',NULL,'".$jumlah."',400,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}else{
		$text .="('".$branch."','".$pp_angsuranx."',360,'".$pp_angsuran."','".$namas[7]."','".$pp_angsuran."',NULL,'".$jumlah."',400,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
}
if($kdkop>1){
	$text .="('".$branch."','".$pp_microx."',360,'".$norek."','".$namas[9]."','".$pp_micro."',NULL,'".$jumlah."',300,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}else{
	$text .="('".$branch."','".$pp_angsuranx."',360,'".$norek."','".$namas[7]."','".$pp_angsuran."',NULL,'".$jumlah."',300,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}
if($saldoa>0){
	$desc="PELUNASAN MEMO POKOK ".$nama.' - '.$norek;$text .="('".$branch."','".$spokokx."',360,'".$norek."','".$namas[0]."','".$spokok."',NULL,'".$saldoa."',438,50,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
}
if($blunas>0){
	$desc="PELUNASAN BUNGA MEMO ".$nama.' - '.$norek;$text .="('".$branch."','".$slunasx."',360,'".$norek."','".$namas[4]."','".$slunas."',NULL,'".$blunas."',439,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
}
if($alunas>0){
	$desc="PELUNASAN ADM MEMO ".$nama.' - '.$norek;$text .="('".$branch."','".$sadmx."',360,'".$norek."','".$namas[2]."','".$sadm."',NULL,'".$alunas."',440,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
}
if($bungakk>0){
	$desc="PELUNASAN DENDA MEMO ".$nama.' - '.$norek;$text .="('".$branch."','".$sdendax."',360,'".$norek."','".$namas[3]."','".$sdenda."',NULL,'".$bungakk."',441,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',40,'".$noreferensi."'),";
}
if($flunas>0){
	$desc="FINALTI PELUNASAN MEMO ".$nama.' - '.$norek;$text .="('".$branch."','".$sfinaltix."',360,'".$norek."','".$namas[5]."','".$sfinalti."',NULL,'".$flunas."',442,50,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',50,'".$noreferensi."'),";
}
$text=substr_replace($text,';',-1);if($text1!=''){$text .=$text1;}$text .="UPDATE $tabel_kredit SET memkre=memkre+'$saldoa',saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now() WHERE id='$id' LIMIT 1";$result->multi_y($text);$result->close();$catat='Sukses Simpan Pelunasan Rekening '.$norek;echo $catat;include 'around.php'; ?>