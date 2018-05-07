<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.autotab.min.js"></script>
<script type="text/javascript" src="java/tampil_norek.js"></script>
<script type="text/javascript" src="java/java_umum.js"></script>
<script type="text/javascript" src="java/hanya_angka.js"></script>
<script TYPE="text/javascript">
	url4='deposito_open.php';
	url_umum='createdepo.php?p=1';
	$(document).ready(function(){
		$("#hitung").button().on("click",function(){
			var tgl_x1= new $("#tgl_x1").val();
			var bln_x1= new $("#bln_x1").val();
			var thn_x1= new $("#thn_x1").val();
			var nominal = new Number($("#nominal").val().replace(/\./g, ''));
			if (nominal<1000000){
				alert ("Penempatan Deposito Minimal 1 Juta Rupiah");
				$("#nominal").focus();
				return false;
			}
			var jangka_waktu=new Number($("#jangka_waktu").val().replace(/\./g,''));
			if (jangka_waktu<1){
				alert ("Jangka Waktu Minimal 1 Bulan");
				$("#jangka_waktu").focus();
				return false;
			}
			var jenis_bunga = $("#jenis_bunga").val();
			var bunga = $("#bunga").val();
			if(bunga.length==0){
				alert("Bunga Belum Di Isi..!");
				$("#bunga").focus();
				return false;
			}
			var produk = $("#produk").val();
			dataString='nominal='+nominal+'&jangka_waktu='+jangka_waktu+'&bunga='+bunga+'&tgl_x1='+tgl_x1+'&bln_x1='+bln_x1+'&thn_x1='+thn_x1+'&jenis_bunga='+jenis_bunga+'&produk='+produk;
			$.ajax({
				type: 'GET',
				url : 'countdepo.php',
				data: dataString,
				beforeSend: function () {
					$('#loading').show();
				},
				success: function (data) {
					$('#loading').hide();
					$('#dialog').html(data); 
					$("#dialog").dialog({
						title :"Daftar Jadwal Bunga",
						height: 550,
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
			return false;
		});
	});
	$("#lookup_sales").lookupbox({
		title: 'Daftar Account Officer',
		url	 : 'lookup/lookup_sales.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sales_id]').val(a.idsales);
			$('input[name=nama_sales').val(a.nama);
		},
		tableHeader: ['Branch','Kode Sales','Nama']
	});
	$("#lookup_norekx").lookupbox({
		title: 'Daftar Rekening',
		url  : 'lookup/lookup_rekening.php?chars=213',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=branch_]').val(data.branch);
			$('input[name=nonas_]').val(data.nonas);
			$('input[name=sufix_]').val(data.sufix);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
	});
	$(function(){
		$('#nominal').priceFormat({prefix: '',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
		$('#bunga').priceFormat({prefix: '',centsSeparator:'.',thousandsSeparator: '.', centsLimit: 2});
		$(".sales").autocomplete({
			minLength:2,
			source:'auto_sales.php',
			select:function(event, ui){
				$('#nama_sales').val(ui.item.nama);
			}
		});
		$(".nama_sales").autocomplete({
			minLength:5,
			source:'auto_namasales.php',
			select:function(event, ui){
				$('#sales_id').val(ui.item.idsales);
			}
		});
		$("#hitung").button({
			text: true,
			icons: {
				primary: "ui-icon-calculator"
			}
		});
		$("#lookup_sales").button({
			text: false,
			icons: {
		   		primary: 'ui-icon-circle-plus'
		  	}
		});
		$("#lookup_norekx").button({
			text: false,
			icons: {
		   		primary: 'ui-icon-circle-plus'
		  	}
		});
	});
	function blurSales() {
		var sales_id= $("#sales_id").val();
		dataString ='sales_id='+sales_id;
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url : 'onblur_sales.php',
			data: dataString,
			beforeSend: function (){
				$('#loading').show();
			},
			success: function (data){
				$("#nama_sales").val(data.nama);
				$('#loading').hide();
			}
		});
		return false;
	}
	function blurNamasales() {
		var nama_sales= $("#nama_sales").val();
		dataString ='nama_sales='+nama_sales;
		$.ajax({
			type: 'GET',
			dataType: 'json',
			url : 'onblur_namasales.php',
			data: dataString,
			beforeSend: function (){
				$('#loading').show();
			},
			success: function (data){
				$("#sales_id").val(data.idsales);
				$('#loading').hide();
			}
		});
		return false;
	}
	function innerHtml(data){
		$('#innertub').html(data);
	}
	function validasi(){
		var nominal = new Number($("#nominal").val().replace(/\./g, ''));
		if (nominal<1000000){
			alert ("Penempatan Deposito Minimal 1 Juta Rupiah");
			$("#nominal").focus();
			return false;
		}
		var jangka_waktu=new Number($("#jangka_waktu").val().replace(/\./g,''));
		if (jangka_waktu<1){
			alert ("Jangka Waktu Minimal 1 Bulan");
			$("#jangka_waktu").focus();
			return false;
		}
		var jenis_bunga = $("#jenis_bunga").val();
		var bunga = $("#bunga").val();
		if(bunga.length==0){
			alert("Bunga Belum Di Isi..!");
			$("#bunga").focus();
			return false;
		}
		var bunga_via = $("#bunga_via").val();
		if(bunga_via==2){
			var rekening_internal = new $("#rekening_internal").val();
			if(rekening_internal.length==0){
				alert("Rekening Internal Belum Di Isi..!");
				$("#rekening_internal").focus();
				return false;
			}
			var rekening_bank = new $("#rekening_bank").val();
			if(rekening_bank.length==0){
				alert("Rekening Bank Transfer Belum Di Isi..!");
				$("#rekening_bank").focus();
				return false;
			}
			var nama_rekening_bank = new $("#nama_rekening_bank").val();
			if(nama_rekening_bank.length==0){
				alert("Nama Rekening Bank Transfer Belum Di Isi..!");
				$("#nama_rekening_bank").focus();
				return false;
			}
		}	
	}
</script>
<?php
$no_nasabah=$result->c_d($_POST['nonas']);$branch=$kcabang;
$hasil = $result->query_lap("SELECT id,nonas,nama,noktp,alamat,lurah,camat,npwp,status_cif,tlphp1 FROM nasabah WHERE branch='$branch' AND nonas LIKE '%$no_nasabah%' ORDER BY nonas LIMIT 1");
$row=$result->row($hasil);if($row['status_cif']!=1)$result->msg_error('Nomor nasabah belum di otorisasi');
$nama_rekening_bank = $row['nama'];$sufix='';
$text1=$kcabang;$text2='213203';$text3='360';
$bln_x1=date('m',strtotime($tanggal));
$thn_x1=date('Y',strtotime($tanggal));
$tgl_x1=date('d',strtotime($tanggal));
?>
<form id="masuk" name="masuk" method="POST" action="">
<input name="no_nasabah" type="hidden" id="no_nasabah" value="<?php echo $no_nasabah?>"/>
<input name="sufix" type="hidden" id="sufix" value="<?php echo $sufix?>"/>
<table width="100%">
	<tr><th colspan="4" class="ui-state-highlight">DATA NASABAH DEPOSITO</th></tr>
	<tr class="ui-state-error">
		<td width="15%">Nama</td>
		<td width="35%">: <?php echo $row['nama'];?></td>
		<td width="15%">No Nasabah</td>
		<td width="35%">: <?php echo $branch.'-'.$no_nasabah;?></td>
	</tr>
	<tr class="ui-state-error">
		<td>Alamat</td>
		<td colspan="3">: <?php echo $row['alamat'].' KEL '.$row['lurah'].' KEC '.$row['camat'];?></td>
	</tr>
	<tr class="ui-state-error">
		<td>No NPWP</td>
		<td >: <?php echo $row['npwp'];?></td>
		<td>No KTP</td>
		<td>: <?php echo $row['noktp'];?></td>
	</tr>
	<tr>
		<td>Nama Rekening</td>
		<td>: <input name="nama_rekening" type="text" id="nama_rekening" value="<?php echo $row['nama'];?>" size="45" maxlength="100"/></td>
		<td>Kode Produk</td>
		<td>: 
			<select name="produk" id="produk">
			<?php
			$hasil=$result->res("SELECT kdproduk,nmproduk FROM deposito.prd_deposito ORDER BY kdproduk");
			$produk='DPU';
			while($data = $result->row($hasil)){
				if ($produk==$data['kdproduk']){
					echo "<option value='".$data['kdproduk']."' selected>".$data['nmproduk']."</option>";
				}else{
					echo "<option value='".$data['kdproduk']."'>".$data['nmproduk']."</option>";
				}
			}?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Pembukaan Deposito</td>
		<td>: 
			<select name="transaksi_via" id="transaksi_via">
			<?php $huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER","ARO");
			$i = 0;$transaksi_via=0;
			while ($i < 4) {
				if ($transaksi_via == $i){
					echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			}?>
			</select>
		</td>
		<td>Tipe Jatuh Tempo</td>
		<td>: 
			<select name="counter_aro" id="counter_aro">
			<?php $huruf = array("Non-ARO", "ARO","ARO+");
			$i = 0;$counter_aro=1;
			while ($i < 3) {
				if ($counter_aro == $i){
					echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			} ?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Tipe Bunga</td>
		<td>: 
		<select name="jenis_bunga" id="jenis_bunga">
			<?php 
			$huruf = array("HARIAN", "BULANAN");
			$i = 0;$jenis_bunga=0;
			while ($i < 2) {
				if ($jenis_bunga == $i){
					echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			} ?>
		</select>
		</td>
		<td>Tipe Penarikan Bunga</td>
		<td>: 
			<select name="bunga_via" id="bunga_via">
			<?php $huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER");
			$i = 0;$bunga_via=2;
			while ($i < 3) {
				if ($bunga_via == $i){
					echo "<option value='" . $i . "' selected>" . $huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			}?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Nama Bank Tujuan</td>
		<td>: <input name="nama_bank" type="text" id="nama_bank" value="" size="45" maxlength="50"/></td>
		<td>Rekening Bank Tujuan</td>
		<td>: <input name="rekening_bank" type="text" id="rekening_bank" value="" size="45" maxlength="50" /></td>
	</tr>
	<tr>
		<td>Nama Rekening Tujuan</td>
		<td>: <input name="nama_rekening_bank" type="text" id="nama_rekening_bank" value="<?php echo $row['nama'];?>" size="45" maxlength="50"/></td>
		<td>Nama Penarik Bunga</td>
		<td>: <input name="nama_penarik_bunga" type="text" id="nama_penarik_bunga" value="<?php echo $row['nama'];?>" size="45" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Rekening Nasabah</td>
		<td>: 
		<input type="text" name="branch_" id="text1" size="4" maxlength="4" value="<?php echo $text1;?>" required autocomplete="off"/><input type="text" name="nonas_" id="text2" size="6" maxlength="6" value="<?php echo $text2;?>" class="norek" required autocomplete="off"/><input type="text" name="sufix_" id="text3" size="3" maxlength="3" value="<?php echo $text3;?>" required autocomplete="off"/><button type="button" id="lookup_norekx">&nbsp;</button>
		</td>
		<td>Tanggal Buka</td>
		<td>: 
			<select name="tgl_x1" id="tgl_x1" style="width:60px" >
				<?php include 'form_tanggal.php';?>
			</select>
			<select name="bln_x1" id="bln_x1" style="width:85px" >
				<?php include 'form_bulan.php';?>
			</select>
			<select name="thn_x1" id="thn_x1" style="width:70px" >
				<?php include 'form_tahun.php';?>
			</select>		
		</td>
	</tr>
	<tr>
		<td>Direct Mail</td>
		<td>: 
		<select name="alamat_mail" id="alamat_mail">
			<?php $huruf = array("Alamat Sesuai KTP", "Alamat EMAIL");
			$i = 0;$mail=0;
			while ($i < 2) {
				if($mail == $i){
				  echo "<option value='".$i."'selected>".$huruf[$i]."</option>";
				}else{
				  echo "<option value='" . $i . "'>".$huruf[$i]."</option>";
				}
				$i++;
			}?>
		</select>
		</td>
		<td>Account Officer</td>
		<td>: 
		<input name="sales_id" type="text" id="sales_id" value="" size="6" maxlength="5" class="sales" onblur="blurSales()"/><button type="button" id="lookup_sales">&nbsp;</button><input name="nama_sales" type="text" id="nama_sales" value="" size="30" class="nama_sales" onblur="blurNamasales()"/>
		</td>
	</tr>
	<tr>
		<td>No Telepon</td>
		<td>: <input name="tlphp1" type="text" id="tlphp1" size="35" maxlength="12" value="<?php echo $row['tlphp1'];?>" onkeypress="return hanyaAngka(event,false)"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<th colspan="4" class="ui-state-highlight">DATA NOMINAL DAN NO BILYET DEPOSITO</th>
	<tr>
		<td>No Bilyet</td>
		<td>: <input name="nomor_bilyet" type="text" id="nomor_bilyet" size="20" maxlength="13" value=""/><input name="seri_bilyet" type="text" id="seri_bilyet" size="4" maxlength="2" value=""/></td>
		<td>Nominal</td>
		<td>: <input name="nominal" type="text" id="nominal" size="35" maxlength="15" value=""/></td>
	</tr>
	<tr>
		<td>Jangka Waktu</td>
		<td>: <input name="jangka_waktu" type="text" id="jangka_waktu" size="10" maxlength="2" value=""/></td>
		<td>Counter Rate</td>
		<td>: <input name="bunga" type="text" id="bunga" value="" size="10" maxlength="6"/>
		<button id="hitung">Simulasi Bunga</button>
		</td>
	</tr>
</table>
<div class="ui-widget-content ui-state-highlight" align="center">
	<input type="submit" value="Simpan" id="submit" class="icon-save" onclick="return validasi();"/>
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>
<div id="dialog" style="display: none"></div>