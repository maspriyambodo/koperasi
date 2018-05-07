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

		}else{
			
		}
	}else{
		if($produk=='9'){
			$text="SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,a.flag_bayar,b.nama_rekening,b.tanggal_buka,b.produk,b.jangka_waktu,b.nominal,b.counter_rate,c.nmproduk,d.nama AS namas FROM $tabel a JOIN deposito.deposits b ON a.id_deposito=b.id JOIN deposito.prd_deposito c ON b.produk=c.kdproduk JOIN nabasa.sales d ON b.sales_id=d.idsales WHERE a.bulan_bunga='$bulan' ORDER BY a.flag_bayar,b.produk,b.sales_id,b.nomor_nasabah,a.bunga_ke";
		}else{
			
		}
	}
}else{
	if($branch=='0111'){
		if($produk=='9'){

		}else{
			
		}
	}else{
		if($produk=='9'){
			$text="SELECT SUM(a.bunga_bulanan) AS bunga_bulanan,SUM(a.pajak_bulanan) AS pajak_bulanan,SUM(a.bunga_bersih) AS bunga_bersih,b.nama_rekening,b.produk,b.jangka_waktu,SUM(b.nominal) AS nominal,b.counter_rate,c.nmproduk,d.nama AS namas,a.flag_bayar FROM $tabel a JOIN deposito.deposits b ON a.id_deposito=b.id JOIN deposito.prd_deposito c ON b.produk=c.kdproduk JOIN nabasa.sales d ON b.sales_id=d.idsales WHERE a.bulan_bunga='$bulan' GROUP BY a.flag_bayar,b.produk,b.jangka_waktu,b.counter_rate,b.sales_id ORDER BY a.flag_bayar,b.produk,b.jangka_waktu,b.counter_rate,b.sales_id";
		}else{
			
		}
	}	
}$hasil=$result->query_lap($text);
?>