<?php include 'h_tetap.php';
$id=$result->c_d($_GET['id']);$branch=$kcabang;
$hasil=$result->query_y1("SELECT a.id,a.branch,a.sufix,a.nomor_nasabah,a.rekening_internal,a.seri_bilyet,a.nomor_bilyet,a.status_rekening,a.tanggal_buka,a.produk,a.nominal,a.jangka_waktu,a.counter_aro,a.counter_rate,a.nama_bank,a.rekening_bank,nama_rekening_bank,nama_penarik_bunga,a.nama_rekening,a.jenis_bunga,a.transaksi_via,a.bunga_via,a.alamat_mail,a.sales_id,a.kena_pajak,a.min_pajak,pajak,a.alasan_blokir,b.nama,b.alamat,b.lurah,b.camat,b.noktp,b.npwp,b.tlphp1 FROM deposito.deposits a JOIN $tabel_nasabah b ON b.nonas=a.nomor_nasabah WHERE a.id='$id' ORDER BY a.nomor_nasabah LIMIT 1");
$row = $result->row($hasil);if($row['status_rekening']==4) die('Rekenign Deposito Sudah Di Tutup');
$text1=substr($row['rekening_internal'],0,4);
$text2=substr($row['rekening_internal'],4,6);
$text3=substr($row['rekening_internal'],-3);
$bln_x1=date('m',strtotime($row['tanggal_buka']));
$thn_x1=date('Y',strtotime($row['tanggal_buka']));
$tgl_x1=date('d',strtotime($row['tanggal_buka']));
?>
<form id="masuk" name="masuk" method="POST" action="">
<input type="hidden" name="h" id="h" maxlength="1" value="2"/>
<input name="id" type="hidden" id="id" value="<?php echo $row['id'];?>"/>
<input name="nonas" type="hidden" id="nonas" value="<?php echo $row['nomor_nasabah'];?>"/>
<input name="status_rekeningx" type="hidden" id="status_rekeningx" value="<?php echo $row['status_rekening'];?>"/>
<input name="sufix" type="hidden" id="sufix" value="<?php echo $row['sufix'];?>"/>
<table width="100%">
	<tr><th colspan="4" class="ui-state-highlight">DATA NASABAH DEPOSITO</th></tr>
	<tr class="ui-state-error">
		<td width="15%">Nama</td>
		<td width="35%">: <?php echo $row['nama'];?></td>
		<td width="15%">No Nasabah</td>
		<td width="35%">: <?php echo $row['branch'].'-'.$row['nomor_nasabah'].'-'.$row['sufix'];?></td>
	</tr>
	<tr class="ui-state-error">
		<td>Alamat</td>
		<td colspan="3">: <?php echo $row['alamat'].' KEL '.$row['lurah'].' KEC '.$row['camat'];?></td>
	</tr>
	<tr class="ui-state-error">
		<td>No NPWP</td>
		<td>: <?php echo $row['npwp'];?></td>
		<td>No KTP</td>
		<td>: <?php echo $row['noktp'];?></td>
	</tr>
	<tr>
		<td>Nama Rekening</td>
		<td>: <input name="nama_rekening" type="text" id="nama_rekening" value="<?php echo $row['nama_rekening'];?>" size="35" maxlength="100"/></td>
		<td>Kode Produk</td>
		<td>:
			<select name="produk" id="produk">
			<?php $hasil=$result->res("SELECT kdproduk,nmproduk FROM deposito.prd_deposito ORDER BY kdproduk");
			$produk=$row['produk'];
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
			<?php $huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER","ARO");$i = 0;
			while ($i < 4) {
				if ($row['transaksi_via'] == $i){
				 	echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
				 	echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}$i++;
			}?>
			</select>
		</td>
		<td>Tipe Jatuh Tempo</td>
		<td>: 
			<select name="counter_aro" id="counter_aro">
			<?php $huruf = array("Non-ARO", "ARO","ARO+");$i = 0;
			while ($i < 3){
				if ($row['counter_aro'] == $i){
				 	echo "<option value='" .$i."' selected>".$huruf[$i]."</option>";
				}else{
				 	echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}$i++;
			}?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tipe Bunga :</td>
		<td>: 
		<select name="jenis_bunga" id="jenis_bunga">
			<?php 
			$huruf = array("HARIAN", "BULANAN");$i = 0;
			while ($i<2) {
				if($row['jenis_bunga'] == $i){
					echo "<option value='".$i."' selected>".$huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}$i++;
			}?>
		</select>
		</td>
		<td>Tipe Penarikan Bunga</td>
		<td>: 
		<select name="bunga_via" id="bunga_via">
			<?php $huruf = array("TUNAI", "PINDAH BUKU", "TRANSFER");$i = 0;
			while ($i < 3) {
				if ($row['bunga_via'] == $i){
					echo "<option value='".$i."' selected>".$huruf[$i]."</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}$i++;
			}?>
		</select>
		</td>
	</tr>
	<tr>
		<td>Nama Bank</td>
		<td>: <input name="nama_bank" type="text" id="nama_bank" value="<?php echo $row['nama_bank'];?>" size="35" maxlength="50"/></td>
		<td>Rekening Bank</td>
		<td>: <input name="rekening_bank" type="text" id="rekening_bank" value="<?php echo $row['rekening_bank']; ?>" size="35" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Nama Rekening</td>
		<td>: <input name="nama_rekening_bank" type="text" id="nama_rekening_bank" value="<?php echo $row['nama_rekening_bank'];?>" size="35" maxlength="50"/></td>
		<td>Nama Penarik Bunga</td>
		<td>: <input name="nama_penarik_bunga" type="text" id="nama_penarik_bunga" value="<?php echo $row['nama_penarik_bunga']; ?>" size="35" maxlength="50"/></td>
	</tr>
	<tr>
		<td>Rekening Nasabah</td>
		<td>: 
		<input type="text" name="branch_" id="text1" size="4" maxlength="4" value="<?php echo $text1;?>" required autocomplete="off"/> 
		<input type="text" name="nonas_" id="text2" size="6" maxlength="6" value="<?php echo $text2;?>" class="norek" required autocomplete="off"/> 
		<input type="text" name="sufix_" id="text3" size="3" maxlength="3" value="<?php echo $text3;?>" required autocomplete="off"/>
		<button type="button" id="lookup_norekx">&nbsp;</button>
		</td>
		<td>Tanggal Buka</td>
		<td>: 
			<select name="tgl_x1" id="tgl_x1" style="width:60px">
				<?php include 'form_tanggal.php';?>
			</select>
			<select name="bln_x1" id="bln_x1" style="width:85px">
				<?php include 'form_bulan.php';?>
			</select>
			<select name="thn_x1" id="thn_x1" style="width:70px">
				<?php include 'form_tahun.php';?>
			</select>		
		</td>
	</tr>
	<tr>
		<td>Direct Mail</td>
		<td>: 
		<select name="alamat_mail" id="alamat_mail">
			<?php $huruf = array("Alamat KTP", "EMAIL");$i = 0;
			while ($i < 2) {
				if ($row['alamat_mail'] == $i){
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
			<input name="sales_id" type="text" id="sales_id" value="<?php echo $row['sales_id']; ?>" size="6" maxlength="5" class="sales" onblur="blurSales()"/>
			<button type="button" id="lookup_sales">&nbsp;</button>
			<input name="nama_sales" type="text" id="nama_sales" value="" size="30" class="nama_sales" onblur="blurNamasales()"/>
		</td>
	</tr>
	<tr>
		<td>Status Rekening</td>
		<td>: 
		<select name="status_rekening" id="status_rekening">
			<?php 
			$huruf=array("BELUM AKTIF","SUDAH AKTIF","DI BLOKIR","DI JAMINKAN","SUDAH DI TUTUP");$i=0;
			while ($i<5) {
				if ($row['status_rekening'] == $i){
					echo "<option value='".$i."' selected>".$huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}$i++;
			}?>
		</select>
		</td>
		<td>Kena Pajak</td>
		<td>: 
		<select name="kena_pajak" id="kena_pajak">
			<?php 
			$huruf=array("YA","TIDAK");$i=0;
			while ($i<2) {
				if ($row['kena_pajak'] == $i){
					echo "<option value='".$i."' selected>".$huruf[$i] . "</option>";
				}else{
					echo "<option value='" . $i . "'>" . $huruf[$i] . "</option>";
				}$i++;
			}?>
		</select>
		</td>
	</tr>
	<tr id="tampil">
		<td>Alasan Blokir</td>
		<td colspan="3">: <input name="alasan_blokir" type="text" id="alasan_blokir" value="<?php echo $row['alasan_blokir'];?>" size="150" maxlength="200"/>
		</td>
	</tr>
	<tr>
		<td>Minimal Kena Pajak</td>
		<td>: 
			<input name="min_pajak" type="text" id="min_pajak" value="<?php echo $row['min_pajak'];?>" size="35" maxlength="15"/>
		</td>
		<td>Pajak</td>
		<td>: <input name="pajak" type="text" id="pajak" value="<?php echo $row['pajak'];?>" size="35" maxlength="6"/></td>
	</tr>
	<tr>
		<td>No Bilyet</td>
		<td>: <input name="nomor_bilyet" type="text" id="nomor_bilyet" size="20" maxlength="13" value="<?php echo $row['nomor_bilyet'];?>"/><input name="seri_bilyet" type="text" id="seri_bilyet" size="4" maxlength="2" value="<?php echo $row['seri_bilyet'];?>"/></td>
		<td>No Telepon</td>
		<td>: <input name="tlphp1" type="text" id="tlphp1" size="35" maxlength="12" value="<?php echo $row['tlphp1'];?>" onkeypress="return hanyaAngka(event,false)"/></td>
	</tr>
</table>
<div class="ui-widget-content ui-state-highlight" align="center">
	<input type="submit" value="Simpan" id="submit" class="icon-save" onclick="return validasi();"/>
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>
<script type="text/javascript" src="jQuery/jquery.autotab.min.js"></script>
<script type="text/javascript" src="java/tampil_norek.js"></script>
<script type="text/javascript" src="java/java_umum.js"></script>
<script type="text/javascript" src="java/hanya_angka.js"></script>
<script TYPE="text/javascript">
	url4='deposito_rubahp.php';
	url_umum='createdepo.php?p=2';
	$(document).ready(function(){
		var kd_buka=$("#status_rekening").val();
		$("#tampil").hide();
		if(kd_buka==2){
			$("#tampil").show();	
		}
		$("#status_rekening").change(function(){
			var kode_buka=$("#status_rekening").val();
			if(kode_buka==2){
				$("#tampil").show();
			}else{
				$("#tampil").hide();
				$("#alasan_blokir").val('');
			}
		});
	});
	$("#lookup_sales").lookupbox({
		title: 'Daftar Account Officer',
		url	 : 'lookup_sales.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(a){
			$('input[name=sales_id]').val(a.idsales);
			$('input[name=nama_sales').val(a.nama);
		},
		tableHeader: ['Branch','Kode Sales','Nama']
	});
	$("#lookup_norekx").lookupbox({
		title: 'Daftar Rekening',
		url  : 'lookup_norekx.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=branch_]').val(data.branch);
			$('input[name=nonas_]').val(data.nonas);
			$('input[name=sufix_]').val(data.sufix);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
	});
	$(function(){
		$('#min_pajak').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
		$('#pajak').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:2});
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
	function innerHtml(data){
		$('#divPageHasil').html(data);
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
	function validasi(){
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
		}
	}
</script>