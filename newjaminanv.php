<?php include 'h_tetap.php';?>
<script>
$(document).ready(function () {
	$("#kwitansi").submit(function() {
		var r = confirm("Anda Yakin Data Di Otorisasi..?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: "POST",
			url: "newjaminanvs.php",
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
			if(data=='Sukses'){
				goKembali();
			}
			$('#loading').hide();
				alert(data);
			}
		});
		return false;
	});
});
function goKembali() {
	var url='newjaminanv.php';
	$('#innertub').load(url);
}
</script>
<?php
$branch=$kcabang;$hasil=$result->query_x1("SELECT a.id,a.kdskep,b.norek,b.kdskep as newskep,c.nama FROM agunan a JOIN $tabel_kredit b ON a.id=b.id JOIN $tabel_nasabah c ON b.nonas=c.nonas WHERE b.branch='$branch' AND a.kode=0 ORDER BY a.id,b.norek");$no=1;?>
<form name="kwitansi" id="kwitansi" method="post" action="">
<table class="table" width="100%">
	<thead>
	<tr><th colspan="11"><?php echo 'DAFTAR PERUBAHAN JAMINAN';?></th></tr>
	<tr>
		<th>NO</th>
		<th>NOREK</th>
		<th>NAMA</th>
		<th>JAMINAN LAMA</th>
		<th>JAMINAN BARU</th>
		<th>AKSI</th>
	</tr>
	</thead>
	<tbody><?php
		if($result->num($hasil)!=0){
		while ($row = $result->row($hasil)) { 
			if($no%2==0)
				$clsname="even";
			else
				$clsname="odd";
			?>
			<tr class="<?php if(isset($clsname)) echo $clsname;?>">
				<td><?php echo $no; ?></td>
				<td><?php echo $row['norek']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php $xkdskep=ket_jaminan($row['kdskep']);echo $xkdskep;?></td>
				<td><?php $xkdskep=ket_jaminan($row['newskep']);echo $xkdskep;?></td>
				<td align="center"><input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>" ></td>
			</tr><?php 
			$no++;
		}?>
		<tr>
			<td colspan="6" align="right"><input type="submit" value="Otorisasi" id="submit" class="icon-save"/></td>
		</tr><?php 
		}else{?>
		<tr>
			<td colspan="6" align="center">Data Perubahan Jaminan Tidak Ada</td>
		</tr><?php 
		}?>
	</tbody>
</table>
</form>