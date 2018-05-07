<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	url2="tabel_provinsi00.php";
	url3="tabel_provinsi02.php?p=1";
	url4="tabel_provinsi02.php?p=2";
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
					title:"DATA TABEL PROVINSI",
					height: 300,
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
			url	: 'tabel_provinsi01.php',
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
$nonas=$result->c_d($_POST['nonas']);$no=1;
if(strlen($nonas)<3) $result->msg_error('Kriteria Pencairan Minimal 2 Karakter');
$hasil=$result->query_lap("SELECT id,kode,desc1 FROM kode_provinsi WHERE kode LIKE '%$nonas%' OR desc1 LIKE '%$nonas%' ORDER BY kode");	
?>
<button id="tambah">Tambah Kode Provinsi</button>
<input type="hidden" name="nonas" id="nonas" value="<?php echo $nonas;?>"/>
<div class="ui-widget-content">
	<div id="divPageHasil">
		<table id="tableData" class="table-line">
			 <thead>
				<tr>
				  	<th>No</th>
					<th>Kode</th>
					<th>Nama</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if($result->num($hasil)!=0){
					while($row = $result->row($hasil)){ ?>
						<tr>
							<td><?php echo $no;?></td>
							<td><?php echo $row['kode'];?></td>
							<td><?php echo $row['desc1'];?></td>
							<td align="center">
							<a title="Edit Data" class="icon-edit13" onClick="showEdit(<?php echo $row['id']; ?>)">Edit</a>
							<a title="Menghapus Data" class="icon-remove13" onClick="showDelete(<?php echo $row["id"]; ?>)">Hapus</a>
							</td>
						</tr>
						<?php 
						$no++;
					}
				}else{ ?>
					<tr><td align="center" colspan="9" style="color: #ff0000">Data tidak ditemukan!</td></tr><?php 
				}?>
			</tbody>
		</table>
	</div>
</div>
<div id="dialog" style="display: none"></div>