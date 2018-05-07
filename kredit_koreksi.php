<?php include "h_tetap.php";?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	$(document).ready(function() {
		$('#tableData').paging({limit:20});
	});
	function showEdit(id) {
		var level="<?php echo $level?>";
		if(Number(level)<3){
			alert('Anda Tidak Berhak Untuk Koreksi Pinjaman Kredit');
			return false;
		}	
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url	: "kredit_koreksi01.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				$('#divPageHasil').html(data);
				$('#loading').hide();
			}
		});
	}
</script>
<?php
echo '
<div ID="divPageHasil">
<table id="tableData" class="table-line"><thead><tr><th>No</th><th>Nonas</th><th>Norek</th><th>Nama</th><th>Nominal</th><th>Jangka</th><th>Suku Bunga</th><th>Aksi</th></tr></thead><tbody>';$batas=date_sql($tanggal);$hasil=$result->query_x1("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.nomi,a.jangka,a.suku,b.nama FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.tgtran='$batas' AND a.kdaktif=2 ORDER BY notran");
if($result->num($hasil)>0){
	$no=1;
	while($row = $result->row($hasil)){
		echo '<tr>
		<td>'.$no.'</td>
		<td>'.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
		<td>'.$row['norek'].'</td>
		<td>'.$row['nama'].'</td>
		<td align="right">'.number_format($row['nomi']).'</td>
		<td align="center">'.$row['jangka'].'</td>
		<td align="center">'.$row['suku'].'</td>
		<td align="center"><a title="Koreksi Pinjaman Kredit" class="icon-more" onClick="showEdit('.$row['id'].')">Next</a></td>
		</tr>';
		$no++;
	}
}else{
	echo '<tr><td align="center" colspan="8" style="color: #ff0000">Data Pinjaman tidak ditemukan!</td></tr>';
}
echo '
</tbody></table>
</div>';
?>
<div id="dialog" style="display: none"></div>