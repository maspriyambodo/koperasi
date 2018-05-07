<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	url2="tabel_inventaris00.php";
	url3="tabel_inventaris01.php?p=1";
	url4="tabel_inventaris01.php?p=2";
	$(document).ready(function() {
		$('#tableData').paging({limit:15});
		$( "#tambah" ).button().on( "click", function() {
			showEdit('');
		});
	});
	function showEdit(id) {
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url	: url2,
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success:function(data){
				$('#dialog').html(data); 
				$('#loading').hide();
				$("#dialog").dialog({
					title:"DATA TABEL INVENTARIS",
					height: 400,
					width: 550,
					modal: true ,
					buttons: { 
					Simpan: function() {
						$.ajax({
							type: 'POST',
							url : url3,
							data: $('#formm').serialize(),
							beforeSend: function () {
								$('#loading').show();
							},
							success: function (data) {
								$('#loading').hide();
								alert(data);
								var tes = data.search("Sukses");
								if(tes!=0){
									return false;
								}
								goKembali();
							}
						});
						$(this).dialog('close');						
					},
					close: function() {
						$(this).dialog('close');
					}}
				})
			}
		});
		return false;
	}
	function showDelete(id) {
		var r = confirm("Anda yakin data di hapus?");
		if (r == false) {
			return false;
		}
		$('#id').val(id);
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url	: url4,
			data: dataString,
			success	: function(data){
				var text=data
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
			}
		});
	}
	function goKembali() {
		var nonas= $("input#nonas").val();
		var dataString='nonas='+nonas;
		$.ajax({
			type: 'POST',
			url	: 'tabel_inventaris',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function (data) {
				$("#divPageHasil").html(data);
				$('#loading').hide();
			}
		});
		return false;
	}
</script>
<?php
$hasil=$result->query_x1("SELECT * FROM akuntansi.prd_inventaris ORDER BY kode_golongan");$no=1;
echo '
<div class="ui-widget-content">
	<div id="divPageHasil">
		<table id="tableData" class="table-line">
			<thead>
				<tr class="td" bgcolor="#e5e5e5">
					<th>NO</th>
					<th>GOLONGAN</th>
					<th>KETERANGAN</th>
					<th>GL PEROLEHAN</th>
					<th>GL PEMBIAYAAN</th>
					<th>GL PENYUSUTAN</th>
					<th>GL BIAYA</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tbody>';
			if($result->num($hasil)!=0){
				while($row = $result->row($hasil)){
					$kode_inventaris=$row['kode_inventaris']; 
					include 'help/ket_inventaris.php';
					echo '<tr>
					<td>'.$no.'</td>
					<td>'.$row['kode_golongan'].'</td>
					<td>'.$xkode_inventaris.'</td>
					<td>'.$row['gl_perolehan'].'</td>
					<td>'.$row['gl_pembelian'].'</td>
					<td>'.$row['gl_akumulasi'].'</td>
					<td>'.$row['gl_biaya'].'</td>
					<td align="center">
					<a title="Edit Data" class="icon-edit13" onClick="showEdit('.$row['id'].')">Edit</a>
					<a title="Menghapus Data" class="icon-remove13" onClick="showDelete('.$row['id'].')">Hapus</a>
					</td>
				</tr>';
				$no++;
				}
			}else{
				echo 'Data Belum ada';
			}
			echo '
			</tbody>
		</table>
	</div>
</div>';