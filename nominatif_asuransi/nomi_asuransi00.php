<?php
$branch= $result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
if($ada==TRUE){
	if($branch=='0111'){
		if($produk==9){
			$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,c.kkbayar,c.nmbayar,c.nomi,c.jangka,c.suku,a.tgtran,c.produk,a.saldo_awal,a.mutasi_debet,a.mutasi_kredit,a.saldo_akhir,c.kolek,b.nama,d.nmproduk FROM $tabel_asuransi a JOIN nasabah b ON a.nonas=b.nonas JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) ORDER BY c.produk,c.kkbayar,a.norek");
		}else{
			$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,c.kkbayar,c.nmbayar,c.nomi,c.jangka,c.suku,a.tgtran,c.produk,a.saldo_awal,a.mutasi_debet,a.mutasi_kredit,a.saldo_akhir,c.kdkop,c.kolek,b.nama,d.nmproduk FROM $tabel_asuransi a JOIN nasabah b ON a.nonas=b.nonas JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) AND produk='$produk' ORDER BY c.produk,c.kkbayar,a.norek");
		}
	}else{
		if($produk==9){
			$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,c.kkbayar,c.nmbayar,c.nomi,c.jangka,c.suku,a.tgtran,c.produk,a.saldo_awal,a.mutasi_debet,a.mutasi_kredit,a.saldo_akhir,c.kolek,b.nama,d.nmproduk FROM $tabel_asuransi a JOIN nasabah b ON a.nonas=b.nonas JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) AND a.branch='$branch' ORDER BY c.produk,c.kkbayar,a.norek");
		}else{
			$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,c.kkbayar,c.nmbayar,c.nomi,c.jangka,c.suku,a.tgtran,c.produk,a.saldo_awal,a.mutasi_debet,a.mutasi_kredit,a.saldo_akhir,c.kolek,b.nama,d.nmproduk FROM $tabel_asuransi a JOIN nasabah b ON a.nonas=b.nonas JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) AND a.branch='$branch' AND produk='$produk' ORDER BY c.produk,c.kkbayar,a.norek");
		}
	}
}else{
	if($branch=='0111'){
		if($produk==9){
			$hasil=$result->query_lap("SELECT c.kkbayar,c.nmbayar,sum(c.nomi) as nomi,c.produk,sum(a.saldo_awal) as saldo_awal,sum(a.mutasi_debet) as mutasi_debet,sum(a.mutasi_kredit) as mutasi_kredit,sum(a.saldo_akhir) as saldo_akhir,d.nmproduk,count(*) as counter FROM $tabel_asuransi a JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) GROUP BY c.produk,c.kkbayar ORDER BY c.produk,c.kkbayar");
		}else{
			$hasil=$result->query_lap("SELECT c.kkbayar,c.nmbayar,sum(c.nomi) as nomi,c.produk,sum(a.saldo_awal) as saldo_awal,sum(a.mutasi_debet) as mutasi_debet,sum(a.mutasi_kredit) as mutasi_kredit,sum(a.saldo_akhir) as saldo_akhir,d.nmproduk,count(*) as counter FROM $tabel_asuransi a JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) AND produk='$produk' GROUP BY c.produk,c.kkbayar ORDER BY c.produk,c.kkbayar");
		}
	}else{
		if($produk==9){
			$hasil=$result->query_lap("SELECT c.kkbayar,c.nmbayar,sum(c.nomi) as nomi,c.produk,sum(a.saldo_awal) as saldo_awal,sum(a.mutasi_debet) as mutasi_debet,sum(a.mutasi_kredit) as mutasi_kredit,sum(a.saldo_akhir) as saldo_akhir,d.nmproduk,count(*) as counter FROM $tabel_asuransi a JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) AND a.branch='$branch' GROUP BY c.produk,c.kkbayar ORDER BY c.produk,c.kkbayar");
		}else{
			$hasil=$result->query_lap("SELECT c.kkbayar,c.nmbayar,sum(c.nomi) as nomi,,c.produk,sum(a.saldo_awal) as saldo_awal,sum(a.mutasi_debet) as mutasi_debet,sum(a.mutasi_kredit) as mutasi_kredit,sum(a.saldo_akhir) as saldo_akhir,d.nmproduk,count(*) as counter FROM $tabel_asuransi a JOIN $tabel_kredit c ON a.norek=c.norek JOIN debit1 d ON c.produk=d.kdproduk WHERE (a.saldo_awal!=0 or a.mutasi_debet!=0 or a.mutasi_kredit!=0 or a.saldo_akhir!=0) AND a.branch='$branch' AND produk='$produk' GROUP BY c.produk,c.kkbayar ORDER BY c.produk,c.kkbayar");
		}
	}
}
?>
