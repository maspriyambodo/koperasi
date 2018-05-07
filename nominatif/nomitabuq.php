<?php
$branch=$result->c_d($_GET['branch']);
$produk =$result->c_d($_GET['produk']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$tabel =$tabel_tabungan.$bln.$thn;
if($produk==9){
	$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.produk,a.saldoawal,a.mutdebet,a.mutkredit,a.memdebet,a.memkredit,a.saldoakhir,a.saldoakhir-a.saldoblokir as efektif,a.tgbuka,b.nama FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.saldoawal!=0 or a.mutdebet!=0 or a.mutkredit!=0 or a.memdebet!=0 or a.memkredit!=0 or a.saldoakhir!=0 AND a.branch='$branch' ORDER BY a.produk,a.norek");
}else{
	$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.produk,a.saldoawal,a.mutdebet,a.mutkredit,a.memdebet,a.memkredit,a.saldoakhir,a.saldoakhir-a.saldoblokir as efektif,a.tgbuka,b.nama FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.saldoawal!=0 or a.mutdebet!=0 or a.mutkredit!=0 or a.memdebet!=0 or a.memkredit!=0 or a.saldoakhir!=0 AND a.branch='$branch' AND a.produk LIKE '%$produk%' ORDER BY a.produk,a.norek");
}
if($branch=='0111'){
	if($produk==9){
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.produk,a.saldoawal,a.mutdebet,a.mutkredit,a.memdebet,a.memkredit,a.saldoakhir,a.saldoakhir-a.saldoblokir as efektif,a.tgbuka,b.nama FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.saldoawal!=0 or a.mutdebet!=0 or a.mutkredit!=0 or a.memdebet!=0 or a.memkredit!=0 or a.saldoakhir!=0 ORDER BY a.produk,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.nonas,a.branch,a.sufix,a.produk,a.saldoawal,a.mutdebet,a.mutkredit,a.memdebet,a.memkredit,a.saldoakhir,a.saldoakhir-a.saldoblokir as efektif,a.tgbuka,b.nama FROM $tabel a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.saldoawal!=0 or a.mutdebet!=0 or a.mutkredit!=0 or a.memdebet!=0 or a.memkredit!=0 or a.saldoakhir!=0 AND a.produk LIKE '%$produk%' ORDER BY a.produk,a.norek");
	}
}
?>