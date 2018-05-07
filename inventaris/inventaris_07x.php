<?php
$branch=$result->c_d($_GET['branch']);
$kode_inventaris=$result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);

$tabel  = $tabel_inventaris;
$tabelx = $tabel_inventaris.$bln.$thn;
$result->res("DROP TABLE IF EXISTS $userid");
if($ada==TRUE){
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.no_inventaris,a.golongan,a.nama_inventaris,a.jumlah_unit,a.harga_perolehan,a.nilai_perolehan,a.tgl_perolehan,a.masa_manfaat,a.nilai_residu,a.nilai_buku AS nilai_bukua,b.akumulasi_penyusutan,b.mutasi_debet,b.penyusutan_bulan,b.nilai_buku,a.kode_penyusutan,a.kode_inventaris FROM $tabel a JOIN $tabelx b ON a.id=b.id ORDER BY a.kode_inventaris,a.no_inventaris");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.branch,a.no_inventaris,a.golongan,a.nama_inventaris,a.jumlah_unit,SUM(a.harga_perolehan) AS harga_perolehan,SUM(a.nilai_perolehan) AS nilai_perolehan,a.tgl_perolehan,a.masa_manfaat,SUM(a.nilai_residu) AS nilai_residu,SUM(a.nilai_buku) AS nilai_bukua,SUM(b.akumulasi_penyusutan) AS akumulasi_penyusutan,SUM(b.mutasi_debet) AS mutasi_debet,SUM(b.penyusutan_bulan) AS penyusutan_bulan,SUM(b.nilai_buku) AS nilai_buku,a.kode_penyusutan,a.kode_inventaris FROM $tabel a JOIN $tabelx b ON a.id=b.id GROUP BY a.kode_inventaris,a.golongan,a.branch ORDER BY a.kode_inventaris,a.golongan,a.branch");
}
if($branch=='0111'){
	if($kode_inventaris==0){
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,golongan,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,nilai_bukua,akumulasi_penyusutan,penyusutan_bulan,mutasi_debet,nilai_buku,kode_penyusutan,kode_inventaris FROM $userid ORDER BY kode_inventaris,golongan,no_inventaris");
	}else{
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,golongan,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,nilai_bukua,akumulasi_penyusutan,penyusutan_bulan,mutasi_debet,nilai_buku,kode_penyusutan,kode_inventaris FROM $userid WHERE kode_inventaris='$kode_inventaris' ORDER BY kode_inventaris,golongan,no_inventaris");
	}
}else{
	if($kode_inventaris==0){
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,golongan,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,nilai_bukua,akumulasi_penyusutan,penyusutan_bulan,mutasi_debet,nilai_buku,kode_penyusutan,kode_inventaris FROM $userid WHERE branch='$branch' ORDER BY kode_inventaris,golongan,no_inventaris");
	}else{
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,golongan,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,nilai_bukua,akumulasi_penyusutan,penyusutan_bulan,mutasi_debet,nilai_buku,kode_penyusutan,kode_inventaris FROM $userid WHERE branch='$branch' AND kode_inventaris='$kode_inventaris' ORDER BY kode_inventaris,golongan,no_inventaris");
	}
}
?>