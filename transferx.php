<?php
include "h_tetap.php";
$t=date_sql($tanggal);
$branch=$kcabang;
$hasil=$result->query_x1("SELECT b.nonas,b.sufix,b.produk,b.noreks,b.kdkop,b.saldoa,b.jangka,a.norekx,a.pokok,a.bunga,a.adm,a.jumlah,a.nama FROM transaksi a JOIN kredit b ON a.norekx=b.norek ORDER BY b.nonas");
if($result->num($hasil)==0){ 
	die("Data Transfer Transaksi Tidak Ditemukan...?  ");
}
$text5="INSERT INTO payment(id,branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdaktif,kdkop,tanggal) VALUES";

$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";

$text10="INSERT INTO transaksix(norekx,pokok) VALUES";

$jumlahx=0;
$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
while ($row = $result->row($hasil)) {
	$nonas=$row['nonas'];
	$sufix=$row['sufix'];
	$norek=$row['norekx'];
	$produk=$row['produk'];
	$kdkop=$row['kdkop'];
	$jumlah=$row['jumlah'];
	$blunass=$row['bunga'];
	$alunass=$row['adm'];
	$saldoas=$row['pokok'];
	$saldoxx=$row['saldoa'];
	$nama=$row['nama'];
	$jangkaxxx=$row['jangka'];
	$xuser='KSP03';
	$ada=FALSE;
	$blunas=0;$alunas=0;$saldoa=0;$total=0;$jum_angsuran=0;$jum_selisih=0;
	if($jumlah>0){
		include 'lib/kreditp.php';
		include 'transferxx.php';
		$jum_angsuran=$saldoa+$blunas+$alunas;
		$jum_selisih=$jumlah-$jum_angsuran;
		$desc="SETORAN ANGSURAN MICRO ".$nama.' - '.$norek;
		$text .="('".$branch."','".$pp_angsuranx."',360,'".$norek."','".$namas[7]."','".$pp_angsuran."',NULL,'".$jumlah."',300,31,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
		if($saldoa>0){
			$desc="SETORAN MICRO POKOK ".$nama.' - '.$norek;
			$text .="('".$branch."','".$spokokx."',360,'".$norek."','".$nama."','".$spokok."',NULL,'".$saldoa."',438,31,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
			$text10 .="('".$norek."','".$saldoa."'),";	
		}
		if($blunas>0){
			$desc="SETORAN MICRO BUNGA ".$nama.' - '.$norek;
			$text .="('".$branch."','".$sbungax."',360,'".$norek."','".$namas[1]."','".$sbunga."',NULL,'".$blunas."',439,31,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
		}
		if($alunas>0){
			$desc="SETORAN MICRO ADM ".$nama.' - '.$norek;
			$text .="('".$branch."','".$sadmx."',360,'".$norek."','".$namas[2]."','".$sadm."',NULL,'".$alunas."',440,31,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
		}
		if($jum_selisih>0){
			$sandi_selisih=$branch.'314199360';
			$kete='- PEND NON OPERASIONAL LAINNYA';
			$desc="SELISIH SETORAN ANGSURAN MICRO ".$nama.' - '.$norek;
			$text .="('".$branch."',314199,360,'".$norek."','".$kete."','".$sandi_selisih."',NULL,'".$jum_selisih."',439,31,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
		}
	}
}
$text=substr_replace($text,';',-1);
if(substr($text5,-1)==','){
	$text5=substr_replace($text5,';',-1);
	$text .=$text5;
}
$text10=substr_replace($text10,';',-1);
$text .=$text10;

$text .="UPDATE kredit a JOIN transaksix b ON a.norek=b.norekx SET a.memkre=a.memkre+b.pokok;";
$text .="UPDATE kredit SET saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre)";
$result->multi_x($text);
echo $text.' Sukses';
$result->close();
 ?>