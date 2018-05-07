<?php include 'auth.php';include 'function.php'; ?>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type="text/javascript" src="js/newnasabah.js"></script>
<script TYPE="text/javascript">
	$(document).ready(function(){
		$('#otorisasi').submit(function(){
			$.ajax({
				type : "POST",
				url : "postreservedepo.php",
				data	: $(this).serialize(),
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data){
					alert(data);
					$('#innertub').load('deposito_post_form.php');
					$('#loading').hide();
				}
			});
			return false;
		});
	});
	function AuthMethod(id) {
		var dataString='id='+id;
		$.ajax({
			type: "POST",
			url: 'postreservedepo.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				$('#innertub').load('deposito_post_form.php');
				$('#loading').hide();

			}
		});
	};
</script>
<?php
	$dueDate=date_sql($tanggal);
	include 'koneksi.php';
	$result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.nomor_bilyet,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,b.nama FROM deposits_cadangan a JOIN nasabah b ON a.nomor_nasabah=b.nonas WHERE a.flag_bayar=0 AND a.tanggal_jatuh_tempo='$dueDate'");

	include 'pesanerr.php';
?>
<form id="otorisasi" name="otorisasi" method="POST" action="">
	<table width="100%" class="table">
		<thead>
			<th colspan="8" class="ui-state-highlight">DAFTAR CADANGAN BUNGA JATUH TEMPO</th>
			<tr>
				<th>NO</th>
				<th>NAMA</th>
				<th>NOMOR NASABAH</th>
				<th>NOMOR BILYET</th>
				<th>TANGGAL PENCADANGAN</th>
				<th>BUNGA</th>
				<th>PAJAK</th>
				<th>BERSIH</th>
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
							<td align="center"><?php echo $row['tanggal_jatuh_tempo']; ?></td>
							<td align="right"><?php echo formatrp($row['bunga_bulanan']); ?></td>
							<td align="right"><?php echo formatrp($row['pajak_bulanan']); ?></td>
							<td align="right"><?php echo formatrp($row['bunga_bersih']); ?></td>
						</tr>
					<?php $no++; }
					?>
				</tr>
		</tbody>
	</table>
	<div id="divPageDone"></div>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Posting Cadangan Bunga" id="submit" class="icon-save"/>
	</div>
</form>