<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/lookup_sandi.js"></script>
<script TYPE="text/javascript">
	$(function(){
		$('#bprovisi').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:2});
		$('#badm').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:2});
		$('#bpremi').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit:2});
		$('#mplafon').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.',centsLimit:2});
		$('#bmeterai').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator: '.',centsLimit:0});
		$('#bbtl').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit:2});
		$('#flunas').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit:2});
		$('#suku').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit:2});
		$('#bdenda').priceFormat({prefix: '', centsSeparator: ',', thousandsSeparator: '.', centsLimit:2});
	});		
</script>
<?php 
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT * FROM $tabel_produk WHERE id='$id' ORDER BY kdproduk");$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['ID'];?>"/>
	<tr>
		<td width="20%">Kode Produk</td>
		<td colspan="3">:
		<?php 
		if($r['KDPRODUK']==''){ ?>
			<input type="text" name="kdproduk" id="kdproduk" maxlength="3" placeholder="Kode Produk" value="<?php echo $r['KDPRODUK'];?>"/><?php
		}else{ ?>
			<input type="text" name="kdproduk" id="kdproduk" maxlength="3" placeholder="Kode Produk" value="<?php echo $r['KDPRODUK'];?>" readonly/><?php
		}
		?>		
		<input type="text" name="nmproduk" id="nmproduk" size="70" maxlength="30" placeholder="Nama Produk Kredit" value="<?php echo $r['NMPRODUK'];?>"/>
		</td>
	</tr>
	<tr>
		<td width="20%">Maximal Umur</td>
		<td width="30%">: <input type="text" name="bumur" id="bumur" maxlength="6" placeholder="Batas Usia Debitur" value="<?php echo $r['BUMUR'];?>" style="text-align:right"/></td>
		<td width="20%">GL Pokok Angsuran</td>
		<td width="30%">: <input type="text" name="spokok" id="spokok" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SPOKOK'];?>" style="text-align:right"/><input type="button" value="" id="sandi_pokok" class="icon-filter"/>
		</td>
	</tr>
	<tr>
		<td>Suku Bunga</td>
		<td>: <input type="text" name="suku" id="suku" maxlength="6" placeholder="%" value="<?php echo  $r['SUKU'];?>" style="text-align:right"/></td>
		<td>GL Bunga</td>
		<td>: <input type="text" name="sbunga" id="sbunga" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SBUNGA'];?>" style="text-align:right"/><input type="button" value="" id="sandi_bunga" class="icon-filter"/>
		</td>
	</tr>	
	<tr>
		<td>Biaya BTL</td>
		<td>: <input type="text" name="bbtl" id="bbtl" maxlength="6" placeholder="%" value="<?php echo $r['BBTL'];?>" style="text-align:right" /></td>
		<td>GL Blokir Pinjaman</td>
		<td>: <input type="text" name="sbtl" id="sbtl" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SBTL'];?>" style="text-align:right" /><input type="button" value="" id="sandi_blokir" class="icon-filter"/></td>	
	</tr>	
	<tr>
		<td>Biaya Administrasi</td>
		<td>: <input type="text" name="badm" id="badm" maxlength="6" placeholder="%" value="<?php echo $r['BADM'];?>" style="text-align:right" /></td>
		<td>GL Administrasi</td>
		<td>: <input type="text" name="sadm" id="sadm" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SADM'];?>" style="text-align:right"/><input type="button" value="" id="sandi_administrasi" class="icon-filter"/></td>	
	</tr>	
	<tr>
		<td>Biaya Provisi</td>
		<td>: <input type="text" name="bprovisi" id="bprovisi" maxlength="6" placeholder="%" value="<?php echo $r['BPROVISI'];?>" style="text-align:right" /></td>
		<td>GL Provisi</td>
		<td>: <input type="text" name="sprovisi" id="sprovisi" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SPROVISI'];?>" style="text-align:right"/><input type="button" value="" id="sandi_provisi" class="icon-filter"/></td>
	</tr>	
	<tr>
		<td>Biaya Meterai</td>
		<td>: <input type="text" name="bmeterai" id="bmeterai" maxlength="10" placeholder="%" value="<?php echo $r['BMETERAI'];?>" style="text-align:right"/></td>
		<td>GL Meterai</td>
		<td>: <input type="text" name="smeterai" id="smeterai" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SMETERAI'];?>" style="text-align:right"/><input type="button" value="" id="sandi_meterai" class="icon-filter"/></td>
	</tr>
	<tr>
		<td>Biaya Premi</td>
		<td>: <input type="text" name="bpremi" id="bpremi" maxlength="6" placeholder="%" value="<?php echo $r['BPREMI'];?>" style="text-align:right" /></td>
		<td>GL Premi</td>
		<td>: <input type="text" name="spremi" id="spremi" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SPREMI'];?>" style="text-align:right"/><input type="button" value="" id="sandi_premi" class="icon-filter"/></td>
	</tr>	
	<tr>
		<td>Biaya Denda</td>
		<td>: <input type="text" name="bdenda" id="bdenda" maxlength="6" placeholder="%" value="<?php echo $r['BDENDA'];?>" style="text-align:right"/></td>
		<td>GL Denda</td>
		<td>: <input type="text" name="sdenda" id="sdenda" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SDENDA'];?>" style="text-align:right"/><input type="button" value="" id="sandi_denda" class="icon-filter"/></td>
	</tr>	
	<tr>
		<td>Finalty Pelunasan</td>
		<td>: <input type="text" name="flunas" id="flunas" maxlength="6" placeholder="%" value="<?php echo $r['FLUNAS'];?>" style="text-align:right"/></td>
		<td>GL Finalty</td>
		<td>: <input type="text" name="glfinalti" id="glfinalti" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['GLFINALTI'];?>" style="text-align:right"/><input type="button" value="" id="sandi_finalti" class="icon-filter"/></td>
	</tr>
	<tr>
		<td>Maximal Plafon</td>
		<td>: <input type="text" name="mplafon" id="mplafon" maxlength="6" placeholder="% Dari Pendapatan" value="<?php echo $r['MPLAFON'];?>" style="text-align:right"/></td>
		
		<td>GL Bunga Pelunasan</td>
		<td>: <input type="text" name="slunas" id="slunas"  maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SLUNAS'];?>" style="text-align:right"/><input type="button" value="" id="sandi_pelunasan" class="icon-filter"/></td>
	</tr>	
	<tr>
		<td>Batas Tagihan</td>
		<td>: <input type="text" name="btagih" id="btagih"  maxlength="2" placeholder="Tgl Proses Tagihan" value="<?php echo $r['BTAGIH'];?>" style="text-align:right" /></td>
		<td>GL Refun Premi</td>
		<td>: <input type="text" name="srefund" id="srefund" maxlength="6" placeholder="GL Akuntansi" value="<?php echo $r['SREFUND'];?>" style="text-align:right" /><input type="button" value="" id="sandi_refund" class="icon-filter"/></td>
	</tr>
	<tr>
		<td width="20%">Skim Tagihan</td>
		<td width="30%">: 
		<select name="kdkop" id="kdkop">
			<?php 
			$huruf = array("BULANAN", "HARIAN", "MINGGUAN");$i=0;$x=1;
			while ($i < 3) {
				if ($r['HTAGIH'] == $x)
					echo "<option value='".$x."' selected>".$huruf[$i]."</option>";
				else
					echo "<option value='".$x."'>".$huruf[$i]."</option>";
				$i++;
				$x++;
			}
			?>
		</select>
		</td>
		<td width="20%">Skim Bunga</td>
		<td width="30%">: 
		<select name="hbunga" id="hbunga">
			<?php 
			$huruf = array("FLAT","ANUITAS", "MENURUN");$i=0;$x=1;
			while ($i < 3) {
				if ($r['HBUNGA'] == $x)
					echo "<option value='".$x."' selected>".$huruf[$i]."</option>";
				else
					echo "<option value='".$x."'>".$huruf[$i]."</option>";
				$i++;$x++;
			}
			?>
		</select>
		</td>
	</tr>
	</table>
</form>
</div>