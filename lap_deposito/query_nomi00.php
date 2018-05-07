<?php
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['produk']);
$bulan=$bln.$thn;
$tabel="deposito.deposits_cadangan";
if($ada==TRUE){
	if($branch=='0111'){
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.tanggal_buka,a.tanggal_jatuh_tempo,a.bunga_harian,a.net_bunga,a.total_tarik,(a.net_bunga-a.total_tarik) AS belum_bayar,jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 ORDER BY a.produk,a.tanggal_buka");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.tanggal_buka,a.tanggal_jatuh_tempo,a.bunga_harian,a.net_bunga,a.total_tarik,(a.net_bunga-a.total_tarik) AS belum_bayar,jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 AND a.produk='$produk' ORDER BY a.produk,a.tanggal_buka");			
		}
	}else{
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.tanggal_buka,a.tanggal_jatuh_tempo,a.bunga_harian,a.net_bunga,a.total_tarik,(a.net_bunga-a.total_tarik) AS belum_bayar,jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 AND a.branch='$branch' ORDER BY a.produk,a.tanggal_buka");
		}else{
			$hasil=$result->query_lap("SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.nama_rekening,a.tanggal_buka,a.produk,a.jangka_waktu,a.nominal,a.counter_rate,a.tanggal_buka,a.tanggal_jatuh_tempo,a.bunga_harian,a.net_bunga,a.total_tarik,(a.net_bunga-a.total_tarik) AS belum_bayar,jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 AND a.produk='$produk' AND a.branch='$branch' ORDER BY a.produk,a.tanggal_buka");
		}
	}
}else{
	if($branch=='0111'){
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT a.produk,a.jangka_waktu,SUM(a.nominal) AS nominal,a.counter_rate,SUM(a.net_bunga) AS net_bunga,SUM(a.total_tarik) AS total_tarik,SUM(a.net_bunga-a.total_tarik) AS belum_bayar,SUM(jumlah_hari) AS jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 GROUP BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id ORDER BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id");
		}else{
			$hasil=$result->query_lap("SELECT a.produk,a.jangka_waktu,SUM(a.nominal) AS nominal,a.counter_rate,SUM(a.net_bunga) AS net_bunga,SUM(a.total_tarik) AS total_tarik,SUM(a.net_bunga-a.total_tarik) AS belum_bayar,SUM(jumlah_hari) AS jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 AND a.produk='$produk' GROUP BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id ORDER BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id");			
		}
	}else{
		if($produk=='9'){
			$hasil=$result->query_lap("SELECT a.produk,a.jangka_waktu,SUM(a.nominal) AS nominal,a.counter_rate,SUM(a.net_bunga) AS net_bunga,SUM(a.total_tarik) AS total_tarik,SUM(a.net_bunga-a.total_tarik) AS belum_bayar,SUM(jumlah_hari) AS jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 AND a.branch='$branch' GROUP BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id ORDER BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id");
		}else{
			$hasil=$result->query_lap("SELECT a.produk,a.jangka_waktu,SUM(a.nominal) AS nominal,a.counter_rate,SUM(a.net_bunga) AS net_bunga,SUM(a.total_tarik) AS total_tarik,SUM(a.net_bunga-a.total_tarik) AS belum_bayar,SUM(jumlah_hari) AS jumlah_hari,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.status_rekening=1 AND a.branch='$branch' AND a.produk='$produk' GROUP BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id ORDER BY a.produk,a.jangka_waktu,a.counter_rate,a.sales_id");			
		}
	}	
}
?>