<?php include 'auth.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
		<title>Pembukaan Deposito</title>
		<script type="text/javascript" src="jQuery/formatinput.js"></script>
		<script type="text/javascript" src="jQuery/combobox.js"></script>
		<script type="text/javascript" src="js/caricadangan.js"></script>
		<script type="text/javascript" src="js/global.js"></script>
		<script TYPE="text/javascript">
			$(document).ready(function(){
				$('#cadn').submit(function(){
					$.ajax({
						type : "POST",
						url : "deposito_cadn_print.php",
						data	: $(this).serialize(),
						beforeSend: function(){
							$('#loading').show();
						},
						success: function(data){
							alert(data);
							$('#loading').hide();
						}
					});
					jQuery(function ($) {$("#tanggal_buka").mask("99-99-9999");});
					return false;
				});
		</script>
	</head>

	<body>
		<?php
		include 'function.php';
		include "koneksi.php";
		$tgl=date_sql($tanggal);
		// $result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.nomor_bilyet,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,b.nama_rekening,a.tanggal_jatuh_tempo,b.nominal,b.jangka_waktu FROM deposits_cadangan a JOIN deposits b WHERE a.nomor_bilyet=b.nomor_bilyet AND a.tanggal_jatuh_tempo='$tgl' AND a.flag_bayar=0");
		$result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.nomor_bilyet,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,b.nama_rekening,a.tanggal_jatuh_tempo,b.nominal,b.jangka_waktu FROM deposits_cadangan a JOIN deposits b WHERE a.nomor_bilyet=b.nomor_bilyet AND a.tanggal_jatuh_tempo>='$tgl' AND a.flag_bayar=0 ORDER BY a.tanggal_jatuh_tempo");

		include 'pesanerr.php';

		if(mysqli_num_rows($result)!=0){ 
			$row = $result->fetch_array(MYSQLI_BOTH);
			$nomor_nasabah=$row['nomor_nasabah'];
			$nomor_bilyet=$row['nomor_bilyet'];
			$bunga_bulanan=$row['bunga_bulanan'];
			$pajak_bulanan=$row['pajak_bulanan'];
			$bunga_bersih=$row['bunga_bersih'];
			$nama_rekening=$row['nama_rekening'];
			$tanggal_jatuh_tempo=$row['tanggal_jatuh_tempo'];
			$nominal=$row['nominal'];
			$jangka_waktu=$row['jangka_waktu'];
			if($rsow['nomor_nasabah']=''){
				$xp='Nomor nasabah belum di otorisasi';include 'pesan.php';
			}
		}else{
			$xp='Tidak ada Cadangan Deposito Jatuh Tempo Hari ini';include 'pesan.php';
		}
		?>
		<form id="cadn" name="cadn" method="POST" action="deposito_cadn_print.php" target="_blank">
			<table width="100%" class="table">
				<thead>
					</tr>
					<th colspan="9" class="ui-state-highlight">DAFTAR CADANGAN DEPOSITO</th>
					<tr>
						<th>NO</th>
						<th>NAMA</th>
						<th>NOMOR NASABAH</th>
						<th>NOMOR BILYET</th>
						<th>TANGGAL JTT.</th>
						<th>NOMINAL</th>
						<th>BUNGA GROSS</th>
						<th>PAJAK</th>
						<th>BUNGA NET</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<?php
						$no=1;
						while ($row=mysqli_fetch_array($result))
						{ ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $row['nama_rekening']; ?></td>
								<td align="center"><?php echo $row['nomor_nasabah']; ?></td>
								<td align="center"><?php echo $row['nomor_bilyet']; ?></td>
								<td align="center"><?php echo date_format(date_create($row['tanggal_jatuh_tempo']),'d-m-Y'); ?></td>
								<td align="right"><?php echo formatrp($row['nominal']); ?></td>
								<td align="right"><?php echo formatrp($row['bunga_bulanan']); ?></td>
								<td align="right"><?php echo formatrp($row['pajak_bulanan']); ?></td>
								<td align="right"><?php echo formatrp($row['bunga_bersih']); ?></td>
							</tr>
						<?php $no++; }
						?>
					</tr>
				</tbody>
			</table>
			<!-- Hidden Values -->
			<input name="status_rekening" type="hidden" class="form-control" id="status_rekening" value="<?php echo $status_rekening; ?>"/>
			
			<div id="divPageHasil"></div>
			<div class="ui-widget-content" align="center">
				<input type="submit" value="CETAK" id="submit" class="icon-print"/>
			</div>
		</form>
	</body>
</html>