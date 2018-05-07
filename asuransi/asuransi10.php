<?php
$branch=$result->c_d($_GET['branch']);
$produk=$result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$tabel=$tabel_nominatif.$bln.$thn;
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.saldoa,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND saldoa>0 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.saldoa,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 a.produk='$produk' AND saldoa>0 ORDER BY a.produk,a.norek");
	}
}else{
	if($produk==9){
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.saldoa,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND a.branch='$branch' and a.kdpremi!=9 and a.jumpremi!=0 AND saldoa>0 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.saldoa,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND a.branch='$branch' AND a.kdpremi!=9 AND a.jumpremi!=0 AND a.produk='$produk' AND saldoa>0 ORDER BY a.produk,a.norek");
	}
}
$hasil=$result->query_lap("SELECT branch,nama_asuransi,kdpremi,nopremi,premi,sum(nomi) as nomi,sum(saldoa) as saldoa,sum(jumpremi) as jumpremi,suku,jangka,umur,produk,nmproduk,count(*) as org FROM $userid GROUP BY produk,kdpremi,premi,jangka,umur ORDER BY produk,kdpremi,premi,jangka,umur");
?>