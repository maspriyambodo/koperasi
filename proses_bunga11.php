<?php
include 'h_tetap.php';
$tgl=$result->c_d($_POST['tgl']);$bln=$result->c_d($_POST['bln']);
$thn=$result->c_d($_POST['thn']);$result->tem_tabel($userid,'tem_bunga');
$hasil=$result->query_x1("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.produk,a.saldoawal,a.mutdebet,a.mutkredit,a.memdebet,a.memkredit,a.saldoakhir,DATE_FORMAT(a.tgbuka,'%d-%m-%Y') as tgbuka,b.sminimum,b.bunga1,b.bunga2,b.bunga3,b.bunga4,b.saldo1,b.saldo2,b.saldo3,b.adm,b.hbunga,b.spajak,b.sbunga,b.sadm,b.gssl,c.nama FROM $tabel_tabungan a JOIN $tabel_produkt b ON a.produk=b.kdproduk JOIN $tabel_nasabah c ON a.nonas=c.nonas WHERE a.kdaktif<2 AND a.saldoakhir>0 AND kode_akhir=0 ORDER BY norek");
$total=$result->num($hasil);if($total<1)$result->msg_error('Data Tidak Ada...!');
$text="INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
$text1="INSERT INTO $userid(id,norek,memdebet,memkredit) VALUES";
$i=1;$mbunga=0;$jumadm=0;$jumbersih=0;$branch=$kcabang;$xuser='';
$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
while($row = $result->row($hasil)){
	$branch=$row['branch'];$nonas=$row['nonas'];$sufix=$row['sufix'];$norek=$row['norek'];$produk=$row['produk'];$sminim=$row['sminimum'];$sakhir=$row['saldoakhir'];$nama=$row['nama'];$bunga1=$row['bunga1'];$bunga2=$row['bunga2'];$bunga3=$row['bunga3'];$bunga4=$row['bunga4'];$saldo1=$row['saldo1'];$saldo2=$row['saldo2'];$saldo3=$row['saldo3'];$adm=$row['adm'];$mbunga=0;$spajak=$row['branch'].$row['spajak'].'360';$sbunga=$row['branch'].$row['sbunga'].'360';$sadm=$row['branch'].$row['sadm'].'360';$noreks=$row['branch'].$row['gssl'].'360';$spajakx=$row['spajak'];$sbungax=$row['sbunga'];$sadmx=$row['sadm'];$nonass=$row['gssl'];$hbunga=$row['hbunga'];$tgbuka=$row['tgbuka'];
	$file='json/sandi.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	$huruf = array($spajakx,$sbungax,$sadmx,$nonass);$y=0;
	while($y<4){
		$deb1=$huruf[$y];
		for ($i=0; $i<count($jfo); $i++){
			if($deb1==$jfo[$i]['nonas']){
				$namas[$y]=$jfo[$i]['nama'];
			}
		}$y++;
	}
	$mtgl=date('d',strtotime($tgbuka));
	$mbln=date('m',strtotime($tgbuka));
	$mthn=date('Y',strtotime($tgbuka));
	$hari=intval($tgl);
	$harix=intval($mtgl);
	if($bln.$thn==$mbln.$mthn){
		$hari=intval($hari-$harix);
	}
	if($sakhir<=$adm){
		$adm=$sakhir;
	}
	if($hbunga!=0){
		if($sakhir>$sminim AND $sakhir<$saldo1){
			$mbunga=intval(($sakhir*$bunga1)/100);$mbunga=intval(($mbunga/365)*$hari);
		}elseif($sakhir>=$saldo1 AND $sakhir<$saldo2){
			$mbunga=intval(($sakhir*$bunga2)/100);$mbunga=intval(($mbunga/365)*$hari);
		}elseif($sakhir>=$saldo2 AND $sakhir<$saldo3){
			$mbunga=intval(($sakhir*$bunga3)/100);$mbunga=intval(($mbunga/365)*$hari);
		}else{
			$mbunga=intval(($sakhir*$bunga4)/100);$mbunga=intval(($mbunga/365)*$hari);
		}
		if($mbunga>0){
			$desc="BUNGA TABUNGAN ".$nama.' '.$norek;
			$text .="('".$branch."','".$nonas."','".$sufix."','".$norek."','".$nama."','".$noreks."',NULL,'".$mbunga."',456,47,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
			$desc="BIAYA BUNGA TABUNGAN ".$nama.' '.$norek;
			$text .="('".$branch."','".$sbungax."',360,'".$sbunga."','".$namas[1]."','".$sbunga."',NULL,'".$mbunga."',356,47,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
		}
	}
	if($adm>0){
		$desc="ADM TABUNGAN ".$nama.' '.$norek;
		$text .="('".$branch."','".$nonas."','".$sufix."','".$norek."','".$nama."','".$noreks."',NULL,'".$adm."',357,47,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
		$desc="PENDAPATAN ADM TABUNGAN ".$nama.' '.$norek;
		$text .="('".$branch."','".$sadmx."',360,'".$sadm."','".$namas[2]."','".$sadm."','".$norek."','".$ada."',457,47,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
	if($mbunga+$adm>0){
		$text1 .="('','".$norek."','".$adm."','".$mbunga."'),";
	}
	$percent = intval($i/$total * 100)." %";echo '<script language="javascript">document.getElementById("progress").innerHTML="<div style=\"width:'.$percent.';background-color:#ddd;\">&nbsp;</div>";document.getElementById("information").innerHTML="'.$i.' row(s) processed.";</script>';echo str_repeat(' ',1024*64);flush();sleep(0.001);$i++;
}
$text =substr_replace($text,';',-1);
$text1=substr_replace($text1,';',-1);
$text .=$text1;
$text .="UPDATE $tabel_tabungan a JOIN $userid b ON a.norek=b.norek SET a.memdebet=a.memdebet+b.memdebet,a.memkredit=a.memkredit+b.memkredit,a.saldoakhir=(a.saldoawal+a.mutkredit+a.memkredit)-(a.mutdebet+a.memdebet),a.kode_akhir=1,id_posting='$userid',tgl_posting=now()";
$result->multi_x($text);
$result->close();
echo '<script language="javascript">document.getElementById("information").innerHTML="Process completed"</script>';
$catat="Proses Bunga Tabungan Bulan ".$tabel;
include 'around.php';
?>
<div id="progress" style="width:500px;border:1px solid #ccc;"></div>
<div id="information" style="width:500px;"></div>