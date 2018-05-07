<?php include 'h_tetap.php';?>
<script type="text/javascript" src="js/_transaksi.js"></script>
<script type="text/javascript" src="js/_transaksix.js"></script>
<script type="text/javascript">
	var url  ="pelunasan_kredit.php";
	var urls ='pelunasan_kredit02.php';
	$(document).ready(function (){
		$("input#jumlah").focus();
		$('#simpan').click(function(){
			var jumlah=new Number($("#jumlah").val().replace(/\./g, ''));
			var jumlunas=new Number($("#jumlunas").val().replace(/\./g, ''));
			if(Number(jumlah)>Number(jumlunas)){
				alert('Jumlah Pembayaran Lebih Besar...?');
				return false;
			}
			if(jumlah<=0){
				alert('Jumlah Pembayaran Tidak Sesuai...?');
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
<?php include '_pelunasany.php'; echo '
<form id="masuk" name="masuk" method="POST" action="">
	<input name="id" type="hidden" id="id" value="'.$idd.'"/>
	<input name="produk" type="hidden" id="produk" value="'.$produk.'"/>
	<input name="nama" type="hidden" id="nama" value="'.$nama.'"/>
	<input name="kdkop" type="hidden" id="kdkop" value="'.$kdkop.'"/>
	<input name="noreks" type="hidden" id="noreks" value="'.$noreks.'"/>
	<table width="100%">
		<tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';
		include '_headerx.php'; echo '<tr>
		<td colspan="2" align="center" class="ui-state-highlight">JUMLAH TUNGGAKAN : '.number_format($kk).' X ANGSURAN</td>
		<td colspan="2" align="center"  class="ui-state-highlight">JUMLAH PEMBAYARAN + SISA ANGSURAN '.number_format($sisa_angsuran).' X ANGSURAN</td>
		</tr><tr>
		<td width="20%" align="right">Pokok Angsuran</td>
		<td width="30%"><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($saldoa).'</div></td>
		<td>Pembayaran Dari</td><td>:
		<select name="kode_cair" id="kode_cair" style="width: 180px">';
			$huruf = array("GIRO BTPN","PP ANGSURAN","TABUNGAN TASETO");$i = 0;
			while($i < 3){
				if($kode_cair== $i){
					echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
				}else{
					echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
				}
				$i++;
			} echo '
		</select></td>
		</tr><tr>
		<td align="right">Bunga Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($blunas).'</div></td>
		<td>Pokok Angsuran</td>
		<td>: <input style="text-align:right" readonly name="saldoa" type="text" id="saldoa" maxlength="15" value="'.$saldoa.'" size="25"/></td>
		</tr><tr>
		<td align="right">Adm Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($alunas).'</div></td>
		<td>Bunga Angsuran</td><td>: ';
		if($aktif_satu==1){
			echo '<input style="text-align:right" name="blunas" type="text" id="blunas" maxlength="15" value="'.$blunas.'" size="25"/>';
		}else{
			echo '<input style="text-align:right" name="blunas" type="text" id="blunas" maxlength="15" value="'.$blunas.'" size="25" readonly/>';
		} echo '</td>
		</tr><tr>
		<td align="right">Denda Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($bungakk).'</div></td>
		<td>Adm Angsuran</td><td>: ';
		if($aktif_satu==1){
			echo '<input style="text-align:right" name="alunas" type="text" id="alunas" maxlength="15" value="'.$alunas.'" size="25"/>';
		}else{
			echo '<input style="text-align:right" name="alunas" type="text" id="alunas" maxlength="15" value="'.$alunas.'" size="25" readonly/>';
		} echo '</td>
		</tr><tr>
		<td align="right">Finalty Pelunasan</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($flunas).'</div></td>
		<td>Denda Angsuran</td>
		<input name="angsurke" type="hidden" id="angsurke" value="'.$angsurke.'"/><input name="jumlunas" type="hidden" id="jumlunas" value="'.$jumlah.'"/><td>: ';
		if($aktif_satu==1){
			echo '<input style="text-align:right" name="bungakk" type="text" id="bungakk" maxlength="15" value="'.$bungakk.'" size="25"/>';
		}else{
			echo '<input style="text-align:right" name="bungakk" type="text" id="bungakk" maxlength="15" value="'.$bungakk.'" size="25" readonly/>';
		} echo '</td>
		</tr><tr>
		<td align="right">Jumlah Angsuran</td>
		<td><div style="width: 150px;height: 25px" class="ui-widget-content" align="right">'.number_format($jumlah).'</div></td>
		<td>Finalti Pelunasan</td><td>: ';
		if($aktif_satu==1){
			echo '<input style="text-align:right" name="flunas" type="text" id="flunas" maxlength="15" value="'.$flunas.'" size="25"/>';
		}else{
			echo '<input style="text-align:right" name="flunas" type="text" id="flunas" maxlength="15" value="'.$flunas.'" size="25" readonly/>';
		} echo '</td>
		</tr><tr>
		<td colspan="2">&nbsp;</td>
		<td>JUMLAH PEMBAYARAN</td>
		<td>: <input style="text-align:right" name="jumlah" type="text" id="jumlah" maxlength="15" value="'.$jumlah.'" required size="25" readonly/></td>
		</tr><tr>
		<td colspan="4"><div class="ui-widget-content" align="center">
		<button type="button" id="simpan">Simpan</button>
		<button type="button" id="kembali" onclick="goKembali();">Batal</button></div>
		</td></tr>
	</table>
</form>
<div id="divPageList">';include 'tabel_hasilx.php'; echo '</div>
<div id="dialog-form" title="Otorisasi">
	<table>
		<tr><td>User Name</td>
		<td>: <input type="text" name="nmuser" id="nmuser" onKeyUp="caps(this)" class="text ui-widget-content ui-corner-all"/></td>
		</tr><tr>
		<td>Password</td>
		<td>: <input type="password" name="password" id="password" class="text ui-widget-content ui-corner-all"/></td>
		</tr>
	</table>
</div>'; ?>