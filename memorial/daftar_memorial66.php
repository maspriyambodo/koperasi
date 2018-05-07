<?php 
$branch=$result->c_d($_GET['branch']);$bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$pilih=$result->c_d($_GET['p']);$result->tem_tabel($userid,'nabasa.tem_transaksi');$y=1;$bln_akhir=intval($bln);
if($branch=='0111'){
	for($i=$y;$i<=$bln_akhir;$i++){
		$blny= substr("00"."".$i,-2);
		$tabel =$tabel_transaksi.$blny.substr($thn,-2);
		$result->query_x1("INSERT INTO $userid SELECT branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,referensi,noreferensi,oper,otor,bussdate,kdbranch,kdkredit FROM $tabel ORDER BY notransaksi,tanggal");
	}
}else{
	for($i=$y;$i<=$bln_akhir;$i++){
		$blny= substr("00"."".$i,-2);
		$tabel =$tabel_transaksi.$blny.substr($thn,-2);
		$result->query_x1("INSERT INTO $userid SELECT '',branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,referensi,noreferensi,oper,otor,bussdate,kdbranch,kdkredit FROM $tabel WHERE kdbranch='$branch' ORDER BY notransaksi,tanggal");
	}	
}
if($ada==FALSE){
	$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)=1,a.jumlah,0)) AS debetkas,SUM(IF(substr(a.kdtran,1,1)=2,a.jumlah,0)) AS kreditkas,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $userid a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.jtransaksi!=88 GROUP BY a.norekgl ORDER BY a.norekgl");
}else{
	$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)=1,jumlah,0) AS debetkas,IF(substr(kdtran,1,1)=2,jumlah,0) AS kreditkas,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $userid WHERE jtransaksi!=88 ORDER BY norekgl,notransaksi");
}
?>