<?php
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$tabel=$tabel_kredit.$bln.substr('00'.$thn,-2);
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND kdaktif=1 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND a.produk='$produk' AND kdaktif=1 ORDER BY a.produk,a.norek");
	}
}else{
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND a.branch='$branch' AND kdaktif=1 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.norek,a.nonas,a.kdpremi,a.nopremi,a.premi,a.nomi,a.umur,a.jumpremi,a.suku,a.jangka,a.produk,c.nmproduk,b.nama,d.nama_asuransi FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk JOIN tbl_asuransi d ON a.kdpremi=d.kode_asuransi WHERE a.kdpremi!=9 and a.jumpremi!=0 AND a.produk='$produk' AND a.branch='$branch' AND kdaktif=1 ORDER BY a.produk,a.norek");
	}
}
?>