<?php 
$branch=$result->c_d($_GET['branch']);
$kode_inventaris=$result->c_d($_GET['kdsales']);
$result->res("DROP TABLE IF EXISTS $userid");
if($ada==TRUE){
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,no_inventaris,nama_inventaris,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,akumulasi_penyusutan,penyusutan_bulan,nilai_buku,kode_penyusutan,kode_inventaris,golongan FROM $tabel_inventaris ORDER BY golongan,kode_inventaris,no_inventaris");
}else{
	$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT branch,no_inventaris,nama_inventaris,jumlah_unit,SUM(harga_perolehan) AS harga_perolehan,SUM(nilai_perolehan) AS nilai_perolehan,tgl_perolehan,masa_manfaat,SUM(nilai_residu) AS nilai_residu,SUM(akumulasi_penyusutan) AS akumulasi_penyusutan,SUM(penyusutan_bulan) AS penyusutan_bulan,SUM(nilai_buku) AS nilai_buku,kode_penyusutan,kode_inventaris,golongan FROM $tabel_inventaris GROUP BY golongan,kode_inventaris,branch ORDER BY golongan,kode_inventaris,branch");
}
if($branch=='0111'){
	if($kode_inventaris==0){
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,akumulasi_penyusutan,penyusutan_bulan,nilai_buku,kode_penyusutan,kode_inventaris,golongan FROM $userid ORDER BY golongan,kode_inventaris,no_inventaris");
	}else{
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,akumulasi_penyusutan,penyusutan_bulan,nilai_buku,kode_penyusutan,kode_inventaris,golongan FROM $userid WHERE kode_inventaris='$kode_inventaris' ORDER BY golongan,kode_inventaris,no_inventaris");
	}
}else{
	if($kode_inventaris==0){
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,akumulasi_penyusutan,penyusutan_bulan,nilai_buku,kode_penyusutan,kode_inventaris,golongan FROM $userid WHERE branch='$branch' ORDER BY golongan,kode_inventaris,no_inventaris");
	}else{
		$hasil=$result->query_lap("SELECT branch,no_inventaris,nama_inventaris,jumlah_unit,harga_perolehan,nilai_perolehan,tgl_perolehan,masa_manfaat,nilai_residu,akumulasi_penyusutan,penyusutan_bulan,nilai_buku,kode_penyusutan,kode_inventaris,golongan FROM $userid WHERE branch='$branch' AND kode_inventaris='$kode_inventaris' ORDER BY golongan,kode_inventaris,no_inventaris");
	}
}
?>