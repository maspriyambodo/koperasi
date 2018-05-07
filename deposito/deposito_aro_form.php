<?php include 'auth.php';include 'function.php'; ?>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type="text/javascript" src="js/newnasabah.js"></script>
<script TYPE="text/javascript">
	$(document).ready(function(){
		$('#prosesaro').submit(function(){
			$.ajax({
				type : "POST",
				url : "arodepo.php",
				data	: $(this).serialize(),
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data){
					alert(data);
					$('#innertub').load('deposito_aro_form.php');
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
	$result = $mysql->query("SELECT DISTINCT b.id,a.nomor_nasabah,a.nomor_bilyet,a.tanggal_jatuh_tempo,a.flag_bayar,b.tanggal_buka,b.jangka_waktu,b.bunga,b.nominal,b.bunga_via,b.rekening_bank,b.nama_rekening_bank,b.tanggal_jatuh_tempo,c.nama FROM deposits_cadangan a JOIN deposits b JOIN nasabah c WHERE b.counter_aro=1 AND a.flag_bayar=1 AND b.tanggal_jatuh_tempo='$dueDate' AND c.nonas=b.nomor_nasabah AND b.nomor_bilyet=a.nomor_bilyet LIMIT 1");

	include 'pesanerr.php';
?>
<form id="prosesaro" name="prosesaro" method="POST" action="">
	<table width="100%" class="table">
		<thead>
			<th colspan="10" class="ui-state-highlight">DAFTAR DEPOSITO ARO JATUH TEMPO</th>
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
		<input type="submit" value="Proses ARO" id="submit" class="icon-ok"/>
	</div>
</form>