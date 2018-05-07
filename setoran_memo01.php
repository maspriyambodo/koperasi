<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_transaksi.js"></script>
<script type="text/javascript" src="js/_transaksix.js"></script>
<script type="text/javascript">
	var url  ="setoran_memo_o.php";
	var urls ='setoran_memo02.php';
	$("input#jumlah").focus();
	$(document).ready(function () {
		$('#simpan').click(function(){
			var jumlah=new Number($("#jumlah").val().replace(/\./g, ''));
			if(jumlah<=0){
				alert('Nominal Belum Di Input');
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
</script>
<?php $norek=$result->c_d($_POST['nonas']);$tgl=$tanggal;$branch=$result->c_d($_POST['branch']);$fieldss='a.noreks,a.tbunga,a.flunas,a.ketnas,a.pokok,a.bunga,a.administrasi,a.status_klaim';include 'dist/_header.php';$saldoa=$row['pokok'];$blunas=$row['bunga'];$alunas=$row['administrasi'];$jum_tagihan=$blunas+$alunas+$saldoa;$tbunga=$row['tbunga'];$flunas=$row['flunas'];$noreks=$row['noreks'];$kode_cair=1;$norekl='';$sufixl='';$bungakk=0;include '_angsuran.php';echo '
<form id="masuk" name="masuk" method="POST" action="">
	<input name="id" type="hidden" id="id" value="'.$idd.'"/>
	<input name="nama" type="hidden" id="nama" value="'.$nama.'"/>
	<input name="kdkop" type="hidden" id="kdkop" value="'.$kdkop.'"/>
	<input name="noreks" type="hidden" id="noreks" maxlength="13" value="'.$noreks.'"/>
	<input name="produk" type="hidden" id="produk" value="'.$produk.'"/>	
	<table width="100%">
		<tr><th colspan="6" class="ui-state-highlight">DATA DEBITUR</th></tr>';
		include '_headerx.php'; echo '<tr>
		<td colspan="2" align="center" class="ui-state-highlight">JUMLAH TUNGGAKAN : '.number_format($kk).' X ANGSURAN</td>
		<td colspan="2" align="center"  class="ui-state-highlight">JUMLAH PEMBAYARAN</td></tr><tr>
		<td width="20%" align="right">Pokok Angsuran</td>
		<td width="30%"><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($saldoa).'</div></td>
		<td>PEMBAYARAN DARI</td><td>: 
		<select name="kode_cair" id="kode_cair" style="width: 180px">';
		$huruf = array("GIRO BTPN","PP ANGSURAN","TABUNGAN TASETO");$i = 0;
		while($i < 3){
			if($kode_cair== $i){
				echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
			}else{
				echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
			}
			$i++;
		} echo '</select></td>
		</tr><tr>
		<td align="right">Bunga Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($blunas).'</div></td>
		<td><strong>TOTAL PEMBAYARAN</strong></td>
		<td>: <input style="text-align:right" name="jumlah" type="text" id="jumlah" maxlength="15" value="" required="" size="25"/>
		</td></tr><tr>
		<td align="right">Adm Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($alunas).'</div></td>
		<td colspan="2">&nbsp;</td>
		</tr><tr>
		<td align="right">Denda Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($bungakk).'</div></td>
		<td colspan="2">&nbsp;</td>
		</tr><tr>
		<td align="right">Jumlah Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($jumlah).'</div></td>
		<td colspan="2">&nbsp;</td>
		</tr><tr>
		<td colspan="4"><div class="ui-widget-content" align="center">
		<button type="button" id="simpan">Simpan</button>
		<button type="button" id="kembali" onclick="goKembali();">Batal</button>
		</div></td></tr>
	</table>
</form>
<div id="divPageList">';include 'tabel_hasilx.php'; echo '</div>
<div id="dialog-form" title="Otorisasi">
	<table><tr>
		<td>User Name</td>
		<td>: <input type="text" name="nmuser" id="nmuser" onKeyUp="caps(this)" class="text ui-widget-content ui-corner-all"/></td>
		</tr><tr>
		<td>Password</td>
		<td>: <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all"/></td>
	</tr></table>
</div>'; ?>