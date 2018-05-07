<?php $xkdkop=ket_tagih($kdkop);$xkolek=ket_kolek($kolek);$nmproduk=$result->produk_kredit($produk);?>
<input name="branch" type="hidden" id="branch" value="<?php echo $branch; ?>"/>
<input name="nonas" type="hidden" id="nonas" value="<?php echo $nonas;?>"/>
<input name="sufixl" type="hidden" id="sufixl" value="<?php echo $sufix; ?>"/>
<input name="sufix" type="hidden" id="sufix" value="<?php echo $sufix; ?>"/>
<input name="norek" type="hidden" id="norek" value="<?php echo $norek;?>"/>
<input name="norekl" type="hidden" id="norekl" value="<?php echo $norekl;?>"/>
<input name="noktp" type="hidden" id="noktp" value="<?php echo $noktp;?>"/>
<input name="tglahir" type="hidden" id="tglahir" value="<?php echo $tglahir;?>"/>
<tr class="ui-state-error">
	<td width="15%">Nama</td>
	<td width="35%">: <?php echo $nama;?></td>
	<td width="15%">No Nasabah</td>
	<td width="35%">: <?php echo $branch.'-'.$nonas.'-'.$sufix;?></td>
</tr>
<tr class="ui-state-error">
	<td>Alamat</td>
	<td colspan="3">: <?php echo $alamat.' KEL '.$lurah.' KEC '.$camat;?></td>
</tr>
<tr class="ui-state-error">
	<td>No Rekening</td>
	<td>: <?php echo $norek.' / Nopen : '.$nopen;?></td>
	<td>No KTP</td>
	<td>: <?php echo $noktp;?></td>
</tr>
<tr class="ui-state-error">
	<td>Tgl Lahir</td>
	<td>: <?php echo $tglahir.' [ UMUR '.$umur.' Tahun ]';?></td>
	<td>Tanggal Pinjam</td>
	<td>: <?php echo $tgtran.' [ Nominal : '.number_format($nomi).' / '.$jangka.' ]';?></td>
</tr>
<tr class="ui-state-error">
	<td>Skim Tagihan</td>
	<td>: <?php echo $xkdkop.' [ Bunga : '.$suku.' % ] '.' [ KOLEK : '.$xkolek.' ]';?></td>
	<td>Saldo Pinjaman</td>
	<td>: <?php echo number_format($saldox);?></td>
</tr>
<tr class="ui-state-error">
	<td>Jenis Produk</td>
	<td>: <?php echo '[ '.$produk. ' ] '.$nmproduk;?></td>
	<td>Kantor Bayar</td>
	<td>: <?php echo '[ '.$kkbayar.' ] '.$nmbayar;?></td>
</tr>