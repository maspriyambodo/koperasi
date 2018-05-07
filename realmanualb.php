<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript" src="js/_tambah_iconx.js"></script>
<script type="text/javascript">
$(document).ready(function () {
	$('#simpan').click(function(){
		var r = confirm("Anda yakin data di simpan?");
		if (r == false) {
			return false;
		}
		var id = $("#id").val();
		var kode_cair = $("#kode_cair").val();
		var dataString='id='+id+'&kode_cair='+kode_cair;
		$.ajax({
			type: "GET",
			url	: 'realmanuals.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				alert(data);
				var text=data;
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
			}
		});
		return false;
	});
});
function goKembali() {
	var url='realmanual.php';
	$('#innertub').load(url);
}
</script>
<?php $xxx=$result->c_d($_POST['nonas']);$tgl=$tanggal;$branch=$result->c_d($_POST['branch']);$hasil=$result->query_lap("SELECT a.id,a.norek,a.pokok,a.bunga,a.adm,a.jumlah FROM $tabelTagihan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.kdtran=111 AND a.branch='$branch' AND (b.no_aso_bank LIKE '%$xxx%' OR b.nocitra LIKE '%$xxx%' OR b.nopen LIKE '%$xxx%' OR a.norek LIKE '%$xxx%') ORDER BY a.norek LIMIT 1");$data=$result->row($hasil);$norek=$data['norek'];$fieldss='a.noreks,a.tbunga,a.flunas,a.ketnas,a.status_klaim';include 'config/_set_headerx.php';$id=$data['id'];$saldoa=$data['pokok'];$blunas=$data['bunga'];$alunas=$data['adm'];$jumlunas=$saldoa+$blunas+$alunas;$norekl='';$kode_cair=1;?>
<form id="masuk" name="masuk" method="POST" action="">
 	<input name="id" type="hidden" id="id" value="<?php echo $id;?>"/>
 	<input name="produk" type="hidden" id="produk" value="<?php echo $produk;?>"/>
	<input name="nama" type="hidden" id="nama" value="<?php echo $nama;?>"/>
	<input name="kdkop" type="hidden" id="kdkop" value="<?php echo $kdkop;?>"/>
	<table width="100%">
		<tr>
			<th colspan="6" class="ui-state-highlight">DATA DEBITUR</th>
		</tr>
		<?php include '_headerx.php';?>
		<tr>
			<td>&nbsp;</td>
			<td align="right">REALISASI DARI :</td>
			<td colspan="2">
			<select name="kode_cair" id="kode_cair" class="combobox">
				<?php $huruf = array("GIRO BTPN","PP ANGSURAN","TABUNGAN TASETO");$i = 0;
				while($i < 3){
					if($kode_cair== $i){
						echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
					}else{
						echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
					}
					$i++;
				} ?>
			</select>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right">POKOK ANGSURAN :</td>
			<td colspan="2">
				<input style="text-align:right" readonly name="saldoa" type="text" id="saldoa" maxlength="15" value="<?php echo number_format($saldoa); ?>" size="33"/>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right">BUNGA ANGSURAN :</td>
			<td colspan="2">
				<input style="text-align:right" readonly  name="blunas" type="text" id="blunas" maxlength="15" value="<?php echo number_format($blunas);?>" size="33"/>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right">ADM ANGSURAN :</td>
			<td colspan="2">
				<input style="text-align:right" readonly  name="alunas" type="text" id="alunas" maxlength="15" value="<?php echo number_format($alunas);?>" size="33"/>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td align="right"><strong>JUMLAH ANGSURAN :</strong></td>
			<td colspan="2">
				<input readonly style="text-align:right" name="jumlunas" type="text" id="jumlunas" maxlength="15" value="<?php echo number_format($jumlunas);?>" size="33"/>
			</td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center">
		<button type="button" id="simpan">Simpan</button>
		<button type="button" id="kembali" onclick="goKembali();">Batal</button>
	</div>
</form>
<div id="divPageList">
<?php include 'tabel_hasilx.php';?>
</div>