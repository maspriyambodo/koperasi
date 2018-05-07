<?php
include 'auth.php';
include 'koneksi.php';
include 'function.php';
include 'ftanggal.php';
$id=$_POST['id'];

$result = $mysql->query("SELECT tanggal_buka,nomor_nasabah,nominal,bunga,jangka_waktu,nomor_bilyet,bunga_via,rekening_bank,nama_rekening_bank FROM deposits WHERE id='$id'");
if($result){
	$row=$result->fetch_array(MYSQLI_ASSOC);
	$tanggal_buka=$row['tanggal_buka'];
	$nomor_nasabah=$row['nomor_nasabah'];
	$nominal=$row['nominal'];
	$bunga=$row['bunga'];
	$jangka_waktu=$row['jangka_waktu'];
	$nomor_bilyet=$row['nomor_bilyet'];
	$bunga_via=$row['bunga_via'];
	$rekening_bank=$row['rekening_bank'];
	$nama_rekening_bank=$row['nama_rekening_bank'];

	if($jangka_waktu==1){
		$pembagi=365;
	}elseif ($jangka_waktu==3) {
		$pembagi=365;
	}elseif ($jangka_waktu==6) {
		$pembagi=365;
	}elseif ($jangka_waktu==12) {
		$pembagi=365;
	}elseif ($jangka_waktu==18) {
		$pembagi=365;
	}elseif ($jangka_waktu==24) {
		$pembagi=365;
	}else {
		$pembagi=365;
	}
	$pajak=20;
	// Hitung Pencadangan Bunga
	if($pembagi==0) {
		$xp='Anda belum mengisi Data dengan Lengkap';include 'pesan.php';
	}else{
		$cadangan=intval(($nominal * ($bunga / 100)) / $pembagi);
		// Hitung Pajak
		$total_pajak=0;
		$pajak_bulanan=0;
		// Hitung Saldo Akhir
		// if ($nominal>7500000) {
		// 	$total_pajak=intval($cadangan * ($pajak / 100));
		// 	$pajak_bulanan=intval($total_pajak / $jangka_waktu);
		// }
		// $bunga_bulanan =intval($cadangan / $jangka_waktu);
		// $bunga_bersih = intval($bunga_bulanan - $pajak_bulanan);
	}

	// Tentukan Tanggal Jatuh Tempo tiap bulan, jika sabtu/minggu/libur maka Tanggal Jatuh tempo H+1
	$no=1;$x=1;$tanggal_jatuh_tempo=$tanggal_buka;
	$tahun = date('Y',strtotime($tanggal_jatuh_tempo));
	$bulan = date('m',strtotime($tanggal_jatuh_tempo));
	$bulan = intval($bulan);
	for ($i=1; $i <= $jangka_waktu; $i++)
 	{
 		$tgl_akhir_bulan = tglakhirbulan($tahun,$bulan);
			
		// pemberlakuan pajak
		// if ($nominal>7500000) {
		// 	$pajak_bulanan=intval(($cadangan * ($pajak / 100)) * $tgl_akhir_bulan);
		// }

 		$bunga_bulanan = $tgl_akhir_bulan * $cadangan;
		$bunga_bersih = intval($bunga_bulanan) - $pajak_bulanan;
		$bulan++;
		if($bulan == 13) {
			$bulan = 1;
			$tahun++;
		}
 		$dy=date('d',strtotime($tanggal_jatuh_tempo));
		$bl=date('m',strtotime($tanggal_jatuh_tempo));
		$th=date('Y',strtotime($tanggal_jatuh_tempo));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$x);
		$tanggal_jatuh_tempo=$date->format('Y-m-d');
		$hari=date('w',strtotime($tanggal_jatuh_tempo));
		if($hari==0){
			$tanggal_jatuh_tempo=date('Y-m-d',strtotime($tanggal_jatuh_tempo."+1 day"));
		}
		$bunga_ke=$i;
		$query = $mysql->query("INSERT INTO deposits_cadangan(nomor_bilyet,nomor_nasabah,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,bunga_ke,bunga_via,rekening_bank,flag_bayar,nama_rekening_bank,user_otorisasi,bussdate) VALUES('$nomor_bilyet','$nomor_nasabah','$tanggal_jatuh_tempo','$bunga_bulanan','$pajak_bulanan','$bunga_bersih','$bunga_ke','$bunga_via','$rekening_bank',0 ,'$nama_rekening_bank','$userid',now())");
	}
	
	$result = $mysql->query("UPDATE deposits SET flag_buka=1 WHERE  id='$id'");

	// echo 'nomor_bilyet:'.$nomor_bilyet.' nonas:'.$nomor_nasabah.' jtt:'.$tanggal_jatuh_tempo.' bungBulanan:'.$bunga_bulanan.' pjk:'.$pajak_bulanan.' bngBersih'.$bunga_bersih.' bungaKe:'.$bunga_ke.' bungVia:'.$bunga_via.' rekBank:'.$rekening_bank.' namaRekBank:'.$nama_rekening_bank.' userID:'.$userid;
	echo 'Otorisasi Deposito dengan Nomor Nasabah '.$nomor_nasabah.' Berhasil dilakukan';
}
?>