<?php 
$branch=$kcabang;
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$tabel='nabasa.tran'.$bln.substr('00'.$thn,-2);
$rekening=$branch.'101101360';
include '../saldokas_bln.php';
if($ada==TRUE){
	$hasil=$result->query_lap("SELECT id,branch,nonas,sufix,norek,norekgl,nokredit,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,produk,jumlah,nama FROM $tabel WHERE substr(kdtran,1,1)<=2 AND jtransaksi!=88 AND kdbranch='$branch' ORDER BY tanggal,produk,norekgl"); 
}else{
	$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.norekgl,a.nokredit,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.produk,SUM(IF(substr(a.kdtran,1,1)='1',a.jumlah,0)) AS debetm,SUM(IF(substr(a.kdtran,1,1)='2',a.jumlah,0)) AS kreditm,b.nama,a.oper FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE substr(a.kdtran,1,1)<=2 AND a.jtransaksi!=88 AND a.kdbranch='$branch' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl"); 
}
?>