<?php 
include 'h_tetap.php';$nomi=$result->c_d(keangka($_GET['nomi']));$saldox=$result->c_d(keangka($_GET['saldox']));$gaji=$result->c_d(keangka($_GET['gaji']));$jangka=$result->c_d($_GET['jangka']);$angsuran_ke=$result->c_d($_GET['angsuran_ke']);$produk=$result->c_d($_GET['produk']);$suku=$result->c_d($_GET['suku']);$umur=age(date_sql($result->c_d($_GET['tglahir'])));
$hasil=$result->res("SELECT badm,bbtl,bprovisi,bpremi,bmeterai,mplafon,bumur,htagih FROM $tabel_produk WHERE kdproduk='$produk' LIMIT 1");
if($result->num($hasil)!=0){
	$row = $result->row($hasil);$kdkop=$row['htagih'];
	if($kdkop==1){
		if($jangka<2 || $jangka>24){
			$data['pesan'] = "Jangka Waktu Tidak Sesuai [ Minimum 2 Bln Dan Max=24 Bln ]";
			echo json_encode($data);exit();
		}
	}elseif($kdkop==2){
		if($jangka!=30 && $jangka!=60 && $jangka!=90 && $jangka!=120){
			$data['pesan'] = "Jangka Waktu Tidak Sesuai [ Minimum 30 Hari Dan Max=90 Hari ]";
			echo json_encode($data);exit();
		}
	}elseif($kdkop==3){
		if($jangka!=4 && $jangka!=8 && $jangka!=12 && $jangka!=16){
			$data['pesan'] = "Jangka Waktu Tidak Sesuai [ Minimum 4 Minggu Dan Max=16 Minggu ]";
			echo json_encode($data);exit();
		}
	}else{
		$data['pesan']="Skim Tagihan Belum Terdaftar ".$kdkop;echo json_encode($data);exit();
	}
	$mplafon=$row['mplafon'];
	$bumur=$row['bumur'];
	if($umur>$bumur){
		$data['pesan'] = 'Umur : '.$umur.'  Tahun, Maximum Umur : '.$bumur.' Tahun, Transaksi Batal';
		echo json_encode($data);
		exit();
	}
	$jangkax=$jangka-$angsuran_ke;$jangkax++;
	$mpokok = intval(ceil($saldox/$jangkax));
	if($kdkop==2){
		$mjangka=intval($jangka/30);$mbunga=intval(($nomi*$suku)/100+0.5);$mbunga=intval(($mbunga*$mjangka)/$jangka);
	}elseif($kdkop==3){
		$mjangka=intval($jangka/4);$mbunga=intval(($nomi*$suku)/100+0.5);$mbunga=intval(($mbunga*$mjangka)/$jangka);
	}else{
		$mbunga = intval(($nomi*$suku) / 100 + 0.5);
	}
	$madm=0;$total = intval($mpokok + $mbunga) / 1000;
	$madm = bulat_tag($total,$madm);
	$jumlah = intval($mpokok + $mbunga + $madm);
	$max=intval(($jumlah/$gaji)*100);
	if($max>$mplafon){
		$data['pesan'] = "Melebihi Plafond : ".$max.' % Transaksi Batal';
		echo json_encode($data);exit();
	}
	$data['mpokok'] = $mpokok;
	$data['mbunga'] = $mbunga;
	$data['madm'] = $madm;
	$data['umur'] = $umur;
	$data['jumlah'] = $jumlah;
	$data['pesan'] = 'Sukses';
	echo json_encode($data);
}else{
	$data['pesan'] = 'Kode Produk Belum Terdaftar!';
	echo json_encode($data);
}
?>