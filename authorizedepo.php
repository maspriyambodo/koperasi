<?php
include 'h_tetap.php';
include 'function/ftanggal.php';
$id=$result->c_d($_POST['id']);
$hasil=$result->query_lap("SELECT id,branch,produk,nomor_nasabah,sufix,nomor_bilyet,seri_bilyet,nama_rekening,tanggal_buka,jangka_waktu,nominal,counter_rate,min_pajak,pajak,kena_pajak,jenis_bunga,rekening_internal,sandi_deposito FROM deposito.deposits WHERE id='$id' LIMIT 1");$row=$result->row($hasil);
$sufix=$row['sufix'];
$no_bilyet=$row['nomor_bilyet'];
$seri_bilyet=$row['seri_bilyet'];
$nonas=$row['nomor_nasabah'];
$nama=$row['nama_rekening'];
$branch=$row['branch'];
$nominal=$row['nominal'];
$jangka_waktu=$row['jangka_waktu'];
$tgl_buka= $row['tanggal_buka'];
$suku_bunga=$row['counter_rate'];
$metode_hitung=$row['jenis_bunga'];
$kena_pajak=$row['kena_pajak'];
$min_pajak=$row['min_pajak'];
$pajak=$row['pajak'];
$produk=$row['produk'];
$spokokx=substr($row['sandi_deposito'],4,6);
$spokok=$row['sandi_deposito'];
$gssl_cairx=substr($row['rekening_internal'],4,6);
$gssl_cair=$row['rekening_internal'];
$file='json/sandi.json';
$xuser=$userid;
$json_file = file_get_contents($file);
$jfo = json_decode($json_file,TRUE);
$huruf=array($spokokx,$gssl_cairx);
$y=0;
while($y<2){
	$deb1=$huruf[$y];
	for($i=0; $i<count($jfo); $i++){
		if($deb1==$jfo[$i]['nonas']){
			$namas[$y]=$jfo[$i]['nama'];
		}
	}
	$y++;
}
$notran=$result->no_transaksi(0);$noreferensi=substr($notran,0,5);
$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";

$text1 = "INSERT INTO deposito.deposits_cadangan(branch,sufix,nomor_bilyet,seri_bilyet,nomor_nasabah,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga,id_deposito,tgl_otorisasi,user_otorisasi) VALUES";

$desc="DEPOSITO BARU NAMA ".$nama.' - '.$no_bilyet.'-'.$seri_bilyet;
$text .="('".$branch."','".$gssl_cairx."',360,'".$gssl_cair."','".$namas[1]."','".$gssl_cair."','".$id."','".$nominal."',356,66,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";

$text .="('".$branch."','".$spokokx."',360,'".$spokok."','".$namas[0]."','".$spokok."','".$id."','".$nominal."',456,66,'".$notran."','".$desc."','".$produk."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',60,'".$noreferensi."'),";
$result->dropTable($userid);
$result->tem_tabel($userid,'deposito.tem_cadn');
include 'deposito_hitung.php';
$hasil=$result->query_x1("SELECT tanggal,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga FROM $userid ORDER BY bunga_ke");
$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;
while($row=$result->row($hasil)){
	$jumlah1=$jumlah1+$row['bunga_bulanan'];
	$jumlah2=$jumlah2+$row['pajak_bulanan'];
	$jumlah3=$jumlah3+$row['bunga_bersih'];
	$jumlah4=$jumlah4+$row['jumlah_hari'];
	$tgl_akhir=$row['tanggal'];
	$text1 .="('".$branch."','".$sufix."','".$no_bilyet."','".$seri_bilyet."','".$nonas."','".$row['tanggal']."','".$row['bunga_bulanan']."','".$row['pajak_bulanan']."','".$row['bunga_bersih']."','".$row['jumlah_hari']."','".$row['bunga_ke']."','".$row['bulan_bunga']."','".$id."',now(),'".$userid."'),";
}
$text =substr_replace($text,';',-1);
$text .=substr_replace($text1,';',-1);
//$text .=$text1;
$text .="UPDATE deposito.deposits SET status_rekening=1,tanggal_jatuh_tempo='$tgl_akhir',bunga_harian='$bunga_hari',pajak_bulan='$pajak_bulan',total_bunga='$jumlah1',total_pajak='$jumlah2',net_bunga='$jumlah3',jumlah_hari='$jumlah4',otorisator_id='$userid',otorisasi_at=now() WHERE id='$id' LIMIT 1";
$result->multi_y($text);
echo 'Sukses Di Otorisasi Deposit';
$result->close();$catat="Otorisasi Pembukaan Deposito ".$id;
include 'around.php';
?>