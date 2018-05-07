<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<?php include 'auth.php';include 'function.php'; ?>
	<script type="text/javascript" src="jQuery/combobox.js"></script>
	<script type="text/javascript" src="js/newnasabah.js"></script>
	<script TYPE="text/javascript">
		$(document).ready(function(){
			$('#nomi').submit(function(){
				$.ajax({
					type : "POST",
					url : "deposito_nomi_print.php",
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
			include 'koneksi.php';
			include 'fpdf/fpdf.php';
			// $result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.tanggal_buka,a.bunga,a.jangka_waktu,a.nominal,a.flag_buka,b.nama FROM deposits a JOIN nasabah b ON a.nomor_nasabah=b.nonas WHERE flag_cetak=1 ORDER BY a.tanggal_buka");
			$result = $mysql->query("SELECT id,nomor_nasabah,tanggal_buka,bunga,jangka_waktu,nominal,flag_buka,nama_rekening FROM deposits WHERE flag_cetak=1 ORDER BY tanggal_buka");
			include 'pesanerr.php';
		?>
		<form id="nomi" name="nomi" method="POST" action="deposito_nomi_print.php" target="_blank">
			<table width="100%" class="table">
				<thead>
					<tr>
						<th colspan="7" class="ui-state-highlight"><?php echo 'DAFTAR NOMINATIF DEPOSITO SAMPAI DENGAN '.$tanggal; ?></th>
					</tr>
					<tr>
						<th>NO</th>
						<th>NAMA</th>
						<th>NOMOR NASABAH</th>
						<th>TANGGAL PEMBUKAAN</th>
						<th>JANGKA WAKTU</th>
						<th>BUNGA</th>
						<th>NOMINAL</th>
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
									<!-- <td><?php echo $row['nama']; ?></td> -->
									<td><?php echo $row['nama_rekening']; ?></td>
									<td align="center"><?php echo $row['nomor_nasabah']; ?></td>
									<td align="center"><?php echo $row['tanggal_buka']; ?></td>
									<td align="center"><?php echo $row['jangka_waktu']." bulan"; ?></td>
									<td align="center"><?php echo $row['bunga']."%"; ?></td>
									<td align="right"><?php echo formatrp($row['nominal']); ?></td>
								</tr>
							<?php $no++; }
							?>
						</tr>
				</tbody>
			</table>
			<div id="divPageDone"></div>
			<div class="ui-widget-content" align="center">
				<input type="submit" value="CETAK" id="submit" class="icon-print"/>
			</div>
		</form>
	</body>
</html>
