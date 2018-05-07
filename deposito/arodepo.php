<?php
include 'auth.php';
include 'koneksi.php';
include 'function.php';
include 'ftanggal.php';
include 'opentran.php';

/* 
PROSES ARO:
 - Update tanggal_buka,tanggal_buka_lama,tanggal_jatuh_tempo_lama,jangka_waktu_lama,bunga_lama,nominal_lama
 - Jika ada bunga belum terbayarkan (flag_bayar=0 pada deposits_cadangan), skip proses ARO deposito ybs
*/

$dueDate=date_sql($tanggal);
$result = $mysql->query("SELECT DISTINCT b.id,a.nomor_nasabah,a.nomor_bilyet,a.tanggal_jatuh_tempo,a.flag_bayar,b.tanggal_buka,b.jangka_waktu,b.bunga,b.nominal,b.bunga_via,b.rekening_bank,b.nama_rekening_bank,c.nama FROM deposits_cadangan a JOIN deposits b JOIN nasabah c WHERE a.flag_bayar=1 AND a.tanggal_jatuh_tempo='$dueDate' AND c.nonas=b.nomor_nasabah AND b.nomor_bilyet=a.nomor_bilyet");

// $result = $mysql->query("SELECT a.id,a.tanggal_buka,a.nomor_nasabah,a.nominal,a.bunga,a.jangka_waktu,a.nomor_bilyet,a.bunga_via,a.rekening_bank,a.nama_rekening_bank,a.tanggal_jatuh_tempo FROM deposits a JOIN deposits_cadangan b WHERE a.counter_aro=1 AND a.tanggal_jatuh_tempo='$dueDate' AND a.nomor_bilyet=b.nomor_bilyet AND b.flag_bayar=1");

while ($row = $result->fetch_array(MYSQLI_BOTH))
{
	$tanggal_buka=$dueDate;
	if($id=$row['id'])
	{
		$tanggal_buka_lama=$row['tanggal_buka'];
		$tanggal_jatuh_tempo_lama=$row['tanggal_jatuh_tempo'];
		$jangka_waktu_lama=$row['jangka_waktu'];
		$bunga_lama=$row['bunga'];
		$nominal_lama=$row['nominal'];

		$nomor_bilyet=$row['nomor_bilyet'];
		$nomor_nasabah=$row['nomor_nasabah'];
		$bunga=$row['bunga'];
		$bunga_via=$row['bunga_via'];
		$rekening_bank=$row['rekening_bank'];
		$nominal=$row['nominal'];
		$jangka_waktu=$row['jangka_waktu'];
		$nama_rekening_bank=$row['nama_rekening_bank'];

		if($jangka_waktu==1){
				$pembagi=12;
			}elseif ($jangka_waktu==3) {
				$pembagi=4;
			}elseif ($jangka_waktu==6) {
				$pembagi=2;
			}elseif ($jangka_waktu==12) {
				$pembagi=1;
			}elseif ($jangka_waktu==18) {
				$pembagi=0.67;
			}elseif ($jangka_waktu==24) {
				$pembagi=0.5;
			}else {
				$pembagi=0;
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
			if ($nominal>7500000) {
				$total_pajak=intval($cadangan * ($pajak / 100));
				$pajak_bulanan=intval($total_pajak / $jangka_waktu);
			}
			$bunga_bulanan =intval($cadangan / $jangka_waktu);
			$bunga_bersih = intval($bunga_bulanan - $pajak_bulanan);
		}

		// Tentukan Tanggal Jatuh Tempo tiap bulan, jika sabtu/minggu/libur maka Tanggal Jatuh tempo H+1
		$no=1;$x=1;$new_tanggal_jatuh_tempo=$tanggal_buka;
		for ($i=1; $i <= $jangka_waktu; $i++)
	 	{
	 		$dy=date('d',strtotime($new_tanggal_jatuh_tempo));
			$bl=date('m',strtotime($new_tanggal_jatuh_tempo));
			$th=date('Y',strtotime($new_tanggal_jatuh_tempo));
			$date=new DateTime();
			$date->setDate($th,$bl,$dy);
			addMonths($date,$x);
			$new_tanggal_jatuh_tempo=$date->format('Y-m-d');
			$hari=date('w',strtotime($new_tanggal_jatuh_tempo));
			if($hari==0){
				$new_tanggal_jatuh_tempo=date('Y-m-d',strtotime($new_tanggal_jatuh_tempo."+1 day"));
			}
			$bunga_ke=$i;
			$query = $mysql->query("INSERT INTO deposits_cadangan(nomor_bilyet,nomor_nasabah,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,bunga_ke,bunga_via,rekening_bank,flag_bayar,nama_rekening_bank,user_otorisasi,bussdate) VALUES('$nomor_bilyet','$nomor_nasabah','$new_tanggal_jatuh_tempo','$bunga_bulanan','$pajak_bulanan','$bunga_bersih','$bunga_ke','$bunga_via','$rekening_bank',0,'$nama_rekening_bank','$userid',now())");
		}
		echo $new_tanggal_jatuh_tempo;
		$query = $mysql->query("UPDATE deposits SET tanggal_buka='$tanggal_buka',tanggal_jatuh_tempo='$new_tanggal_jatuh_tempo',tanggal_buka_lama='$tanggal_buka_lama',tanggal_jatuh_tempo_lama='$tanggal_jatuh_tempo_lama',jangka_waktu_lama='$jangka_waktu_lama',bunga_lama='$bunga_lama',nominal_lama='$nominal_lama',updated_at=now() WHERE id='$id'");
	}
	
}
echo 'Proses ARO Deposito Sukses!';
?>