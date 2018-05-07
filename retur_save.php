<?php 
include 'h_tetap.php';$id=$result->c_d($_GET['id']);$hasil=$result->query_cari("SELECT a.id,a.branch,a.norek,a.nonas,a.sufix,a.nama,a.pokok,a.bunga,a.adm,a.jumlah,b.produk,b.kdkop,b.noreks,c.kdproduk,c.spokok,c.sbunga,c.sadm FROM $tabel_payment a JOIN kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk WHERE a.id='$id'");$row=$row=$result->row($hasil);$branch=$row['branch'];$norek=$row['norek'];$nonas=$row['nonas'];$sufix=$row['sufix'];$nama=$row['nama'];$saldoa=$row['pokok'];$blunas=$row['bunga'];$alunas=$row['adm'];$jumlah=$saldoa+$blunas+$alunas;$produk=$row['produk'];$kdkop=$row['kdkop'];$noreks=$row['noreks'];$spokok=$row['branch'].$row['spokok'].'360';$spokokx=$row['spokok'];$sbunga=$row['branch'].$row['sbunga'].'360';$sbungax=$row['sbunga'];$sadm=$row['branch'].$row['sadm'].'360';$sadmx=$row['sadm'];$xuser='';$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);$t=date_sql($tanggal);$nonass=substr($noreks,4,6);$gl_retur=$branch.'213301360';$gl_returx='213301';$file='json/sandi.json';$json_file = file_get_contents($file);$jfo = json_decode($json_file,TRUE);$huruf = array($spokokx,$sbungax,$sadmx,$nonass,$gl_returx);$y=0;while ($y<5){$deb1=$huruf[$y];for ($i=0; $i<count($jfo); $i++){if($deb1==$jfo[$i]['nonas']){$namas[$y]=$jfo[$i]['nama'];}}$y++;}
$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
if($jumlah>0){
	$desc="RETUR ANGSURAN TAGIHAN ".$norek;
	$text .="('".$branch."','".$gl_returx."',360,'".$norek."','".$namas[4]."','".$gl_retur."',NULL,'".$jumlah."',400,80,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	if($saldoa>0){
		$desc="RETUR POKOK TAGIHAN ".$norek;
		$text .="('".$branch."','".$spokokx."',360,'".$norek."','".$namas[0]."','".$spokok."',NULL,'".$saldoa."',338,80,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
	}
	if($blunas>0){
		$desc="RETUR BUNGA TAGIHAN ".$norek;
		$text .="('".$branch."','".$sbungax."',360,'".$norek."','".$namas[1]."','".$sbunga."',NULL,'".$blunas."',339,80,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
	}
	if($alunas>0){
		$desc="RETUR ADM TAGIHAN ".$norek;$text .="('".$branch."','".$sadmx."',360,'".$norek."','".$namas[2]."','".$sadm."',NULL,'".$alunas."',340,80,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
	}
	$text=substr_replace($text,';',-1);$text .="UPDATE payment SET tgtagihan='$t',kdtran=222,kdaktif=80 WHERE id='$id';";$text .="UPDATE kredit SET memdeb=memdeb+'$saldoa',saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now() WHERE norek='$norek'";
	$result->multi_y($text);$catat="Sukses Simpan PKP/Retur Rekening ".$norek;echo $catat;$result->close();include 'around.php';
}else{
	die('Jumlah Tagihan Tidak Ada...');
}
?>