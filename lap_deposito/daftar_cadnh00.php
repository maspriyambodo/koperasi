<?php 
$tgl_buka=$result->c_d($_GET['tgl1']);
$tgl_akhir=$result->c_d($_GET['tgl2']);
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['produk']);
$bulan=date('m',strtotime($tgl_buka)).date('Y',strtotime($tgl_buka));
$tabel="deposito.cadangan_".$bulan;
if($ada==TRUE){
	if($branch=='0111'){
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.flag_bayar,a.nama_sales,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND (tanggal_jatuh_tempo<='$tgl_buka' OR tanggal_jatuh_tempo<='$tgl_akhir') ORDER BY produk,nomor_nasabah,bunga_ke");
		}else{
			$hasil=$result->query_lap("SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.flag_bayar,a.nama_sales,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND (tanggal_jatuh_tempo<='$tgl_buka' OR tanggal_jatuh_tempo<='$tgl_akhir') AND a.produk='$produk' ORDER BY produk,nomor_nasabah,bunga_ke");
		}
	}else{
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.flag_bayar,a.nama_sales,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND (tanggal_jatuh_tempo<='$tgl_buka' OR tanggal_jatuh_tempo<='$tgl_akhir') AND a.branch='$branch' ORDER BY produk,nomor_nasabah,bunga_ke");
		}else{
			$hasil=$result->query_lap("SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.flag_bayar,a.nama_sales,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND (tanggal_jatuh_tempo<='$tgl_buka' OR tanggal_jatuh_tempo<='$tgl_akhir') AND a.branch='$branch' AND a.produk='$produk' ORDER BY produk,nomor_nasabah,bunga_ke");
		}
	}
}else{
	if($branch=='0111'){
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT SUM(a.bunga_bulanan) AS bunga_bulanan,SUM(a.pajak_bulanan) AS pajak_bulanan,SUM(a.bunga_bersih) AS bunga_bersih,SUM(a.nominal) AS nominal,a.nama_rekening,a.produk,a.jangka_waktu,a.counter_rate,a.flag_bayar,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND tanggal_jatuh_tempo<='$tgl_buka' AND tanggal_jatuh_tempo<='$tgl_akhir' ORDER BY produk,nomor_nasabah,bunga_ke");
		}else{
			$hasil=$result->query_lap("SELECT SUM(a.bunga_bulanan) AS bunga_bulanan,SUM(a.pajak_bulanan) AS pajak_bulanan,SUM(a.bunga_bersih) AS bunga_bersih,SUM(a.nominal) AS nominal,a.nama_rekening,a.produk,a.jangka_waktu,a.counter_rate,a.flag_bayar,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND tanggal_jatuh_tempo<='$tgl_buka' AND tanggal_jatuh_tempo<='$tgl_akhir' AND a.produk='$produk' ORDER BY produk,nomor_nasabah,bunga_ke");
		}
	}else{
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT SUM(a.bunga_bulanan) AS bunga_bulanan,SUM(a.pajak_bulanan) AS pajak_bulanan,SUM(a.bunga_bersih) AS bunga_bersih,SUM(a.nominal) AS nominal,a.nama_rekening,a.produk,a.jangka_waktu,a.counter_rate,a.flag_bayar,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND tanggal_jatuh_tempo<='$tgl_buka' AND tanggal_jatuh_tempo<='$tgl_akhir' AND a.branch='$branch' ORDER BY produk,nomor_nasabah,bunga_ke");
		}else{
			$hasil=$result->query_lap("SELECT SUM(a.bunga_bulanan) AS bunga_bulanan,SUM(a.pajak_bulanan) AS pajak_bulanan,SUM(a.bunga_bersih) AS bunga_bersih,SUM(a.nominal) AS nominal,a.nama_rekening,a.produk,a.jangka_waktu,a.counter_rate,a.flag_bayar,b.nmproduk FROM $tabel a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk WHERE bulan_bunga='$bulan' AND tanggal_jatuh_tempo<='$tgl_buka' AND tanggal_jatuh_tempo<='$tgl_akhir' AND a.branch='$branch' AND a.produk='$produk' ORDER BY produk,nomor_nasabah,bunga_ke");
		}
	}	
}
?>