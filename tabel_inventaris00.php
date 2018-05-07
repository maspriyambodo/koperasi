<?php include 'h_tetap.php';?>
<script type="text/javascript">
	$(document).ready(function () {
		$("#lookup_sandia").lookupbox({
			title: 'Daftar Rekening',
			url	 : 'lookup/lookup_sandi.php?chars=109',
			imgLoader: '<img src="images/load.gif">',
			onItemSelected: function(data)	{
				$('input[name=sandi_inventaris]').val(data.norek);
				$('input[name=nm_inventaris]').val(data.nama);
			},
			tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
		});
		$("#lookup_sandib").lookupbox({
			title: 'Daftar Rekening',
			url: 'lookup/lookup_sandi.php?chars=41110',
			imgLoader: '<img src="images/load.gif">',
			onItemSelected: function(data)	{
				$('input[name=sandi_biaya]').val(data.norek);
				$('input[name=nm_biaya]').val(data.nama);
			},
			tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
		});
		$("#lookup_sandic").lookupbox({
			title: 'Daftar Rekening',
			url: 'lookup/lookup_sandi.php?chars=110',
			imgLoader: '<img src="images/load.gif">',
			onItemSelected: function(data)	{
				$('input[name=sandi_penyusutan]').val(data.norek);
				$('input[name=nm_penyusutan]').val(data.nama);
			},
			tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
		});
		$("#lookup_sandid").lookupbox({
			title: 'Daftar Rekening',
			url: 'lookup/lookup_sandi.php?chars=1131',
			imgLoader: '<img src="images/load.gif">',
			onItemSelected: function(data)	{
				$('input[name=sandi_perolehan]').val(data.norek);
				$('input[name=nm_perolehan]').val(data.nama);
			},
			tableHeader: ['Branch','Nonas','Sufix','Norek','Produk','Nama']
		});
	});
</script>
<?php
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT * FROM akuntansi.prd_inventaris WHERE id='$id' LIMIT 1");
$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="70%">
		<input type="hidden" name="id" id="id" value="<?php echo $r['id'];?>"/>
		<tr>
			<td width="20%">Kode Golongan</td><td width="30%">: 
			<select name="kode_golongan" id="kode_golongan">
				<?php
				$huruf = array("I", "II", "III","IV");
				$i = 0;
				while ($i < 4) {
					if ($r['kode_golongan'] == $huruf[$i])
						echo "<option value='".$huruf[$i]."' selected>".$huruf[$i]."</option>";
					else
						echo "<option value='".$huruf[$i]."'>" . $huruf[$i]."</option>";
					$i++;
				}?>
			</select>
			</td>
		</tr>
		<tr>
			<td>Kode Inventaris</td>
			<td>: 
				<select name="kode_inventaris" id="kode_inventaris">
					<?php $kode_inventaris=$r['kode_inventaris'];
					$huruf = array("PILIHAN","PERALATAN KANTOR","PERALATAN MEUBEL","PERALATAN KOMPUTER","GEDUNG KANTOR","PERALATAN ELEKTRONIK","LAINNYA");$i = 0;
					while($i < 7){
						if($kode_inventaris== $i){
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
			<td>GL Inventaris</td>
			<td>: <input name="gl_perolehan" type="text" id="gl_perilehan" value="<?php echo $r['gl_perolehan'];?>" size="33" maxlength="6" readonly=""/><input type="button" value="" id="lookup_sandia" class="icon-filter"/><span id="nm_perolehan"></span>
			</td>
		</tr>
		<tr>	
			<td>GL Pembelian Barang</td>
			<td>: <input name="gl_pembelian" type="text" id="gl_pembelian" value="<?php echo $r['gl_pembelian'];?>" size="33" maxlength="6" readonly=""/><input type="button" value="" id="lookup_sandib" class="icon-filter"/><span id="nm_pembelian"></span>
			</td>
		</tr>
		<tr>	
			<td>GL Akumulasi Penyusutan</td>
			<td>: <input name="gl_akumulasi" type="text" id="gl_akumulasi" value="<?php echo $r['gl_akumulasi'];?>" size="33" maxlength="6" readonly=""/><input type="button" value="" id="lookup_sandic" class="icon-filter"/><span id="nm_akumulasi"></span>
			</td>
		</tr>
		<tr>	
			<td>GL Biaya Penyusutan</td>
			<td>: <input name="gl_biaya" type="text" id="gl_biaya" value="<?php echo $r['gl_biaya'];?>" size="33" maxlength="6" readonly=""/><input type="button" value="" id="lookup_sandid" class="icon-filter"/><span id="nm_biaya"></span>
			</td>
		</tr>
	</table>
</form>
</div>