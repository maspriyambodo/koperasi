<?php 
$branch=$result->c_d($_GET['branch']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$produk=$result->c_d($_GET['produk']);
$pilih=$result->c_d($_GET['p']);
$tabel =$tabel_transaksi.$bln.substr($thn,2,2);
if($ada==TRUE){
	if($branch=='0111'){
		if($produk==9){
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY norek ORDER BY norek,produk"); 
		}else{
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND produk='$produk' AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY norek ORDER BY norek,produk"); 
		}
	}else{
		if($produk==9){
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND branch='$branch' AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY norek ORDER BY norek,produk"); 
		}else{
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND branch='$branch' AND produk='$produk' AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY norek ORDER BY norek,produk"); 
		}
	}
}else{
	if($branch=='0111'){
		if($produk==9){
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY produk ORDER BY produk"); 
		}else{
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND produk='$produk' AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY produk ORDER BY produk"); 
		}
	}else{
		if($produk==9){
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND branch='$branch' AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY produk ORDER BY produk"); 
		}else{
			$hasil=$result->query_lap("SELECT branch,norek,norekgl,nama,notransaksi,keterangan,tanggal,oper,otor,produk,SUM(IF(kdtran=456,jumlah,0)) AS bunga,SUM(IF(kdtran=357,jumlah,0)) AS adm,SUM(IF(kdtran=358,jumlah,0)) AS pajak FROM $tabel WHERE jtransaksi=47 AND branch='$branch' AND produk='$produk' AND (kdtran=456 OR kdtran=357 OR kdtran=358) GROUP BY produk ORDER BY produk"); 
		}
	}
}
?>