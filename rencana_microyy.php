<?php 
include 'h_tetap.php';
$bln=$result->c_d($_POST['bln']);
$thn=$result->c_d($_POST['thn']);
$tabel = $tabel_tagihan.$bln.substr($thn,2,2).'m';
$bulan =$thn.$bln;
$hasil = $result->res("SELECT bulan FROM $tabel WHERE bulan='$bulan' AND kdtran!=111 LIMIT 1");
if($hasil){
	if($result->num($hasil)!=0)$result->msg_error('Proses Tagihan Tidak Bisa Di Ulang..?');
}
$hasil=$result->res("DROP TABLE IF EXISTS $tabel");
$hasil=$result->res("CREATE TEMPORARY TABLE $userid SELECT a.id,b.branch as branch,a.norek,a.sufix,a.nonas,a.nama,b.produk as produk,a.pokok,a.bunga,a.adm,a.jumlah,a.tgtagihan,a.kdtran,a.angsurke,a.kdaktif,a.oper,a.bussdate,a.bulan,b.kdkop as kdkop,a.tanggal,a.alasan_tt,a.solusi_tt,kd_tagih FROM $tabel_payment a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.bulan='$bulan' AND b.kdkop>1 AND b.saldoa>0 AND b.ketnas!=1 AND a.kd_tagih!=1 GROUP BY a.norek,a.angsurke ORDER BY a.norek,a.angsurke");
if($hasil){
	$hasil=$result->res("CREATE TABLE $tabel SELECT * FROM $userid WHERE jumlah>0");
	if($hasil){
		$result->msg_error("Proses Rencana Tagihan Micro Bulan : ".$bln.'-'.$thn." Sukses");
		$result->close();$catat="Proses Tagihan Kredit Micro".$tabel.' Oleh '.$userid;
		include 'around.php';}
	}else{
		$result->msg_error("Proses Rencana Tagihan Micro Gagal");
	}
?>