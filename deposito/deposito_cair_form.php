<?php include 'auth.php';include 'function.php'; ?>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type="text/javascript" src="js/newnasabah.js"></script>
<script TYPE="text/javascript">
	$(document).ready(function(){
		$('#prosesaro').submit(function(){
			$.ajax({
				type : "POST",
				url : "cairdepo.php",
				data	: $(this).serialize(),
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data){
					alert(data);
					$('#innertub').load('deposito_cair_form.php');
					$('#loading').hide();
				}
			});
			return false;
		});
	});
</script>
<?php
	$dueDate=date_sql($tanggal);
	include 'koneksi.php';
	$result = $mysql->query("SELECT DISTINCT a.id,b.nama,a.nomor_nasabah,a.nomor_bilyet,a.tanggal_buka,a.tanggal_jatuh_tempo,a.jangka_waktu,a.bunga,a.nominal FROM deposits a JOIN nasabah b JOIN deposits_cadangan c ON a.nomor_nasabah=b.nonas AND a.nomor_bilyet=a.nomor_bilyet WHERE a.counter_aro=0 AND a.tanggal_jatuh_tempo='$dueDate' AND c.flag_bayar=1 AND a.status_rekening=0");

	include 'pesanerr.php';
?>
<form id="prosesaro" name="prosesaro" method="POST" action="">
	<table width="100%" class="table">
		<thead>
			<th colspan="10" class="ui-state-highlight">DAFTAR DEPOSITO JATUH TEMPO</th>
			<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>NOMOR NASABAH</th>
				<th>NOMOR BILYET</th>
				<th>TANGGAL BUKA</th>
				<th>TANGGAL JATUH TEMPO</th>
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
							<td align="center"><?php echo $no; ?></td>
							<td><?php echo $row['nama']; ?></td>
							<td align="center"><?php echo $row['nomor_nasabah']; ?></td>
							<td align="center"><?php echo $row['nomor_bilyet']; ?></td>
							<td align="center"><?php echo $row['tanggal_buka']; ?></td>
							<td align="center"><?php echo $row['tanggal_jatuh_tempo']; ?></td>
							<td align="center"><?php echo $row['jangka_waktu'] . " BULAN"; ?></td>
							<td align="center"><?php echo $row['bunga'] . " %"; ?></td>
							<td align="right"><?php echo formatrp($row['nominal']); ?></td>
						</tr>
					<?php $no++; }
					?>
				</tr>
		</tbody>
	</table>
	<div id="divPageDone"></div>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Pencairan Deposito" id="submit" class="icon-ok"/>
	</div>
</form>