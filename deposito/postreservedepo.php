<?php
include 'auth.php';
include 'koneksi.php';
include 'function.php';
include 'ftanggal.php';
include 'opentran.php';
// $id=$_POST['id'];
$dueDate=date_sql($tanggal);

$result = $mysql->query("SELECT a.nomor_nasabah,a.nomor_bilyet,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.tanggal_jatuh_tempo,b.rekening_internal,b.nama_rekening,b.produk FROM deposits_cadangan a JOIN deposits b ON a.nomor_nasabah=b.nomor_nasabah WHERE a.tanggal_jatuh_tempo='$dueDate'");

$text="INSERT INTO $tabel(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch) VALUES";
$jumlahx=0;
while ($row = $result->fetch_array(MYSQLI_BOTH)) {
	$nomor_bilyet=$row['nomor_bilyet'];

	$branch='';
	$nomor_nasabah=$row['nomor_nasabah'];
	$sufix='';
	$rekening_internal=$row['rekening_internal'];
	$nama_rekening=$row['nama_rekening'];
	$norekgl='';
	$nokredit='';
	$bunga_bulanan=$row['bunga_bulanan'];
	$pajak_bulanan=$row['pajak_bulanan'];
	$bunga_bersih=$row['bunga_bersih'];
	$kdtran='';
	$jtransaksi=70;
	$notransaksi=0;
	$notransaksi=no_tran($tabel,$notransaksi,$branch,$tanggal);
	$keterangan='POSTING CADANGAN BUNGA - '.$nomor_bilyet;
	$produk=$row['produk'];
	$tanggal_jatuh_tempo=$row['tanggal_jatuh_tempo'];
	$referensi='';
	$noreferensi='';
	$operator=$userid;
	$otorisator=$userid;
	$bussdate='now()';
	$kdbranch='';
	
	if($bunga_bulanan>0){
		$desc="JUMLAH BUNGA DEPOSITO JATUH TEMPO ".$rekening_internal;
		$text .= "('".$branch."','".$nomor_nasabah."',360,'".$rekening_internal."','".$nama_rekening."','".$norekgl."','".$nokredit."','".$bunga_bulanan."',448,'".$jtransaksi."','".$notransaksi."','".$desc."','".$produk."','".$tanggal_jatuh_tempo."','".$operator."','".$bussdate."','".$otorisator."','".$kdbranch."'),";
		if($bunga_bersih>0){
			$desc="BUNGA DEPOSITO JATUH TEMPO ".$rekening_internal;
		$text .= "('".$branch."','".$nomor_nasabah."',360,'".$rekening_internal."','".$nama_rekening."','".$norekgl."','".$nokredit."','".$bunga_bersih."',449,'".$jtransaksi."','".$notransaksi."','".$desc."','".$produk."','".$tanggal_jatuh_tempo."','".$operator."','".$bussdate."','".$otorisator."','".$kdbranch."'),";
		}
		if($pajak_bulanan>0){
			$desc="PAJAK DEPOSITO JATUH TEMPO ".$rekening_internal;
		$text .= "('".$branch."','".$nomor_nasabah."',360,'".$rekening_internal."','".$nama_rekening."','".$norekgl."','".$nokredit."','".$pajak_bulanan."',450,'".$jtransaksi."','".$notransaksi."','".$desc."','".$produk."','".$tanggal_jatuh_tempo."','".$operator."','".$bussdate."','".$otorisator."','".$kdbranch."'),";

		}
	}
}	
$text=substr_replace($text,';',-1);
$q = $mysql->query("UPDATE deposits_cadangan SET flag_bayar=1 WHERE tanggal_jatuh_tempo='$dueDate'");
$result = $mysql->multi_query($text);

echo 'Posting Cadangan Deposito Sukses!';

?>