<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#tableData').paging({
		   limit: 20
		});
	});
	function showEdit(id) {
		var level = "<?php echo $level?>";
		if (Number(level) > 2) {
		   alert('Anda Tidak Berhak Untuk Otorisasi Pinjaman');
		   return false;
		}
		var tabel = $('#tabel').val();
		var dataString = 'id=' + id + '&tabel=' + tabel;
		$.ajax({
		   type: "GET",
		   url	: "mkreditvd.php",
		   data: dataString,
		   beforeSend: function() {
		       $('#loading').show();
		   },
		   success: function(data) {
		       $('#innertub').html(data);
		       $('#loading').hide();
		   }
		});
	}
</script>
<?php 
echo '<table id="tableData" class="table-line">
<thead><tr><th>No</th><th>Nonas</th><th>Norek</th><th>Nama</th><th>Nominal</th><th>Jangka</th><th>Suku Bunga</th><th>Aksi</th></tr></thead><tbody>';
$hasil=$result->query_x1("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.nomi,a.jangka,a.suku,b.nama FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.kdaktif=0 ORDER BY notran");$no=1; 
if($result->num($hasil)>0){ 
	while($row = $result->row($hasil)){
		echo '<tr>
		<td>'.$no.'</td>
		<td>'.$row[ 'branch']. '-'.$row[ 'nonas']. '-'.$row[ 'sufix'].'</td>
		<td>'.$row[ 'norek'].'</td>
		<td>'.$row[ 'nama'].'</td>
		<td align="right">'.number_format($row[ 'nomi']).'</td>
		<td align="center">'.$row[ 'jangka'].'</td>
		<td align="center">'.$row[ 'suku'].'</td>
		<td align="center"><a title="Detail Pinjaman Kredit" class="icon-more13" onClick="showEdit('.$row['id'].')">Detail</a></td>
		</tr>';
		$no++; 
	}
}else{
	echo '<tr><td align="center" colspan="8" style="color: #ff0000">Data Pinjaman tidak ditemukan!</td></tr>';
}
echo '</tbody></table>';