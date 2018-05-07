<?php
include 'auth.php';
include 'function.php';
include 'koneksi.php';
// include 'opentran.php';
$tgl_bunga=date_sql($tanggal);
$branch=$kcabang;
$tabelx='cadangan_bunga'
$result=$mysql->query("SELECT a.nomor_nasabah,a.nomor_rekening,a.sufix,a.produk_deposito,a.rekening_cair,a.bunga_deposito.a.pajak_deposito,a.bunga_deposito+a.pajak_deposito as jumlah_bunga,b.nama,c.sandi_bunga,c.sandi_pajak FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN produk_deposito c ON a.produk_deposito=c.produk_deposito WHERE a.tgl_bunga='$tgl_bunga' ORDER BY a.nomor_rekening");
echo $result;
include 'pesanerr.php';
if(mysqli_num_rows($result)==0){ 
	$xp="Data Bunga Jatuh Tempo Tidak Ada...?  ";
	include 'pesan.php';
}
$text="INSERT INTO $tabel(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch) VALUES";
$jumlahx=0;
while ($row = $r->fetch_array(MYSQLI_BOTH)) {
	$nomor_nasabah=$row['nomor_nasabah'];
	$sufix=$row['sufix'];
	$nomor_rekening=$row['nomor_rekening'];
	$produk_deposito=$row['produk_deposito'];
	$rekening_cair=$row['rekening_cair'];
	$bunga_deposito=$row['bunga_deposito'];
	$pajak_deposito=$row['pajak_deposito'];
	$jumlah=$row['jumlah'];
	$nama=$row['nama'];
	$rekening_cairx=substr($row['rekening_cair'],4,6);
	$sandi_bungax=$row['sandi_bunga'];
	$sandi_pajakx=$row['sandi_pajak'];
	$rekening_cair=$branch.$row['rekening_cair'].'360';
	$sandi_bunga=$branch.$row['sandi_bunga'].'360';
	$sandi_pajak=$branch.$row['sandi_pajak'].'360';
	$file='json/sandi.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	$huruf = array($rekening_cairx,$sandi_bungax,$sandi_pajakx);
	$y=0;
	while ($y<3) {
		$deb1=$huruf[$y];
		for ($i=0; $i<count($jfo); $i++) {
			if($deb1==$jfo[$i]['nonas']){
				$namas[$y]=$jfo[$i]['nama'];
			}
		}
		$y++;
	} 
	$xuser=$userid;
	$notran=0;$notran=no_tran($tabel,$notran,$branch,$tanggal);
	if($jumlah>0){
		$desc="JUMLAH BUNGA DEPOSITO JATUH TEMPO ".$nomor_rekening;
		$text .="('".$branch."','".$rekening_cairx."',360,'".$rekening_cair."','".$nama[0]."','".$rekening_cair."','".$nomor_rekening."','".$jumlah."',349,70,'".$notran."','".$desc."',360','".$tgl_bunga."','".$userid."',now(),'".$xuser."','".$kcabang."'),";
		if($bunga_deposito>0){
			$desc="BUNGA DEPOSITO JATUH TEMPO ".$nomor_rekening;
			$text .="('".$branch."','".$sandi_bungax."',360,'".$sandi_bunga."','".$namas[1]."','".$sandi_bunga."','".$nomor_rekening."','".$bunga_deposito."',449,70,'".$notran."','".$desc."',360,'".$tgl_bunga."','".$userid."',now(),'".$xuser."','".$kcabang."'),";
		}
		if($pajak_deposito>0){
			$desc="PAJAK DEPOSITO JATUH TEMPO ".$nomor_rekening;
			$text .="('".$branch."','".$sandi_pajakx."',360,'".$sandi_pajak."','".$namas[2]."','".$sandi_pajak."','".$nomor_rekening."','".$pajak_deposito."',450,70,'".$notran."','".$desc."',360,'".$tgl_bunga."','".$userid."',now(),'".$xuser."','".$kcabang."'),";
		}
	}
}
$text=substr_replace($text,';',-1);
$text .="UPDATE $tabelx a JOIN $tabel b ON a.nomor_rekening=b.nokredit SET kode_cair=1 WHERE b.kdtran='70'";
$result = $mysql->multi_query($text);
include 'pesanerr.php';
echo ' Sukses'
$mysql->close();
$catat="Proses Bunga Deposito".$nomor_rekening;
include 'around.php';
 ?>