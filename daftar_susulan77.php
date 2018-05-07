<?php 
include 'h_tetap.php';
$bln=$result->c_d($_POST['bln']);$result->c_d($thn=$_POST['thn']);$result->c_d($kkbayar=$_POST['kkbayar']);
$hasil=$result->query_x1("SELECT a.id,a.branch,a.norek,a.nonas,a.nama,a.sufix,a.pokok,a.bunga,a.adm,a.kdkop,a.jumlah,a.kdtran,a.angsurke,a.bulan,a.tanggal,b.produk,b.noreks,b.kolek,c.kdproduk,c.spokok,c.sbunga,c.sadm FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.kdtran=111 AND b.kkbayar='$kkbayar'");
if($result->num($hasil)==0)$result->msg_error("Data  Tagihan Tidak Ada...? ");
$xuser='';$totaldbt=0;$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
$text1="INSERT INTO $tabel_payment(branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,kdaktif,oper,bussdate,bulan,kdkop,tanggal) VALUES";
while($row=$result->row($hasil)){
	$id=$row['id'];$branch=$row['branch'];$norek=$row['norek'];$nonas=$row['nonas'];$nama=$row['nama'];$sufix=$row['sufix'];
	$kdkop=$row['kdkop'];$saldoa=$row['pokok'];$blunas=$row['bunga'];$alunas=$row['adm'];$jumlah=$row['jumlah'];
	$angsurke=$row['angsurke'];$bulan=$row['bulan'];$produk=$row['produk'];$tgl1=$row['tanggal'];
	$text1 .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$saldoa."','".$blunas."','".$alunas."','".$jumlah."','".$t."',777,'".$angsurke."',15,'".$userid."',now(),'".$bulan."','".$kdkop."','".$tgl1."'),";
	$noreks=$row['noreks'];$spokok=$row['branch'].$row['spokok'].'360';$spokokx=$row['spokok'];
	$sbunga=$row['branch'].$row['sbunga'].'360';$sbungax=$row['sbunga'];$sadm=$row['branch'].$row['sadm'].'360';
	$sadmx=$row['sadm'];$kolek=$row['kolek'];$nonass='213204';
	$file='json/sandi.json';
	$json_file = file_get_contents($file);$jfo = json_decode($json_file,TRUE);$huruf = array($spokokx,$sbungax,$sadmx,$nonass);$y=0;
	while ($y<4){$deb1=$huruf[$y];for ($i=0; $i<count($jfo); $i++){if($deb1==$jfo[$i]['nonas']){$namas[$y]=$jfo[$i]['nama'];}}$y++;}
	$gssl=$branch.$nonass.'360';$produks='360';$sufixs='360';
	if($jumlah>0){
		$desc="REALISASI ANGSURAN SUSULAN".$nama.' - '.$norek;
		$text .="('".$branch."','".$nonass."',360,'".$norek."','".$namas[3]."','".$gssl."',NULL,'".$jumlah."',300,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
		$totaldbt=$totaldbt+$jumlah;
		if($saldoa>0){
			$desc="REALISASI POKOK SUSULAN".$nama.' - '.$norek;
			$text .="('".$branch."','".$spokokx."',360,'".$norek."','".$namas[0]."','".$spokok."',NULL,'".$saldoa."',438,15,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
		}
		if($blunas>0){
			$desc="REALISASI BUNGA SUSULAN".$nama.' - '.$norek;
			$text .="('".$branch."','".$sbungax."',360,'".$norek."','".$namas[1]."','".$sbunga."',NULL,'".$blunas."',439,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
		}
		if($alunas>0){
			$desc="REALISASI ADM SUSULAN".$nama.' - '.$norek;
			$text .="('".$branch."','".$sadmx."',360,'".$norek."','".$namas[2]."','".$sadm."',NULL,'".$alunas."',440,15,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
		}
	}
}
if($totaldbt>0){
	$text=substr_replace($text,';',-1);
	$text1=substr_replace($text1,';',-1);
	$text .=$text1;$text .="UPDATE $tabel_kredit a JOIN $tabelSusulan b ON a.norek=b.norek SET a.memkre=a.memkre+b.pokok,a.bussdate=now() WHERE b.kdtran=111 AND a.kkbayar='$kkbayar';";
	$text .="UPDATE $tabel_kredit SET saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre) WHERE kkbayar='$kkbayar';";
	$text .="UPDATE $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek SET a.kdtran=777,a.kdaktif=1 WHERE a.kdtran=111 AND b.kkbayar='$kkbayar'";
	$result->multi_x($text);$xp='Proses Realisasi Tagihan Susulan'.$blnxxx.'-'.$thnxxx.' Sekses';$result->msg_error($xp);$result->close();$catat='Proses Realisasi Tagihan Susulan Kredit '.$blnxxx.'-'.$thnxxx.' Oleh '.$userid;include 'around.php';
}
?>