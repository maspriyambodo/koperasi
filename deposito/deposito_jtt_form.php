<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<?php include 'auth.php';include 'function.php'; ?>
	<script type="text/javascript" src="jQuery/combobox.js"></script>
	<script type="text/javascript" src="js/newnasabah.js"></script>
	<script TYPE="text/javascript">
		$(document).ready(function(){
			function AuthMethod(id) {
				var dataString='id='+id;
				$.ajax({
					type: "GET",
					url: 'authorizedepo.php',
					data	: dataString,
					beforeSend: function () {
						$('#loading').show();
					},
					success: function(data){
						$('#divPageDone').html(data);
						$('#loading').hide();
					}
				});
			}
			$('#masuk').submit(function(){
				$.ajax({
					type : "POST",
					url : "createdepo.php",
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
		});
	</script>
	</head>
	<body>
		<?php
			include 'koneksi.php';
			include 'fpdf/fpdf.php';
			$tgl=date_sql($tanggal);
			$result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.tanggal_buka,a.bunga,a.jangka_waktu,a.nominal,a.flag_buka,b.nama FROM deposits a JOIN nasabah b ON a.nomor_nasabah=b.nonas WHERE flag_cetak=1 AND a.tanggal_jatuh_tempo='$tgl' ORDER BY a.tanggal_buka");
			include 'pesanerr.php';
		?>
		<form id="masuk" name="masuk" method="POST" action="deposito_jtt_print.php" target="_blank">
			<table width="100%" class="table">
				<thead>
					<tr>
						<th colspan="7" class="ui-state-highlight"><?php echo 'DAFTAR DEPOSITO JATUH TEMPO'; ?></th>
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
									<td><?php echo $row['nama']; ?></td>
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
