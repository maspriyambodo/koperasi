<?php 
include '../h_tetap.php';
$id=$result->c_d($_GET['id']);$kode_cair=$result->c_d($_GET['kode_cair']);
$hasil=$result->query_y1("SELECT a.id,a.branch,a.norek,a.nonas,a.nama,a.sufix,a.pokok,a.bunga,a.adm,a.kdkop,a.jumlah,a.kdtran,a.angsurke,a.bulan,a.tanggal,b.produk,b.noreks,c.kdproduk,c.spokok,c.sbunga,c.sadm FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk WHERE a.id='$id' AND a.kdtran=111 LIMIT 1");
if($result->num($hasil)<1)die("Data Tagihan Tidak Ada...? ");
$row=$result->row($hasil);$branch=$row['branch'];$norek=$row['norek'];$nonas=$row['nonas'];$nama=$row['nama'];$kdkop=$row['kdkop'];$sufix=$row['sufix'];$saldoa=$row['pokok'];$blunas=$row['bunga'];$alunas=$row['adm'];$jumlah=$row['jumlah'];$angsurke=$row['angsurke'];$bulan=$row['bulan'];$produk=$row['produk'];$noreks=$row['noreks'];$tgl1=$row['tanggal'];$xuser='';$spokok=$row['branch'].$row['spokok'].'360';$spokokx=$row['spokok'];$sbunga=$row['branch'].$row['sbunga'].'360';$sbungax=$row['sbunga'];$sadm=$row['branch'].$row['sadm'].'360';$sadmx=$row['sadm'];
$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
$ada=FALSE;$nonass='213204';if($jumlah<1) die('Transaksi Batal');if($kode_cair==0){$giro_btpnx='102102';$giro_btpn=$branch.$giro_btpnx.'360';}elseif($kode_cair==1){$giro_btpnx='213204';$giro_btpn=$branch.$giro_btpnx.'360';$ada=TRUE;}else{$giro_btpnx='113107';$giro_btpn=$branch.$giro_btpnx.'360';}
include '../config/_glkredity.php';
$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
$desc="REALISASI ANGSURAN MANUAL SUSULAN ".$nama.' - '.$norek;
if($ada==FALSE){
	$text .="('".$branch."','".$giro_btpnx."',360,'".$giro_btpn."','".$namas[6]."','".$giro_btpn."',NULL,'".$jumlah."',300,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	$text .="('".$branch."','".$pp_angsuranx."',360,'".$pp_angsuran."','".$namas[7]."','".$pp_angsuran."',NULL,'".$jumlah."',400,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}
$text .="('".$branch."','".$pp_angsuranx."',360,'".$norek."','".$namas[7]."','".$pp_angsuran."',NULL,'".$jumlah."',300,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
if($saldoa>0){
	$desc="REALISASI POKOK MANUAL SUSULAN".$nama.' - '.$norek;$text .="('".$branch."','".$spokokx."',360,'".$norek."','".$nama."','".$spokok."',NULL,'".$saldoa."',438,15,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
}
if($blunas>0){
	$desc="REALISASI BUNGA MANUAL SUSULAN".$nama.' - '.$norek;$text .="('".$branch."','".$sbungax."',360,'".$norek."','".$namas[1]."','".$sbunga."',NULL,'".$blunas."',439,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
}
if($alunas>0){
	$desc="REALISASI ADM MANUAL SUSULAN".$nama.' - '.$norek;$text .="('".$branch."','".$sadmx."',360,'".$norek."','".$namas[2]."','".$sadm."',NULL,'".$alunas."',440,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
}
$text=substr_replace($text,';',-1);
$text .="INSERT INTO $tabel_payment(id,branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdaktif,kdkop,tanggal) VALUES('','$branch','$norek','$sufix','$nonas','$nama','$produk','$saldoa','$blunas','$alunas','$jumlah','$t',777,'$angsurke','$bulan','$userid',now(),15,'$kdkop','$tgl1');";
$text .="UPDATE $tabelSusulan SET kdtran=777 WHERE id='$id';";
$text .="UPDATE $tabel_kredit SET memkre=memkre+'$saldoa',saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now() WHERE norek='$norek'";
$result->multi_y($text);$result->close();echo 'Sukses Realisasi Tagihan Susulan Manual '.$norek;
$catat="Realisasi Tagihan Susulan Manual ".$norek.' Oleh '.$userid;include '../around.php';
?>