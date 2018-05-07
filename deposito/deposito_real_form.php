<?php include 'auth.php';include 'function.php'; ?>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type="text/javascript" src="js/newnasabah.js"></script>
<script TYPE="text/javascript">
		function AuthMethod(id) {
			var dataString='id='+id;
			$.ajax({
				type: "POST",
				url: 'authorizedepo.php',
				data: dataString,
				beforeSend: function () {
					$('#loading').show();
				},
				success: function(data){
					alert(data);
					$('#innertub').load('deposito_real_form.php');
					$('#loading').hide();

				}
			});
		};
</script>
<?php
	include 'koneksi.php';
	$result = $mysql->query("SELECT a.id,a.nomor_nasabah,a.tanggal_buka,a.bunga,a.jangka_waktu,a.nominal,a.flag_buka,b.nama FROM deposits a JOIN nasabah b ON a.nomor_nasabah=b.nonas WHERE flag_buka=0");
	include 'pesanerr.php';
?>
<form id="otorisasi" name="otorisasi" method="POST" action="">
<table width="100%" class="table">
	<thead>
		<tr>
			<th colspan="8" class="ui-state-highlight">DAFTAR DEPOSITO BELUM DIOTORISASI</th>
		</tr>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>NOMOR NASABAH</th>
			<th>TANGGAL BUKA</th>
			<th>BUNGA</th>
			<th>JANGKA WAKTU</th>
			<th>NOMINAL</th>
			<th>AKSI</th>
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
						<td><?php echo $row['nomor_nasabah']; ?></td>
						<td><?php echo $row['tanggal_buka']; ?></td>
						<td><?php echo $row['bunga']."%"; ?></td>
						<td><?php echo $row['jangka_waktu']." bulan"; ?></td>
						<td><?php echo formatrp($row['nominal']); ?></td>
						<td><a class="icon-ok" onClick="AuthMethod(<?php echo $row['id'];?>)" title="Otorisasi">&nbsp;</a></td>
					</tr>
				<?php $no++; }
				?>
			</tr>
	</tbody>
</table>
<div id="divPageDone"></div>
</form>