<?php 
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$tabel=$tabel_transaksi.$bln.substr('00'.$thn,-2);
$rekening=$branch.'101101360';
include '../saldokas_bln.php';
if($branch=0111){
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT norek,norekgl,2 AS nokredit,notransaksi,keterangan,tanggal,oper,otor,jumlah FROM $tabel WHERE substr(kdtran,1,1)=1 AND jtransaksi!=88 ORDER BY tanggal,norekgl");
	$result->query_x1("INSERT INTO $userid SELECT norek,norekgl,1 AS nokredit,notransaksi,keterangan,tanggal,oper,otor,jumlah FROM $tabel WHERE substr(kdtran,1,1)=2 AND jtransaksi!=88 ORDER BY tanggal,norekgl");	
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT norek,norekgl,2 AS nokredit,notransaksi,keterangan,tanggal,oper,otor,jumlah FROM $tabel WHERE substr(kdtran,1,1)=1 AND jtransaksi!=88 AND kdbranch='$branch' ORDER BY tanggal,norekgl");
	$result->query_x1("INSERT INTO $userid SELECT norek,norekgl,1 AS nokredit,notransaksi,keterangan,tanggal,oper,otor,jumlah FROM $tabel WHERE substr(kdtran,1,1)=2 AND jtransaksi!=88 AND kdbranch='$branch' ORDER BY tanggal,norekgl");	
}
if($ada==TRUE){	
	$hasil=$result->query_lap("SELECT norek,norekgl,nokredit,notransaksi,keterangan,tanggal,oper,otor,jumlah FROM $userid ORDER BY nokredit,tanggal,norekgl"); 
}else{
	$hasil=$result->query_lap("SELECT a.norek,a.norekgl,a.nokredit,a.tanggal,SUM(a.jumlah) AS jumlah,b.nama FROM $userid a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl GROUP BY a.nokredit,a.tanggal,a.norekgl ORDER BY a.nokredit,a.tanggal,a.norekgl");
}
?>