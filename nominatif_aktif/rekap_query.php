<?php
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$tabel=$tabel_nominatif.$bln.$thn;
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.kdbyr,a.kkbayar,a.deb1,a.nmbayar,a.produk,sum(a.nomi) as nomi,sum(a.saldo) as saldo,sum(a.mutdeb) as mutdeb,sum(a.mutkre) as mutkre,sum(a.memdeb) as memdeb,sum(a.memkre) as memkre,sum(a.saldoa) as saldoa,count(*) as counter,a.kdkop,a.kolek,c.nmkb,d.nmproduk FROM $tabel a JOIN wkb c ON a.kdbyr=c.kd JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) GROUP BY a.produk,a.kolek ORDER BY a.produk,a.kolek");
	}else{
		$hasil=$result->query_lap("SELECT a.kdbyr,a.kkbayar,a.deb1,a.nmbayar,a.produk,sum(a.nomi) as nomi,sum(a.saldo) as saldo,sum(a.mutdeb) as mutdeb,sum(a.mutkre) as mutkre,sum(a.memdeb) as memdeb,sum(a.memkre) as memkre,sum(a.saldoa) as saldoa,count(*) as counter,a.kdkop,a.kolek,c.nmkb,d.nmproduk FROM $tabel a JOIN wkb c ON a.kdbyr=c.kd JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.produk='$produk' GROUP BY a.produk,a.kolek ORDER BY a.produk,a.kolek");
	}
}else{
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.kdbyr,a.kkbayar,a.deb1,a.nmbayar,a.produk,sum(a.nomi) as nomi,sum(a.saldo) as saldo,sum(a.mutdeb) as mutdeb,sum(a.mutkre) as mutkre,sum(a.memdeb) as memdeb,sum(a.memkre) as memkre,sum(a.saldoa) as saldoa,count(*) as counter,a.kdkop,a.kolek,c.nmkb,d.nmproduk FROM $tabel a JOIN wkb c ON a.kdbyr=c.kd JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' GROUP BY a.produk,a.kolek ORDER BY a.produk,a.kolek");
	}else{
		$hasil=$result->query_lap("SELECT a.kdbyr,a.kkbayar,a.deb1,a.nmbayar,a.produk,sum(a.nomi) as nomi,sum(a.saldo) as saldo,sum(a.mutdeb) as mutdeb,sum(a.mutkre) as mutkre,sum(a.memdeb) as memdeb,sum(a.memkre) as memkre,sum(a.saldoa) as saldoa,count(*) as counter,a.kdkop,a.kolek,c.nmkb,d.nmproduk FROM $tabel a JOIN wkb c ON a.kdbyr=c.kd JOIN debit1 d ON a.produk=d.kdproduk WHERE (a.saldo!=0 or a.mutdeb!=0 or a.mutkre!=0 or a.memdeb!=0 or a.memkre!=0 or a.saldoa!=0) AND a.branch='$branch' AND a.produk='$produk' GROUP BY a.produk,a.kolek ORDER BY a.produk,a.kolek");
	}
}
?>