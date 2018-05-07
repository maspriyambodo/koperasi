<?php 
$branch=$result->c_d($_GET['branch']);$xuser=$result->c_d($_GET['kkbayar']);$tgl1=$result->c_d($_GET['tgl1']);$tgl2=$result->c_d($_GET['tgl2']);$xt=date_angka(date_sql($tgl2));$tabel=$tabel_transaksi.$xt;
if($ada==FALSE){
	if($branch=='0111'){
		if($xuser!=9){
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT SUM(a.jumlah) AS jumlah,SUM(b.nomi) AS nomi,SUM(b.saldo) AS saldo,b.kdpremi,b.produk,b.jenis_klaim,c.nmproduk,count(*) AS orang FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.jtransaksi=60 AND a.kdkredit=10 AND a.oper='$xuser' GROUP BY b.produk,b.jenis_klaim,b.kdpremi ORDER BY b.produk,b.jenis_klaim,b.kdpremi");
		}else{
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT SUM(a.jumlah) AS jumlah,SUM(b.nomi) AS nomi,SUM(b.saldo) AS saldo,b.kdpremi,b.produk,b.jenis_klaim,c.nmproduk,count(*) AS orang FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.jtransaksi=60 AND a.kdkredit=10 GROUP BY b.produk,b.jenis_klaim,b.kdpremi ORDER BY b.produk,b.jenis_klaim,b.kdpremi");
		}
	}else{
		if($xuser!=9){
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT SUM(a.jumlah) AS jumlah,SUM(b.nomi) AS nomi,SUM(b.saldo) AS saldo,b.kdpremi,b.produk,b.jenis_klaim,c.nmproduk,count(*) AS orang FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.jtransaksi=60 AND a.kdkredit=10 AND a.kdbranch='$branch' AND a.oper='$xuser' GROUP BY b.produk,b.jenis_klaim,b.kdpremi ORDER BY b.produk,b.jenis_klaim,b.kdpremi");
		}else{
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT SUM(a.jumlah) AS jumlah,SUM(b.nomi) AS nomi,SUM(b.saldo) AS saldo,b.kdpremi,b.produk,b.jenis_klaim,c.nmproduk,count(*) AS orang FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.jtransaksi=60 AND a.kdkredit=10 AND a.kdbranch='$branch' GROUP BY b.produk,b.jenis_klaim,b.kdpremi ORDER BY b.produk,b.jenis_klaim,b.kdpremi");
		}
	}
	$hasil=$result->query_lap("SELECT a.jumlah,a.nomi,a.saldo,a.kdpremi,a.produk,a.nmproduk,a.jenis_klaim,b.nama_asuransi,a.orang FROM $userid a LEFT JOIN tbl_asuransi b ON a.kdpremi=b.kode_asuransi ORDER BY a.produk,a.kdpremi");
}else{
	if($branch=='0111'){
		if($xuser!=9){
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nama,a.norekgl,a.notransaksi,a.keterangan,a.tanggal,a.oper,a.otor,a.jumlah,b.tgtran,b.nomi,b.saldo,b.kdpremi,b.nopremi,b.produk,c.nmproduk,b.jenis_klaim,b.tgklaim FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.oper='$xuser' AND a.jtransaksi=60 AND a.kdkredit=10 ORDER BY b.produk,b.jenis_klaim,a.norekgl");
		}else{
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nama,a.norekgl,a.notransaksi,a.keterangan,a.tanggal,a.oper,a.otor,a.jumlah,b.tgtran,b.nomi,b.saldo,b.kdpremi,b.nopremi,b.produk,c.nmproduk,b.jenis_klaim,b.tgklaim FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.jtransaksi=60 AND a.kdkredit=10 ORDER BY b.produk,b.jenis_klaim,a.norekgl");
		}
	}else{
		if($xuser!=9){
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nama,a.norekgl,a.notransaksi,a.keterangan,a.tanggal,a.oper,a.otor,a.jumlah,b.tgtran,b.nomi,b.saldo,b.kdpremi,b.nopremi,b.produk,c.nmproduk,b.jenis_klaim,b.tgklaim FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.oper='$xuser' AND a.jtransaksi=60 AND a.kdkredit=10 AND kdbranch='$branch' ORDER BY b.produk,b.jenis_klaim,a.norekgl");
		}else{
			$hasil=$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.norek,a.nama,a.norekgl,a.notransaksi,a.keterangan,a.tanggal,a.oper,a.otor,a.jumlah,b.tgtran,b.nomi,b.saldo,b.kdpremi,b.nopremi,b.produk,c.nmproduk,b.jenis_klaim,b.tgklaim FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_produk c ON b.produk=c.kdproduk WHERE a.tanggal>='$tgl1' AND a.tanggal<='$tgl2' AND a.jtransaksi=60 AND a.kdkredit=10 AND kdbranch='$branch' ORDER BY b.produk,b.jenis_klaim,a.norekgl");
		}
	}
	$hasil=$result->query_lap("SELECT a.branch,a.norek,c.nama,a.norekgl,a.notransaksi,a.keterangan,a.tanggal,a.oper,a.otor,a.jumlah,a.tgtran,a.nomi,a.saldo,a.kdpremi,a.nopremi,a.produk,a.nmproduk,a.jenis_klaim,a.tgklaim,b.nama_asuransi FROM $userid a LEFT JOIN tbl_asuransi b ON a.kdpremi=b.kode_asuransi JOIN $tabel_klaim c ON a.norek=c.norek ORDER BY a.produk,a.notransaksi,a.norek");
}
?>