<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$('#tableData').paging({limit:20});
	});
	function showEdit(id) {
		var r = confirm("Anda yakin data di simpan ?");
		if (r == false) {
			return false;
		}
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url	: "newsavess.php?p=2",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				if(data=='Sukses'){
					goKembali();
				}
				$('#loading').hide();
				alert(data);
			},
		});
	}
	function goKembali() {
		var url ="newsavebuka.php";
		$('#innertub').load(url);
	}
</script>
<?php
$norek=$result->c_d($_POST['nonas']);$branch=$kcabang;$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.kdaktif,a.saldoawal,a.saldoakhir,a.produk,a.saldoblokir,b.nama,b.noktp FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.norek='$norek' AND a.branch='$branch' ORDER BY norek");$row=$result->row($hasil);$nama=$row['nama'];
?>
<table>
	<tr>
		<td width="25%">No Nasabah</td>
		<td>: <?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix'];?></td>
	</tr>
	<tr>
		<td>Nama</td>
		<td>: <?php echo $row['nama'];?></td>
	</tr>
	<tr>
		<td>No KTP</td>
		<td>: <?php echo $row['noktp'];?></td>
	</tr>
</table>
<?php
$hasil=$result->query_lap("SELECT id,branch,norek,sufix,nonas,tgawal,tgakhir,jumlah,keterangan,kdtran FROM blokir WHERE norek='$norek' AND kdtran!=0");$counter = 1;
?>
<table id="tableData" class="table-line">
	<thead >
	<tr><td colspan="9" align="center">DAFTAR BLOKIR TABUNGAN, NAMA : <?php echo $nama;?></td></tr>
	<tr>
		<th >NO</th>
		<th >BRANCH</th>
		<th >NONAS</th>
		<th >SUFIX</th>
		<th >TGL AWAL</th>
		<th >TGL AKHIR</th>
		<th >JUMLAH</th>
		<th >KETERANGAN</th>
		<th >AKSI</th>
	</tr>
	</thead>
	<tbody>
	<?php
	while($data = $result->row($hasil)){?> 
		<tr>
			<td><?php echo $counter;?></td>
			<td><?php echo $data['branch'];?></td>
			<td><?php echo $data['nonas'];?></td>
			<td><?php echo $data['sufix'];?></td>
			<td><?php echo $data['tgawal'];?></td>
			<td><?php echo $data['tgakhir'];?></td>
			<td><?php echo formatrp($data['jumlah']);?></td>
			<td><?php echo $data['keterangan'];?></td>
			<td align="right">
			<a class="icon-undo13" onClick="showEdit(<?php echo $data['id']; ?>)">Buka Blokir</a>
			</td>
		</tr>
		<?php
		$counter++;
	}?>
	</tbody>
</table>