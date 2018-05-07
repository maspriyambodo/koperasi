<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
$(function(){
	$('#bunga1').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:2});
	$('#bunga2').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator:'.',centsLimit:2});
	$('#bunga3').priceFormat({prefix: '', centsSeparator: ',',thousandsSeparator: '.',centsLimit: 2});
	$('#saldo1').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#saldo2').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#saldo3').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#saldo4').priceFormat({prefix: '',centsSeparator: ',',thousandsSeparator: '.', centsLimit: 0});
	$('#sminimum').priceFormat({prefix:'',centsSeparator: ',',thousandsSeparator: '.',centsLimit: 0});
	$('#sawal').priceFormat({prefix:'',centsSeparator:',',thousandsSeparator: '.', centsLimit: 0});
});		
</script>
<?php
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT * FROM $tabel_produkt WHERE id='$id' ORDER BY kdproduk");$r= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
	<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $r['ID'];?>"/>
	<tr>
		<td>Kode Produk</td>
		<td colspan="3">: 
		<?php 
		if($r['KDPRODUK']==''){ ?>
			<input type="text" name="kdproduk" id="kdproduk" maxlength="3" placeholder="Kode Produk" value="<?php echo $r['KDPRODUK'];?>"/><?php
		}else{ ?>
			<input type="text" name="kdproduk" id="kdproduk" maxlength="3" placeholder="Kode Produk" value="<?php echo $r['KDPRODUK'];?>" readonly/><?php
		}
		?>
		<input type="text" name="nmproduk" id="nmproduk" size="70" maxlength="30" placeholder="Nama Produk Tabungan" value="<?php echo  $r['NMPRODUK'];?>"/>
		</td>		
	</tr>
	<tr>
		<td width="20%">Biaya Administrasi</td>
		<td width="30%">: <input type="text" name="adm" id="adm" placeholder="Nominal" maxlength="10" value="<?php echo $r['ADM'];?>" style="text-align:right" /></td>
		<td width="20%">Skim Bunga</td>
		<td width="30%">: 	
			<select name="hbunga" id="hbunga" >
			<?php
			$huruf = array("NON BUNGA","HARIAN","BULANAN");
			$i = 0;
			while ($i<3) {
				if ($r['HBUNGA']==$huruf[$i])
					echo "<option value='" .$i. "' selected>" . $huruf[$i] . "</option>";
				else
					echo "<option value='" .$i. "'>" . $huruf[$i] . "</option>";
				$i++;
			}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Saldo Minimal</td>
		<td>: <input type="text" name="sminimum" id="sminimum" placeholder="Nominal" maxlength="10" value="<?php echo $r['SMINIMUM'];?>" style="text-align:right" /></td>
		<td>Setoran Awal</td>
		<td>: <input type="text" name="sawal" id="sawal" placeholder="Nominal" maxlength="10" value="<?php echo $r['SAWAL'];?>" style="text-align:right" /></td>

	</tr>
	<tr>				
		<td>Suku Bunga I</td>
		<td>: <input type="text" name="bunga1" id="bunga1" placeholder="%" value="<?php echo $r['BUNGA1'];?>" style="text-align:right" /></td>
		<td>Saldo Bunga I</td>
		<td>: <input type="text" name="saldo1" id="saldo1" placeholder="Nominal" maxlength="13" value="<?php echo $r['SALDO1'];?>" style="text-align:right" /></td>
	</tr>
	<tr>		
		<td>Suku Bunga II</td>
		<td>: <input type="text" name="bunga2" id="bunga2" placeholder="%" value="<?php echo $r['BUNGA2'];?>" style="text-align:right" /></td>
		<td>Saldo Bunga II</td>
		<td>: <input type="text" name="saldo2" id="saldo2" placeholder="Nominal" maxlength="13" value="<?php echo $r['SALDO2'];?>" style="text-align:right" /></td>
	</tr>
	<tr>		
		<td>Suku Bunga III</td>
		<td>: <input type="text" name="bunga3" id="bunga3" placeholder="%" value="<?php echo $r['BUNGA3'];?>" style="text-align:right" /></td>
		<td>Saldo Bunga III</td>
		<td>: <input type="text" name="saldo3" id="saldo3" placeholder="Nominal" maxlength="13" value="<?php echo $r['SALDO3'];?>" style="text-align:right" /></td>
	</tr>
	<tr>	
		<td>Suku Bunga IV</td>
		<td>: <input type="text" name="bunga4" id="bunga4" placeholder="%" value="<?php echo $r['BUNGA4'];?>" style="text-align:right"/></td>		
		<td>GL Bunga</td>
		<td>: <input type="text" name="sbunga" id="sbunga" placeholder="GL Akuntansi"  maxlength="6"  value="<?php echo $r['SBUNGA'];?>" style="text-align:right" /></td>
	</tr>
	<tr>		
		<td>GL Administrasi</td>
		<td>: <input type="text" name="sadm" id="sadm" placeholder="GL Akuntansi" maxlength="6" value="<?php echo $r['SADM'];?>" style="text-align:right" /></td>
		<td>GL Tabungan</td>
		<td>: <input type="text" name="gssl" id="gssl" placeholder="GL Akuntansi" maxlength="6" value="<?php echo $r['GSSL'];?>" style="text-align:right" /></td>	
	</tr>	
	<tr>
		<td>GL Tutup Tabungan</td>
		<td>: <input type="text" name="stutup" id="stutup" placeholder="GL Akuntansi" value="<?php echo $r['STUTUP'];?>" style="text-align:right" /></td>
		<td>Saldo Kena Pajak</td>
		<td>: <input type="text" name="saldo4" id="saldo4" placeholder="Nominal" value="<?php echo $r['SALDO4'];?>" style="text-align:right" /></td>
	</tr>
	<tr>		
		<td>GL Pajak</td>
		<td>: <input type="text" name="spajak" id="spajak" placeholder="GL Akuntansi"  maxlength="6"  value="<?php echo $r['SPAJAK'];?>" style="text-align:right" /></td>
		<td colspan="2">&nbsp;</td>
	</tr>
	</table>
</form>
</div>