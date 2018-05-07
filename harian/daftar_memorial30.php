<?php 
$tgl1=$result->c_d($_GET['tgl1']);
$tgl2=$result->c_d($_GET['tgl2']);
$branch=$result->c_d($_GET['branch']);
$xuser = $result->c_d($_GET['kkbayar']);
$pilih=$result->c_d($_GET['p']);
$cabang=$result->namacabang($branch);
$xt=date_angka(date_sql($tgl2));
$tabel=$tabel_transaksi.$xt;
if($ada==FALSE){
	if($branch=='0111'){
		if($xuser!=9){
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND substr(a.jtransaksi,1,1)=2 AND a.oper='$userid' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND substr(a.jtransaksi,1,1)=2  GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl");
		}
	}else{
		if($xuser!=9){
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND substr(a.jtransaksi,1,1)=2 AND a.oper='$userid' AND a.kdbranch='$branch' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.norek,a.norekgl,a.kdtran,a.jtransaksi,a.notransaksi,a.keterangan,a.tanggal,a.noreferensi,a.oper,a.produk,SUM(IF(substr(a.kdtran,1,1)='3',a.jumlah,0)) AS debetmemo,SUM(IF(substr(a.kdtran,1,1)='4',a.jumlah,0)) AS kreditmemo,b.nama FROM $tabel a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND substr(a.jtransaksi,1,1)=2 AND a.kdbranch='$branch' GROUP BY a.tanggal,a.norekgl ORDER BY a.tanggal,a.norekgl");
		}
	}
}else{
	if($branch=='0111'){
		if($xuser!=9){
			$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE tanggal>='$tgl1' AND tanggal<='$tgl2' AND substr(jtransaksi,1,1)=2 AND oper='$userid' ORDER BY tanggal,notransaksi,norekgl");
		}else{
			$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE tanggal>='$tgl1' AND tanggal<='$tgl2' AND substr(jtransaksi,1,1)=2 ORDER BY tanggal,notransaksi,norekgl");
		}
	}else{
		if($xuser!=9){
			$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE tanggal>='$tgl1' AND tanggal<='$tgl2' AND substr(jtransaksi,1,1)=2 AND oper='$userid' AND kdbranch='$branch' ORDER BY tanggal,notransaksi,norekgl");
		}else{
			$hasil=$result->query_lap("SELECT branch,norek,nama,norekgl,kdtran,jtransaksi,notransaksi,keterangan,tanggal,noreferensi,oper,otor,IF(substr(kdtran,1,1)='3',jumlah,0) AS debetmemo,IF(substr(kdtran,1,1)='4',jumlah,0) AS kreditmemo FROM $tabel WHERE tanggal>='$tgl1' AND tanggal<='$tgl2' AND substr(jtransaksi,1,1)=2 AND kdbranch='$branch' ORDER BY tanggal,notransaksi,norekgl");
		}
	}
}
?>