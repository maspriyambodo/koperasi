<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);$branch=$kcabang;$tabel="deposito.deposits_cadangan";
$hasil=$result->res("SELECT id_deposito FROM $tabel WHERE id_deposito='$id' LIMIT 1");
if($result->num($hasil)>0)die('Error : Masih Ada Bunga Yang Belum Di Selesaikan!!!');
$hasil=$result->query_lap("SELECT a.id,a.branch,a.sufix,a.nomor_nasabah,a.rekening_internal,a.seri_bilyet,a.nomor_bilyet,a.status_rekening,a.tanggal_buka,a.produk,a.nominal,a.jangka_waktu,a.counter_aro,a.counter_rate,a.nama_bank,a.rekening_bank,nama_rekening_bank,nama_penarik_bunga,a.nama_rekening,a.jenis_bunga,a.transaksi_via,a.bunga_via,a.alamat_mail,a.sales_id,a.kena_pajak,a.min_pajak,pajak,a.alasan_blokir,b.nama,b.alamat,b.lurah,b.camat,b.noktp,b.npwp FROM deposito.deposits a JOIN $tabel_nasabah b ON b.nonas=a.nomor_nasabah WHERE a.id='$id' ORDER BY a.nomor_nasabah LIMIT 1");$row=$result->row($hasil);
if($row['status_rekening']==4) die('Error : Rekenign Deposito Sudah Di Tutup');
$text1=substr($row['rekening_internal'],0,4);
$text2=substr($row['rekening_internal'],4,6);
$text3=substr($row['rekening_internal'],-3);
$bln_x1=date('m',strtotime($row['tanggal_buka']));
$thn_x1=date('Y',strtotime($row['tanggal_buka']));
$tgl_x1=date('d',strtotime($row['tanggal_buka']));
?>
<form id="masuk" name="masuk" method="POST" action="">
<input type="hidden" name="h" id="h" maxlength="1" value="1"/>
<input name="id" type="hidden" id="id" value="<?php echo $row['id'];?>"/>
<input name="branch" type="hidden" id="branch" value="<?php echo $row['branch'];?>"/>
<input name="nonas" type="hidden" id="nonas" value="<?php echo $row['nomor_nasabah'];?>"/>
<input name="sufix" type="hidden" id="sufix" value="<?php echo $row['sufix'];?>"/>
<table width="100%">
	<tr><th colspan="4" class="ui-state-highlight">DATA NASABAH DEPOSITO</th></tr>
	<tr>
		<td>Nama Rekening</td>
		<td>: <input name="nama_rekening" type="text" id="nama_rekening" value="<?php echo $row['nama_rekening'];?>" size="35" maxlength="100" readonly/></td>
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
		<td>Tipe Pembukaan Deposito</td>
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
		<td>: <input name="nama_bank" type="text" id="nama_bank" value="<?php echo $row['nama_bank'];?>" size="35" maxlength="50" readonly/></td>
		<td>Rekening Bank</td>
		<td>: <input name="rekening_bank" type="text" id="rekening_bank" value="<?php echo $row['rekening_bank']; ?>" size="35" maxlength="50" readonly/></td>
	</tr>
	<tr>
		<td>Nama Rekening</td>
		<td>: <input name="nama_rekening_bank" type="text" id="nama_rekening_bank" value="<?php echo $row['nama_rekening_bank'];?>" size="35" maxlength="50" readonly/></td>
		<td>Nama Penarik Bunga</td>
		<td>: <input name="nama_penarik_bunga" type="text" id="nama_penarik_bunga" value="<?php echo $row['nama_penarik_bunga']; ?>" size="35" maxlength="50" readonly/></td>
	</tr>
	<tr>
		<td>Rekening Nasabah</td>
		<td>: 
		<input type="text" name="branch_" id="text1" size="4" maxlength="4" value="<?php echo $text1;?>" required autocomplete="off" readonly/> 
		<input type="text" name="nonas_" id="text2" size="6" maxlength="6" value="<?php echo $text2;?>" required autocomplete="off" readonly/> 
		<input type="text" name="sufix_" id="text3" size="3" maxlength="3" value="<?php echo $text3;?>" required autocomplete="off" readonly/>&nbsp;		
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
		<select name="alamat_mail" id="alamat_mail" disabled="">
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
		<td>: <input name="sales_id" type="text" id="sales_id" value="<?php echo $row['sales_id']; ?>" size="6" maxlength="5" readonly/>
		<input name="nama_sales" type="text" id="nama_sales" value="" size="39" readonly/>
		</td>
	</tr>
	<tr>
		<td>Status Rekening</td>
		<td>: 
		<select name="status_rekening" id="status_rekening" disabled>
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
	<tr>
		<td>Minimal Kena Pajak</td>
		<td>: <input name="min_pajak" type="text" id="min_pajak" value="<?php echo $row['min_pajak'];?>" size="35" maxlength="15"/>
		</td>
		<td>Pajak</td>
		<td>: <input name="pajak" type="text" id="pajak" value="<?php echo $row['pajak'];?>" size="35" maxlength="5"/>
		</td>
	</tr>
	<th colspan="4" class="ui-state-highlight">DATA NOMINAL DAN NO BILYET DEPOSITO</th>
	<tr>
		<td>No Bilyet</td>
		<td>: 
		<input name="nomor_bilyet" type="text" id="nomor_bilyet" size="20" maxlength="13" value="<?php echo $row['nomor_bilyet'];?>" readonly/>
		<input name="seri_bilyet" type="text" id="seri_bilyet" size="4" maxlength="2" value="<?php echo $row['seri_bilyet'];?>" readonly/></td>
		<td>Nominal</td>
		<td>: <input name="nominal" type="text" id="nominal" size="35" maxlength="15" value="<?php echo $row['nominal'];?>"/></td>
	</tr>
	<tr>
		<td>Jangka Waktu</td>
		<td>: <input name="jangka_waktu" type="text" id="jangka_waktu" size="10" maxlength="2" value="<?php echo $row['jangka_waktu'];?>"/></td>
		<td>Counter Rate</td>
		<td>: <input name="bunga" type="text" id="bunga" value="<?php echo $row['counter_rate'];?>" size="10" maxlength="6"/><button id="hitung">Simulasi Hitung Bunga</button>
		</td>
	</tr>
</table>
<div class="ui-widget-content ui-state-highlight" align="center">
	<input type="submit" value="Create Bunga" id="submit" class="icon-save" onclick="return validasi();"/>
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>
<div id="dialog" style="display: none"></div>
<script type="text/javascript" src="java/java_umum.js"></script>
<script TYPE="text/javascript">
var url_umum='deposito_hapusc.php';
var url4='deposito_editp.php';
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
function innerHtml(data){
	$('#divPageHasil').html(data);
}
$(function(){
	$('#min_pajak').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#nominal').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:0});
	$('#pajak').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:2});
	$('#bunga').priceFormat({prefix:'',centsSeparator:'.',thousandsSeparator:'.',centsLimit:2});
});
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