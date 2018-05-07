<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_transaksi.js"></script>
<script type="text/javascript" src="js/_transaksix.js"></script>
<script type="text/javascript">
	var url  ="memorial_lain.php";
	var urls ='memorial_lain02.php';
	$(document).ready(function () {
		$('#simpan').click(function(){
			var jumlah=new Number($("#jumlah").val().replace(/\./g, ''));
			if(jumlah<=0){
				alert('Nominal Belum Di Input..?');
				return false;
			}
			var angsuran_ke=new Number($("#angsuran_ke").val().replace(/\./g, ''));
			if(angsuran_ke<=0){
				alert('Angsuran Ke Belum Di Isi');
				return false;
			}
			var r = confirm("Anda yakin data di simpan?");
			if (r == false) {
				return false;
			}
			var limitk="<?php echo $limitk?>";
			var limitd="<?php echo $limitd?>";
			if(jumlah>=limitd){
				dialog.dialog("open");
			}else{
				simpan('');
			}
			return false;
		});
		$("#lookup_sandi").lookupbox({
			title: 'Daftar Rekening',
			kodecabang: $("#branch").val(),
			url	 : './dist/_lookup_rekening.php?chars=',
			imgLoader: '<img src="./images/load.gif">',
			onItemSelected: function(data)	{
				$('input[name=noreks]').val(data.norek);
				$('input[name=namat]').val(data.nama);
			},
			tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
		});
	});
	$(function(){
		$(".noreks").autocomplete({
			minLength:2,
			source:'autogl.php',
			select:function(event, ui){
				$('#namat').val(ui.item.nama);
			}
		});
		$("#lookup_sandi").button({
			text: false,
			icons: {
		   		primary: 'ui-icon-circle-plus'
		  	}
		});
		$("#kembali").button({
			text: true,
			icons: {
		   		primary: 'ui-icon-circle-close'
		  	}
		});
		 $('#simpan').button({
		 	text: true,
			icons: {
				primary: 'ui-icon-disk'
			}
		});
	});
	function showPayment(id) {
		$.ajax({
			url : 'thistorydd.php',
			type: "GET",
			data: 'id='+id,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){ 
				$('#dialog').html(data); 
				$('#loading').hide();
				$("#dialog").dialog({
					title :"View Details",
					height: 600,
					width : 1000,
					modal : true,
					buttons:{
						close: function (){
							$(this).dialog('close');
						}  
					}
				});
			}
		});
	}
</script>
<?php $norek=$result->c_d($_POST['nonas']);$tgl=$tanggal;$branch=$result->c_d($_POST['branch']);$fieldss='a.noreks,a.tbunga,a.flunas,a.ketnas,a.pokok,a.bunga,a.administrasi,a.status_klaim';include 'dist/_header.php';$saldoa=$row['saldoa'];if($saldoa==0)$result->msg_error('Saldo Pinjaman Sudah Nol..!!');$blunas=0;$alunas=0;$bungakk=0;$tbunga=$row['tbunga'];$noreks=$row['noreks'];$id=$row['id'];$pokokx=$row['pokok'];$bungax=$row['bunga'];$admx=$row['administrasi'];$xlunas=$row['flunas'];if($saldoa==0){$result->msg_error('Saldo Pinjaman Kredit Nol');}elseif($saldoa>0){$noreks=$branch.'314101360';$nonass='314101';}else{$noreks=$branch.'424101360';$nonass='424101';}$hasil=$result->query_y1("SELECT nonas,nama FROM akuntansi.sandim WHERE nonas='$nonass' LIMIT 1");if($result->num($hasil)<1){$result->msg_error('Data Rekening GSSL Tidak Ditemukan..!!');}$row=$result->row($hasil);$namat=$row['nama'];$flunas=0;$kode_cair=0;$norekl='';$sufixl=''; echo '
<form id="masuk" name="masuk" method="POST" action="">
	<input name="id" type="hidden" id="id" value="'.$idd.'"/>
	<input name="nama" type="hidden" id="nama" value="'.$nama.'"/>
	<input name="kdkop" type="hidden" id="kdkop" value="'.$kdkop.'"/>
	<input name="produk" type="hidden" id="produk" value="'.$produk.'"/>
	<input name="branch" type="hidden" id="branch" value="'.$branch.'"/>
	<input name="saldoa" type="hidden" id="saldoa" value="'.$saldoa.'"/>
	<table align="center" width="100%">
	<tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';
	include '_headerx.php'; echo '
	<tr><td colspan="4" align="center" class="ui-state-highlight">MUTASI TRANSAKSI || <a style="cursor: pointer;" onClick="showPayment('.$id.')">OBD PINJAMAN</a></td></tr><tr>
	<td colspan="2" align="right">REKENING GL :</td>
	<td colspan="2"><input name="noreks" type="text" id="noreks" maxlength="13" value="'.$noreks.'" class="noreks" size="25" autocomplete="off"/><button type="button" id="lookup_sandi">&nbsp;</button></td>
	</tr><tr>
	<td colspan="2" align="right">NAMA REKENING :</td>
	<td colspan="2"><input name="namat" type="text" id="namat" size="50" maxlength="25" value="'.$namat.'" readonly/></td>
	</tr><tr>
	<td colspan="2" align="right">ANGSURAN KE :</td>
	<td colspan="2">
	<select name="angsuran_ke" id="angsuran_ke">';
	$angsuran_ke=1;
	for($i=1; $i<=$jangka; $i++){
		if($i==$jangka){
			echo "<option value=\"".$i."\" selected>".$i."</option>";
		}else{
			echo "<option value=\"".$i."\">".$i."</option>";
		}
	} echo '</select></td>
	</tr><tr>
	<td colspan="2" align="right">KODE TRANSAKSI :</td>
	<td colspan="2">
	<select name="kdtran" id="kdtran">';
	$hasil=$result->res("SELECT kdtran,nama FROM kdtran ORDER BY nama");
	while ($data = $result->row($hasil)) {
		echo "<option value=\"".$data['kdtran']."\">".$data['kdtran'].' '.$data['nama']."</option>";
	} echo '</select></td>
	</tr><tr>
	<td colspan="2" align="right">JUMLAH MUTASI :</td>
	<td colspan="2"><input style="text-align:right" name="jumlah" type="text" id="jumlah" size="25" maxlength="15" value="'.$saldoa.'"/></td></tr><tr>
	<td colspan="2" align="right">KETERANGAN MUTASI :</td>
	<td colspan="2"><textarea name="keterangan" id="keterangan" form="masuk" style="width: 300px" maxlength="70"></textarea></td>
	</tr></table>
	<div class="ui-widget-content" align="center">
		<button type="button" id="simpan">Simpan</button>
		<button type="button" id="kembali" onclick="goKembali();">Batal</button>	
	</div>
</form>
<div id="divPageList"></div>
<div id="dialog-form" title="Otorisasi">
<table>
	<tr><td>User Name</td><td>: <input type="text" name="nmuser" id="nmuser" onKeyUp="caps(this)"/></td></tr>
	<tr><td>Password</td><td>: <input type="password" name="password" id="password"/></td></tr>
</table>
</div>'; ?>