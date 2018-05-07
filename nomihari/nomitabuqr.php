<?php
$branch=$result->c_d($_GET['branch']);
$produk =$result->c_d($_GET['produk']);
$pilih=$result->c_d($_GET['p']);
if($branch=='0111'){
	$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.produk,sum(a.saldoawal) as saldoawal,sum(a.mutdebet) as mutdebet,sum(a.mutkredit) as mutkredit,sum(a.memdebet) as memdebet,sum(a.memkredit) as memkredit,sum(a.saldoakhir) as saldoakhir,sum(a.saldoakhir-a.saldoblokir) as efektif,count(*) as org,b.nmproduk FROM $tabel_tabungan a JOIN produkt b ON a.produk=b.kdproduk WHERE a.saldoawal!=0 or a.mutdebet!=0 or a.mutkredit!=0 or a.memdebet!=0 or a.memkredit!=0 or a.saldoakhir!=0 GROUP BY a.produk ORDER BY a.produk");
}else{
	$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.produk,sum(a.saldoawal) as saldoawal,sum(a.mutdebet) as mutdebet,sum(a.mutkredit) as mutkredit,sum(a.memdebet) as memdebet,sum(a.memkredit) as memkredit,sum(a.saldoakhir) as saldoakhir,sum(a.saldoakhir-a.saldoblokir) as efektif,count(*) as org,b.nmproduk FROM $tabel_tabungan a JOIN produkt b ON a.produk=b.kdproduk WHERE a.saldoawal!=0 or a.mutdebet!=0 or a.mutkredit!=0 or a.memdebet!=0 or a.memkredit!=0 or a.saldoakhir!=0 AND a.branch='$branch' GROUP BY a.produk ORDER BY a.produk");	
}
?>