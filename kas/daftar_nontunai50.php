<?php 
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$tabel=$tabel_transaksi.$bln.substr($thn,-2);
$branch=$result->c_d($_GET['branch']);
if($ada==FALSE){
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='1',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='2',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE substr(a.kdtran,1,1)<'3' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='1',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='2',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE substr(a.kdtran,1,1)<'3' AND a.kdbranch='$branch' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl");
	}
}else{
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='1',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='2',jumlah,0) AS kreditmemo FROM $tabel WHERE substr(kdtran,1,1)<'3' ORDER BY tanggal,notransaksi");
	}else{
		$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='1',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='2',jumlah,0) AS kreditmemo FROM $tabel WHERE substr(kdtran,1,1)<'3' AND kdbranch='$branch' ORDER BY tanggal,notransaksi");
	}
}
?>