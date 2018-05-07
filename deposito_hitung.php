<?php 
if($metode_hitung==0){
	$jumlah_hari=0;
	$x=1;$mtgtran=$tgl_buka;$tgl_akhir=$tgl_buka;
	for($i=1;$i<=$jangka_waktu;$i++){
		$dy=date('d',strtotime($tgl_buka));
		$bl=date('m',strtotime($tgl_buka));
		$th=date('Y',strtotime($tgl_buka));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$i);
		$mtgtran=$date->format('Y-m-d');
		$hitung_hari=hitungHari($tgl_akhir,$mtgtran);
		$jumlah_hari=$jumlah_hari+$hitung_hari;
		$tgl_akhir=$mtgtran;
	}
	$jumlah_harix=$jumlah_hari;
	$bunga_tahun=intval(($nominal*$suku_bunga)/100);
	$bunga_hari=intval($bunga_tahun/365);
	$total_bunga=intval($bunga_hari*$jumlah_hari);
	$total_pajak=0;$pajak_bulan=0;
	if($kena_pajak==0){
		if($min_pajak<=$nominal){
			$total_pajak=intval(($total_bunga*$pajak)/100);
			$pajak_bulan=intval($total_pajak/$jangka_waktu);
		}
	}
	$jumlah_hari=0;$jumlah1=0;$jumlah2=0;$jumlah3=0;$jumlah4=0;
	$x=1;$mtgtran=$tgl_buka;$tgl_akhir=$tgl_buka;
	for($i=1;$i<=$jangka_waktu;$i++){
		$dy=date('d',strtotime($tgl_buka));
		$bl=date('m',strtotime($tgl_buka));
		$th=date('Y',strtotime($tgl_buka));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$i);
		$mtgtran=$date->format('Y-m-d');
		$hitung_hari=hitungHari($tgl_akhir,$mtgtran);
		$jumlah_hari=$hitung_hari;
		$tgl_akhir=$mtgtran;
		$bunga_bulan=$bunga_hari*$jumlah_hari;
		$net_bunga=$bunga_bulan;
		$bln=date('m',strtotime($tgl_akhir));
		$thn=date('Y',strtotime($tgl_akhir));
		$bulan=$bln.$thn;
		$result->query_x1("INSERT INTO $userid(tanggal,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,bulan_bunga)VALUES('$tgl_akhir','$bunga_bulan','$pajak_bulan','$net_bunga','$jumlah_hari','$i','$bulan')");
	}
}else{
	$pembagi=round(12/$jangka_waktu,2);
	$total_bunga =intval(($nominal * $suku_bunga)/100);
	$total_bunga =intval($total_bunga/$pembagi);
	$total_pajak=0;
	if($nominal>=$kena_pajak){
		$total_pajak=intval(($total_bunga*$pajak)/100);
	}
	$net_bunga=$total_bunga-$total_pajak;
}
?>