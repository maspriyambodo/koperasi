<?php 
$branch=$kcabang;
$tgl1=$result->c_d($_GET['tgl1']);
$pilih=$result->c_d($_GET['p']);
$xt=date_angka(date_sql($tgl1));
$tabel="nabasa.tran".$xt;
$rekening=$branch.'101101360';
$t=$tgl1;
include '../saldokasbesar.php';
if($ada==TRUE){
	$hasil=$result->query_lap("SELECT branch,nonas,sufix,norek,norekgl,nokredit,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,produk,jumlah,nama FROM $tabel WHERE tanggal='$tgl1' AND substr(kdtran,1,1)<=2 AND jtransaksi!=88 AND kdbranch='$branch' ORDER BY produk,norek"); 
}else{
	$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.norekgl,a.nokredit,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.produk,SUM(IF(substr(a.kdtran,1,1)='1',a.jumlah,0)) AS debetm,SUM(IF(substr(a.kdtran,1,1)='2',a.jumlah,0)) AS kreditm,b.nama,a.oper FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.tanggal='$tgl1' AND substr(a.kdtran,1,1)<=2 AND a.jtransaksi!=88 AND a.kdbranch='$branch' GROUP BY a.produk,a.norekgl,a.oper ORDER BY a.produk,a.norekgl,a.oper"); 
}
?>