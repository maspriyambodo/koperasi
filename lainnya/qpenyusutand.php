<?php 
$branch=$result->c_d($_GET['branch']);
if($ada==FALSE){
	if($branch=='0111'){
		$text="SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabelTransaksi a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.jtransaksi=45  GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl";
	}else{
		$text="SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabelTransaksi a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.jtransaksi=45 AND a.kdbranch='$branch' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl";
	}
}else{
	if($branch=='0111'){
		$text="SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabelTransaksi WHERE jtransaksi=45 ORDER BY tanggal,notransaksi,norekgl";
	}else{
		$text="SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabelTransaksi WHERE jtransaksi=45 AND kdbranch='$branch' ORDER BY tanggal,notransaksi,norekgl";
	}
}$hasil=$result->query_lap($text);
?>