<?php
include 'h_tetap.php';
$bln=$result->c_d($_POST['bln']);
$thn=$result->c_d($_POST['thn']);
$bulan=$bln.$thn;
$tabel="deposito.deposits_cadangan";
$tabeln="deposito.cadangan_".$bln.$thn;
$hasil=$result->res("SELECT flag_bayar FROM $tabeln WHERE flag_bayar=2 LIMIT 1");
if($hasil){
	if($result->row($hasil)>0){
		$result->msg_error('Proses Tidak Bisa Di Ulang, Sudah Bertransaksi!!!');
	}else{
		$result->dropTable($tabeln);
	}
}
$result->res("UPDATE deposito.deposits a JOIN $tabel b ON a.id=b.id_deposito JOIN $tabelTransaksi c ON b.id=c.nokredit SET b.flag_bayar=0,a.total_tarik=a.total_tarik-c.jumlah WHERE c.kdkredit=61 AND c.jtransaksi=69");
$result->res("DELETE FROM $tabelTransaksi WHERE jtransaksi=69");

$result->query_x1("CREATE TABLE $tabeln SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,a.id_deposito,a.flag_bayar,a.bulan_bunga,a.tgl_posting,a.user_posting,b.nama_rekening,b.tanggal_buka,b.produk,b.jangka_waktu,b.nominal,b.counter_rate,c.nmproduk,c.sbunga,c.scadangan,c.spajak,c.stitipan,d.nama AS nama_sales FROM $tabel a JOIN deposito.deposits b ON a.id_deposito=b.id JOIN deposito.prd_deposito c ON b.produk=c.kdproduk JOIN nabasa.sales d ON b.sales_id=d.idsales WHERE a.bulan_bunga='$bulan' AND flag_bayar=0 ORDER BY b.nomor_nasabah,a.bunga_ke");
$hasil=$result->query_cari("SELECT id,branch,nomor_nasabah,sufix,nomor_bilyet,seri_bilyet,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,id_deposito,nama_rekening,tanggal_buka,produk,jangka_waktu,nominal,counter_rate,nmproduk,sbunga,scadangan,spajak,nama_sales FROM $tabeln ORDER BY produk,nomor_nasabah");
$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
while($row=$result->row($hasil)){
	$sbungax=$row['sbunga'];
	$sbunga=$row['branch'].$row['sbunga'].'360';
	$scadanganx=$row['scadangan'];
	$scadangan=$row['branch'].$row['scadangan'].'360';
	$spajakx=$row['spajak'];
	$spajak=$row['branch'].$row['spajak'].'360';
	$sbpajakx='408307';
	$sbpajak=$row['branch'].'408307'.'360';
	$file='json/sandi.json';
	$xuser=$userid;
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	$huruf=array($sbungax,$scadanganx,$spajakx,$sbpajakx);
	$y=0;
	while($y<4){
		$deb1=$huruf[$y];
		for($i=0; $i<count($jfo); $i++){
			if($deb1==$jfo[$i]['nonas']){
				$namas[$y]=$jfo[$i]['nama'];
			}
		}
		$y++;
	}
	if($row['bunga_bulanan']>0){
		$desc="CADANGAN BUNGA DEPOSITO BULANAN ".$row['nama_rekening'].' - '.$row['nomor_bilyet'].'-'.$row['seri_bilyet'].' KE '.$row['bunga_ke'];
		$text .="('".$row['branch']."','".$sbungax."',360,'".$sbunga."','".$namas[0]."','".$sbunga."','".$row['id']."','".$row['bunga_bulanan']."',349,69,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',61,'".$noreferensi."'),";
		
		$text .="('".$row['branch']."','".$scadanganx."',360,'".$scadangan."','".$namas[1]."','".$scadangan."','".$row['id']."','".$row['bunga_bersih']."',451,69,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',63,'".$noreferensi."'),";
	}
	if($row['pajak_bulanan']>0){
		$desc="PAJAK DEPOSITO BULANAN ".$row['nama_rekening'].' - '.$row['nomor_bilyet'].'-'.$row['seri_bilyet'].' KE '.$row['bunga_ke'];
		$text .="('".$row['branch']."','".$sbpajakx."',360,'".$sbpajak."','".$namas[3]."','".$sbpajak."','".$row['id']."','".$row['pajak_bulanan']."',350,69,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',62,'".$noreferensi."'),";
		
		$text .="('".$row['branch']."','".$spajakx."',360,'".$spajak."','".$namas[2]."','".$spajak."','".$row['id']."','".$row['pajak_bulanan']."',450,69,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',62,'".$noreferensi."'),";
		
	}
}
$text =substr_replace($text,';',-1);
$text .="UPDATE deposito.deposits a JOIN $tabeln b ON a.id=b.id_deposito JOIN $tabelTransaksi c ON b.id=c.nokredit SET b.flag_bayar=1,a.total_tarik=a.total_tarik+c.jumlah WHERE c.kdkredit=61 AND c.jtransaksi=69;";

$text .="UPDATE $tabel a JOIN $tabelTransaksi b ON a.id=b.nokredit SET a.flag_bayar=1,a.tgl_posting=now(),a.user_posting='$userid',a.bussdate=now() WHERE b.kdkredit=61 AND b.jtransaksi=69";
$result->multi_x($text);
$result->msg_error('Sukses Posting Cadangan Bunga Bulan '.strtoupper(nmbulan($bln)).' '.$thn);
$result->close();
$catat="Posting Bunga Deposito ".$bulan." Sukses Tanggal ".date('Y-m-d H:i:s');
include 'around.php';
?>