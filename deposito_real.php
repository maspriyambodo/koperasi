<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
	function AuthMethod(id) {
		var dataString='id='+id;
		var r = confirm("Anda yakin data di otorisasi...?");
		if (r == false) {
			return false;
		}	
		$.ajax({
			type: "POST",
			url : 'authorizedepo.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				alert(data);
				$('#innertub').load('deposito_real.php');
				$('#loading').hide();
			}
		});
	};
</script>
<?php
echo '
<table id="tableData" class="table-line">
	<thead>
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
	<tbody>';
		$hasil=$result->res("SELECT a.id,a.nomor_nasabah,a.tanggal_buka,a.counter_rate,a.jangka_waktu,a.nominal,b.nama FROM deposito.deposits a JOIN $tabel_nasabah b ON a.nomor_nasabah=b.nonas WHERE a.status_rekening=0");
		if($result->num($hasil)>0){
			$no=1;
			while ($row=$result->row($hasil)){
				echo '<tr>
				<td>'.$no.'</td>
				<td>'.$row['nama'].'</td>
				<td>'.$row['nomor_nasabah'].'</td>
				<td>'.$row['tanggal_buka'].'</td>
				<td>'.$row['counter_rate']." % ".'</td>
				<td>'.$row['jangka_waktu']." bulan".'</td>
				<td>'.formatRupiah($row['nominal']).'</td>
				<td align="center">
					<a class="icon-ok" onClick="AuthMethod('.$row['id'].')" title="Otorisasi">Otorisasi</a>
				</td>
				</tr>';
				$no++; 
			}
		}else{
			echo '
			<tr><td align="center" colspan="8" style="color: #ff0000">Data Deposito Otorisasi tidak ditemukan!</td></tr>';
		}
		echo '
	</tbody>
</table>';
?>