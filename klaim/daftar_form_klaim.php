<?php include '../h_tetap.php';?>
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
		var r = confirm("Otorisasi Pengajuan Di Di Batalkan..?");
		if (r == false) { 
			return false; 
		}
		var dataString = 'id=' + id;
		$.ajax({
		   type: "GET",
		   url	: "./klaim/daftar_form_klaim01.php",
		   data: dataString,
		   beforeSend: function() {
		       $('#loading').show();
		   },
		   success: function(data) {
		       $('#innertub').html(data);
		       goKembali();
		       $('#loading').hide();
		   }
		});
	}
	function goKembali() {
		var url='./klaim/daftar_form_klaim.php';
		$('#innertub').load(url);
	}
</script>
<?php echo '<table id="tableData" class="table-line"><thead><tr><th>No</th><th>Nonas</th><th>Norek</th><th>Nama</th><th>Nominal</th><th>Saldo</th><th>Jumlah Klaim</th><th>Keterangan</th><th>Aksi</th></tr></thead><tbody>';$hasil=$result->query_x1("SELECT a.id_kredit,a.norek,a.nama,a.plafond,a.saldo,DATE_FORMAT(a.tgl_otorisasi,'%d-%m-%Y %H:%i:%s') AS tgl_otorisasi,a.user_otorisasi,a.jumlah_klaim,b.branch,b.nonas,b.sufix FROM $tabel_klaim a JOIN $tabel_kredit b ON a.id_kredit=b.id WHERE a.status_klaim=2 AND a.kode_hapus=0 AND a.kode_cair=0 ORDER BY a.norek");$no=1;if($result->num($hasil)>0){while($row = $result->row($hasil)){echo '<tr><td>'.$no.'</td><td>'.$row[ 'branch']. '-'.$row[ 'nonas']. '-'.$row[ 'sufix'].'</td><td>'.$row[ 'norek'].'</td><td>'.$row[ 'nama'].'</td><td align="right">'.number_format($row['plafond']).'</td><td align="right">'.number_format($row['saldo']).'</td><td align="right">'.number_format($row['jumlah_klaim']).'</td><td align="right">'.$row['tgl_otorisasi'].' / '.$row['user_otorisasi'].'</td><td align="center"><a title="Pembatalan Otorisasi Pengajuan Klaim/Penghapusan Outstanding" class="icon-more13" onClick="showEdit('.$row['id_kredit'].')">Di Batalkan</a></td></tr>';$no++;}}else{echo '<tr><td align="center" colspan="8" style="color: #ff0000">Data Otorisasi Pengajuan Klaim/Penghapusan Outstanding Tidak Ditemukan!</td></tr>';}echo '</tbody></table>'; ?>