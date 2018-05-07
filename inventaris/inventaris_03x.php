<?php
$branch=$result->c_d($_GET['branch']);
$kode_inventaris = $result->c_d($_GET['kdsales']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$tabel =$tabel_inventaris.$bln.$thn;
if($ada==TRUE){
	if($branch=='0111'){
		if($kode_inventaris==0){
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.nama_inventaris,a.golongan,a.jumlah_unit,a.tgl_perolehan,a.nilai_perolehan,a.harga_perolehan,a.masa_manfaat,b.saldo_awal,b.mutasi_debet,b.mutasi_kredit,b.saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id ORDER BY a.no_inventaris");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.nama_inventaris,a.golongan,a.jumlah_unit,a.tgl_perolehan,a.nilai_perolehan,a.harga_perolehan,a.masa_manfaat,b.saldo_awal,b.mutasi_debet,b.mutasi_kredit,b.saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id WHERE a.kode_inventaris='$kode_inventaris' ORDER BY a.no_inventaris");
		}
	}else{
		if($kode_inventaris==0){
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.nama_inventaris,a.golongan,a.jumlah_unit,a.tgl_perolehan,a.nilai_perolehan,a.harga_perolehan,a.masa_manfaat,b.saldo_awal,b.mutasi_debet,b.mutasi_kredit,b.saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id WHERE a.branch='$branch' ORDER BY a.no_inventaris");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.nama_inventaris,a.golongan,a.jumlah_unit,a.tgl_perolehan,a.nilai_perolehan,a.harga_perolehan,a.masa_manfaat,b.saldo_awal,b.mutasi_debet,b.mutasi_kredit,b.saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id WHERE a.kode_inventaris='$kode_inventaris' AND a.branch='$branch' ORDER BY a.no_inventaris");
		}
	}
}else{
	if($branch=='0111'){
		if($kode_inventaris==0){
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.golongan,a.nama_inventaris,SUM(a.jumlah_unit) AS jumlah_unit,a.tgl_perolehan,SUM(a.nilai_perolehan) AS nilai_perolehan,SUM(a.harga_perolehan) AS harga_perolehan,a.masa_manfaat,SUM(b.saldo_awal) AS saldo_awal,SUM(b.mutasi_debet) AS mutasi_debet,SUM(b.mutasi_kredit) AS mutasi_kredit,SUM(b.saldo_akhir) AS saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id GROUP BY a.golongan,a.kode_inventaris ORDER BY a.golongan,a.kode_inventaris");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.golongan,a.nama_inventaris,SUM(a.jumlah_unit) AS jumlah_unit,a.tgl_perolehan,SUM(a.nilai_perolehan) AS nilai_perolehan,SUM(a.harga_perolehan) AS harga_perolehan,a.masa_manfaat,SUM(b.saldo_awal) AS saldo_awal,SUM(b.mutasi_debet) AS mutasi_debet,SUM(b.mutasi_kredit) AS mutasi_kredit,SUM(b.saldo_akhir) AS saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id WHERE a.kode_inventaris='$kode_inventaris' GROUP BY a.golongan,,a.kode_inventaris ORDER BY a.golongan,a.kode_inventaris");
		}
	}else{
		if($kode_inventaris==0){
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.golongan,a.nama_inventaris,SUM(a.jumlah_unit) AS jumlah_unit,a.tgl_perolehan,SUM(a.nilai_perolehan) AS nilai_perolehan,SUM(a.harga_perolehan) AS harga_perolehan,a.masa_manfaat,SUM(b.saldo_awal) AS saldo_awal,SUM(b.mutasi_debet) AS mutasi_debet,SUM(b.mutasi_kredit) AS mutasi_kredit,SUM(b.saldo_akhir) AS saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id WHERE a.branch='$branch' GROUP BY a.golongan,a.kode_inventaris ORDER BY a.golongan,a.kode_inventaris");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.no_inventaris,a.golongan,a.nama_inventaris,SUM(a.jumlah_unit) AS jumlah_unit,a.tgl_perolehan,SUM(a.nilai_perolehan) AS nilai_perolehan,SUM(a.harga_perolehan) AS harga_perolehan,a.masa_manfaat,SUM(b.saldo_awal) AS saldo_awal,SUM(b.mutasi_debet) AS mutasi_debet,SUM(b.mutasi_kredit) AS mutasi_kredit,SUM(b.saldo_akhir) AS saldo_akhir,a.kode_penyusutan,a.kode_inventaris FROM $tabel_inventaris a JOIN $tabel b ON a.id=b.id WHERE a.kode_inventaris='$kode_inventaris' AND a.branch='$branch' GROUP BY a.golongan,a.kode_inventaris ORDER BY a.golongan,a.kode_inventaris");
		}
	}
}
?>