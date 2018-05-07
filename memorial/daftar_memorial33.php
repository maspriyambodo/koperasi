<?php 
$branch=$result->c_d($_GET['branch']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$tabel=$tabel_transaksi.$bln.substr($thn,-2);
if($ada==FALSE){
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)=1,a.jumlah,0)) AS debetkas,SUM(IF(substr(a.kdtran,1,1)=2,a.jumlah,0)) AS kreditkas,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.jtransaksi!=88 GROUP a.norekgl ORDER BY a.norekgl");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)=1,a.jumlah,0)) AS debetkas,SUM(IF(substr(a.kdtran,1,1)=2,a.jumlah,0)) AS kreditkas,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.kdbranch='$branch' AND a.jtransaksi!=88 GROUP BY a.norekgl ORDER BY a.norekgl");
	}
}else{
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)=1,jumlah,0) AS debetkas,IF(substr(kdtran,1,1)=2,jumlah,0) AS kreditkas,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE jtransaksi!=88 ORDER BY norekgl,notransaksi");
	}else{
		$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)=1,jumlah,0) AS debetkas,IF(substr(kdtran,1,1)=2,jumlah,0) AS kreditkas,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE kdbranch='$branch' AND jtransaksi!=88 ORDER BY norekgl,notransaksi");
	}
}
?>