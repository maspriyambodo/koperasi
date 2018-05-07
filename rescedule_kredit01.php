<?php include "h_tetap.php";?>
<?php $result->msg_error('Under Construction');?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript" src="java/rescedule_kredit.js"></script>
<script TYPE="text/javascript">
function jadwall() {
	norek=$("#norek").val();
	$("#jadwal").dialog({
		title :"Jadwal Angsuran",
		height: 450,
		width: 800,
		modal: true ,
		buttons: { 
			close: function() {
				$(this).dialog('close'); 
			} 
		} 
	})
	return false;
}
</script>
<div class="ui-widget">
<?php
$norek=$result->c_d($_POST['nonas']);$tgl=$t;$branch=$kcabang;$fieldss='a.noreks,a.tbunga,a.flunas,a.ketnas,a.pokok,a.bunga,a.administrasi,a.status_klaim,a.gaji,a.umur';include 'config/_set_headerx.php';$pokok=$row['pokok'];$bunga=$row['bunga'];$administrasi=$row['administrasi'];$norekl=$row['norek'];$jumlunas=$pokok+$bunga+$administrasi;$saldoa=0;$blunas=0;$alunas=0;$jumlah=0;$saldo=$row['saldoa'];$gaji=$row['gaji'];$id=$row['id'];$umur=$row['umur'];$angsuran_ke=$result->angsuran_ke($norek);$angsuran_ke++;
?>
<form id="masuk" name="masuk" method="post" action="">
<input name="gaji" type="hidden" id="gaji" value="<?php echo $gaji;?>"/>
<input name="kdkop" type="hidden" id="kdkop" value="<?php echo $kdkop;?>"/>
<input name="tglahir" type="hidden" id="tglahir" value="<?php echo $tglahir;?>"/>
<input name="id" type="hidden" id="id"  value="<?php echo $id; ?>"/>
<input name="produk" type="hidden" id="produk" value="<?php echo $produk;?>"/>
<input name="norek" type="hidden" id="norek" value="<?php echo $norek;?>"/>
<input name="sufix" type="hidden" id="sufix" value="<?php echo $sufix;?>"/>
<input name="nonas" type="hidden" id="nonas" value="<?php echo $nonas;?>"/>
<input name="nama" type="hidden" id="nama" value="<?php echo $nama;?>"/>
<input name="saldox" type="hidden" id="saldox" value="<?php echo $saldox;?>"/>
<table width="100%" class="table">
	<?php include '_headerx.php'; ?>
	<tr>
		<td colspan="2" align="center" class="ui-state-highlight"><strong><a href="" onclick="jadwall();return false;">DATA ANGSURAN LAMA</a></strong></td>
		<td colspan="2" align="center" class="ui-state-highlight"><strong>DATA ANGSURAN BARU</strong></td>
	</tr>
	<tr>
		<td>Pokok Angsuran Lama</td>
		<td>: <input style="text-align:right" readonly name="pokok" type="text" id="pokok" maxlength="15" value="<?php echo number_format($pokok); ?>"/></td>
		<td>Pokok Angsuran Baru</td>
		<td>: <input style="text-align:right" name="saldoa" type="text" id="saldoa" maxlength="15" value="<?php echo $saldoa; ?>"/></td>
	</tr>
	<tr>
		<td>Bunga Angsuran Lama</td>
		<td>: <input style="text-align:right" readonly  name="bunga" type="text" id="bunga" maxlength="15" value="<?php echo number_format($bunga);?>"/></td>
		<td>Bunga Angsuran Baru</td>
		<td>: <input style="text-align:right" name="blunas" type="text" id="blunas" maxlength="15" value="<?php echo $blunas;?>"/></td>
	</tr>
	<tr>
		<td>Adm Angsuran Lama</td>
		<td>: <input style="text-align:right" readonly  name="administrasi" type="text" id="administrasi" maxlength="15" value="<?php echo number_format($administrasi);?>"/></td>
		<td>Adm Angsuran Baru</td>
		<td>: <input style="text-align:right" name="alunas" type="text" id="alunas" maxlength="15" value="<?php echo $alunas;?>"/></td>
	</tr>
	<tr>
		<td><strong>JUMLAH ANGSURAN LAMA</strong></td>
		<td>: <input style="text-align:right" readonly="" name="jumlunas" type="text" id="jumlunas" maxlength="15" value="<?php echo number_format($jumlunas);?>"/></td>
		<td><strong>JUMLAH ANGSURAN BARU</strong></td>
		<td>: <input style="text-align:right" readonly="" name="jumlah" type="text" id="jumlah" maxlength="15" value="<?php echo number_format($jumlah);?>"/></td>
	</tr>
	<tr>
		<td>Nominal</td>
		<td>: <input style="text-align:right" name="nomi" type="text" id="nomi" maxlength="15" value="<?php echo $nomi;?>" readonly/></td>
		<td >Mulai Angsuran Ke</td>
		<td>: 
			<select name="angsuran_ke" id="angsuran_ke">
			<?php
			for($i=1; $i<=$jangka; $i++){
				if($angsuran_ke==$i){
					echo "<option value=\"".$i."\" selected>".$i."</option>";
				}else{
					echo "<option value=\"".$i."\">".$i."</option>";
				}
			} ?>
			</select>
		</td>
	<tr>
		<td>Tanggal Transaksi</td>
		<td>: <input style="text-align:right" name="tgtran" type="text" id="tgtran" maxlength="10" value="<?php echo $tgtran;?>" readonly/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	</tr>
	<tr>
		<td>Jangka Waktu</td>
		<td>: <input style="text-align:right" name="jangka" type="text" id="jangka" maxlength="15" value="<?php echo $jangka;?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td>Suku Bunga</td>
		<td>: <input style="text-align:right" name="suku" type="text" id="suku" maxlength="5" value="<?php echo $suku;?>"/></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><button id="hitungg">Hitung Angsuran</button></td>
		<td colspan="2" align="center"><button id="angsuran">Jadwal Ansuran Baru</button></td>
	</tr>
</table>
<div class="ui-widget-content ui-state-highlight" align="center">
	<input type="submit" value="Simpan" id="submit" class="icon-save"/>
	<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
</div>
</form>
</div>
<div ID="divPageAkun"></div>
<div id="jadwal" style="display: none">
<?php include 'payment_scedule.php'?>
</div>