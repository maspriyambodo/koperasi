<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/newsaveblokir.js"></script>
<script type="text/javascript">
	var linkfile ='newsaveblokir.php';
	var linkfilem='newsavess.php?p=1';
</script>
<?php
$norek=$result->c_d($_POST['nonas']);$branch=$kcabang;
$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.kdaktif,a.saldoawal,a.saldoakhir,a.produk,a.saldoblokir,b.nama,b.noktp FROM $tabel_tabungan a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.norek='$norek' AND a.branch='$branch' ORDER BY norek");$row=$result->row($hasil);if($row['kdaktif']==0)$result->msg_error('Rekening Tidak Aktif Atau Disable !!!');if($row['kdaktif']>1)$result->msg_error('Rekening Sudah Di Tutup !!!');$sawal=$row['saldoawal'];$m=date_sql($tanggal);
$sakhir=$result->save_saldo($norek,$sawal);$sblokir=$result->save_blokir($norek);$sakhir=$sakhir-$sblokir;$jumlah=$sakhir;
?>
<form id="masuk" name="masuk" method="POST" action="" >
	<table align="center">
		<tr>
			<td width="25%">No Nasabah</td>
			<td>: <?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix'];?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td>: <?php echo $row['nama'];?></td>
		</tr>
		<tr>
			<td>No KTP</td>
			<td>: <?php echo $row['noktp'];?></td>
		</tr>
		<tr>
			<td>Tgl Awal</td>
			<td>: <input type="text" id="tgl1" name="tgl1" size="20" maxlength="10" value="<?php echo $tanggal;?>"/></td>
		</tr>
		<tr>
			<td>Tgl Akhir</td>
			<td>: <input type="text" id="tgl2" name="tgl2" size="20" maxlength="10" value="<?php echo $tanggal;?>"/></td>
		</tr>
		<tr>
			<td>Jumlah</td>
			<td>: <input style="text-align:right;" name="jumlah" type="text" id="jumlah" size="25" maxlength="15" value="<?php echo $jumlah;?>"/></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>: <input name="kete" type="text" id="kete" size="70" maxlength="60" onKeyUp="caps(this)"/></td>
		</tr>
	</table>
	<div class="ui-widget-content" align="center">
		<input type="submit" value="Simpan" id="submit" class="icon-save"/>
		<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
	</div>
	<input type="hidden" name="branch" id="branch" value="<?php echo $row['branch'];?>"/>
	<input type="hidden" name="nonas" id="nonas" value="<?php echo $row['nonas'];?>"/>
	<input type="hidden" name="sufix" id="sufix" value="<?php echo $row['sufix'];?>"/>
	<input type="hidden" name="norek" id="norek" value="<?php echo $row['norek'];?>"/>
	<input type="hidden" name="produk" id="produk" value="<?php echo $row['produk'];?>"/>
	<input type="hidden" name="sakhir" id="sakhir" value="<?php echo $sakhir;?>"/>
	<input type="hidden" name="sblokir" id="sblokir" value="<?php echo $sblokir;?>"/>
</form>