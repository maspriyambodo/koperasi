<?php
include 'koneksi.php'; include 'function.php'; include 'ftanggal.php';
$tanggal_buka=$_GET['tanggal_buka'];
$nominal=clean(keangka($_GET['nominal']));
$jangka_waktu=intval(clean($_GET['jangka_waktu']));
$bunga=clean($_GET['bunga']);
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
	$xp='Anda belum mengisi Data dengan Lengkap / Jangka Waktu maksimum 24 Bulan';include 'pesan.php';
}else{
	$cadangan=intval((($nominal * $bunga) / 100) / $pembagi);
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
?>
<!-- Post Data -->
<table width="100%" class="table">
<thead>
<tr>
	<th colspan="6" class="ui-state-highlight">SCHEDULE BUNGA DEPOSITO</th>
</tr>
<tr>
	<th>NO</th>
	<th>TGL JATUH TEMPO</th>
	<th>BUNGA</th>
	<th>PAJAK</th>
	<th>BUNGA BERSIH</th>
</tr>
</thead>
<tbody>
		<?php
		$kete='Jadwal Pencairan Bunga Deposito';
		$no=1;$x=1;$mtgtran=$tanggal_buka;
		$tahun = date('Y',strtotime($mtgtran));
		$bulan = date('m',strtotime($mtgtran));
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
	 		$dy=date('d',strtotime($mtgtran));
			$mt=date('m',strtotime($mtgtran));
			$yr=date('Y',strtotime($mtgtran));
			$date=new DateTime();
			$date->setDate($yr,$mt,$dy);
			addMonths($date,$x);
			$mtgtran=$date->format('Y-m-d');
			$hari=date('w',strtotime($mtgtran));
			if($hari==0){ // minggu
				$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));
			}/*elseif($hari==6){ // sabtu
				$mtgtran=date('Y-m-d',strtotime($mtgtran."next Monday"));
			}*/
			?>
			<tr>
				<td><?php echo $no;?></td>
				<td><?php echo $mtgtran;?></td>
				<td><?php echo formatrp($bunga_bulanan);?></td>
				<td><?php echo formatrp($pajak_bulanan);?></td>
				<td><?php echo formatrp($bunga_bersih);?></td>
			</tr>
			<?php $no++;
		}
		?>
</tbody>
</table>
<td></td>