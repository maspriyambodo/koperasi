<?php
include 'koneksi.php'; include 'function.php'; include 'ftanggal.php';

$no_nasabah=$_POST['no_nasabah'];$tanggal_buka=date_sql($_POST['tanggal_buka']);$produk=$_POST['produk'];$rekening_internal=$_POST['rekening_internal'];$status_rekening=$_POST['status_rekening'];$nama=$_POST['nama'];$rekening_bank=$_POST['rekening_bank'];$nama_rekening_bank=$_POST['nama_rekening_bank'];$transaksi_via=$_POST['transaksi_via'];$nominal=keangka(clean($_POST['nominal']));$jenis_bunga=$_POST['jenis_bunga'];$tipe_tanggal_jatuh_tempo=$_POST['tipe_tanggal_jatuh_tempo'];$mail=$_POST['mail'];$sales_id=$_POST['sales_id'];$nomor_bilyet=$_POST['nomor_bilyet'];$seri_bilyet=$_POST['seri_bilyet'];$jangka_waktu=$_POST['jangka_waktu'];$bunga=$_POST['bunga'];$counter_aro=$_POST['counter_aro'];$nama_bank=$_POST['nama_bank'];$kode_kliring_bank_trk=$_POST['kode_kliring_bank_trk'];

$x=1;$tanggal_jatuh_tempo=$_POST['tanggal_buka'];
for ($i=1; $i <= $jangka_waktu; $i++)
{
	$dy=date('d',strtotime($tanggal_jatuh_tempo));
	$mt=date('m',strtotime($tanggal_jatuh_tempo));
	$yr=date('Y',strtotime($tanggal_jatuh_tempo));
	$date=new DateTime();
	$date->setDate($yr,$mt,$dy);
	addMonths($date,$x);
	$tanggal_jatuh_tempo=$date->format('Y-m-d');
	$hari=date('w',strtotime($tanggal_jatuh_tempo));
	if($hari==0){ // minggu
		$tanggal_jatuh_tempo=date('Y-m-d',strtotime($tanggal_jatuh_tempo."+1 day"));
	}/*elseif($hari==6){ // sabtu
		$tanggal_jatuh_tempo=date('Y-m-d',strtotime($tanggal_jatuh_tempo."next Monday"));
	}*/
}

$query = $mysql->query("INSERT INTO deposits(nomor_nasabah,tanggal_buka,produk,rekening_internal,status_rekening,nama_rekening,rekening_bank,kode_kliring_bank_trk,nama_bank,nama_rekening_bank,transaksi_via,jenis_bunga,tipe_tanggal_jatuh_tempo,tanggal_jatuh_tempo,mail,sales_id,nomor_bilyet,seri_bilyet,nominal,jangka_waktu,bunga,counter_aro,created_at) VALUES('$no_nasabah','$tanggal_buka','$produk','$rekening_internal','$status_rekening', '$nama', '$rekening_bank','$kode_kliring_bank_trk','$nama_bank','$nama_rekening_bank','$transaksi_via','$jenis_bunga','$tipe_tanggal_jatuh_tempo','$tanggal_jatuh_tempo','$mail','$sales_id','$nomor_bilyet','$seri_bilyet','$nominal','$jangka_waktu','$bunga','$counter_aro',now())");
if($query){
	echo "Data Deposito Berhasil Ditambahkan, Nomor Nasabah : ".$no_nasabah;
}else{
	echo "Proses Simpan Data Tidak Berhasil ".mysqli_error($mysql);
}

?>