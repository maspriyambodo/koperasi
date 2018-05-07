<?php
include 'auth.php';
include 'koneksi.php';
include 'function.php';
include 'ftanggal.php';
include 'opentran.php';
// $id=$_POST['id'];
$dueDate=date_sql($tanggal);

// $result = $mysql->query("SELECT a.nomor_nasabah,a.nomor_bilyet,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.tanggal_jatuh_tempo,b.rekening_internal,b.nama_rekening,b.produk FROM deposits_cadangan a JOIN deposits b ON a.nomor_nasabah=b.nomor_nasabah WHERE a.tanggal_jatuh_tempo='$dueDate'");

$result = $mysql->query("SELECT DISTINCT a.nomor_bilyet,a.nomor_nasabah,a.rekening_internal,b.nama,a.nominal,a.produk,a.tanggal_jatuh_tempo FROM deposits a JOIN nasabah b JOIN deposits_cadangan c ON a.nomor_nasabah=b.nonas AND a.nomor_bilyet=a.nomor_bilyet WHERE a.counter_aro=0 AND a.tanggal_jatuh_tempo='$dueDate' AND c.flag_bayar=1 AND a.status_rekening=0");


$text="INSERT INTO $tabel(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch) VALUES";
$jumlahx=0;
while ($row = $result->fetch_array(MYSQLI_BOTH)) {
	$nomor_bilyet=$row['nomor_bilyet'];

	$branch='';
	$nomor_nasabah=$row['nomor_nasabah'];
	$sufix=360;
	$rekening_internal=$row['rekening_internal'];
	$nama=$row['nama'];
	$norekgl='';
	$nokredit='';
	$nominal=$row['nominal'];
	$kdtran=448;
	$jtransaksi=70;
	$notransaksi=0;
	$notransaksi=no_tran($tabel,$notransaksi,$branch,$tanggal);
	$desc="PENCAIRAN DEPOSITO ".$nomor_bilyet." ATAS NAMA ".$nama;
	$produk=$row['produk'];
	$tanggal_jatuh_tempo=$row['tanggal_jatuh_tempo'];
	$referensi='';
	$noreferensi='';
	$operator=$userid;
	$otorisator=$userid;
	$bussdate='now()';
	$kdbranch='';
	
	// if($tanggal_jatuh_tempo=$dueDate){
	$text .= "('".$branch."','".$nomor_nasabah."','".$sufix."','".$rekening_internal."','".$nama."','".$norekgl."','".$nokredit."','".$nominal."','".$kdtran."','".$jtransaksi."','".$notransaksi."','".$desc."','".$produk."','".$tanggal_jatuh_tempo."','".$operator."','".$bussdate."','".$otorisator."','".$kdbranch."'),";
	// }
}	
$text=substr_replace($text,';',-1);
$q = $mysql->query("UPDATE deposits SET status_rekening=1, updated_at=now() WHERE tanggal_jatuh_tempo='$dueDate' AND counter_aro=0");
$result = $mysql->multi_query($text);

echo 'Proses Pencairan Deposito Berhasil!';

?>