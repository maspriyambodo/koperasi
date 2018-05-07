<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$pilih=$result->c_d($_GET['p']);$tabel=$tabel_transaksi.$bln.substr($thn,-2);$branch=$result->c_d($_GET['branch']);
if($ada==FALSE){
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.jtransaksi!=99 GROUP BY a.tanggal,a.noreferensi,a.norekgl ORDER BY a.tanggal,a.noreferensi");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.jtransaksi!=99 AND a.kdbranch='$branch' GROUP BY a.tanggal,a.noreferensi,a.norekgl ORDER BY a.tanggal,a.noreferensi");
	}
}else{
	if($branch=='0111'){
		$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE jtransaksi!=99 ORDER BY tanggal,noreferensi");
	}else{
		$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE jtransaksi!=99 AND kdbranch='$branch' ORDER BY tanggal,noreferensi");
	}
}
?>