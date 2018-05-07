<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">BRANCH</th>
		<th rowspan="2">NO INVENTARIS</th>
		<th rowspan="2">NAMA INVENTARIS</th>
		<th rowspan="2">NILAI PEROLEHAN</th>
		<th rowspan="2">TANGGAL PEROLEHAN</th>
		<th rowspan="2">JUMLAH UNIT</th>
		<th rowspan="2">MASA MANFAAT</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI PENYUSUTAN</th>
		<th rowspan="2">SALDO AKHIR</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>DEBET</th>
		<th>KREDIT</th>
	</tr>
</thead>
<tbody>
<?php
$vbayar='';$vlunas='';$no=1;$golongan='';
$jml_sawal=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;
$grand_sawal=0;$grand_mdebet=0;$grand_mkredit=0;$grand_sakhir=0;
$total_sawal=0;$total_mdebet=0;$total_mkredit=0;$total_sakhir=0;
while ($row = $result->row($hasil)) {
	if ($vbayar!=$row['kode_inventaris']){ 
		if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td align="center" colspan="8"><strong>JUMLAH</strong></td>
				<td align="right"><?php echo number_format($jml_sawal); ?></td>
				<td align="right"><?php echo number_format($jml_mdebet); ?></td>
				<td align="right"><?php echo number_format($jml_mkredit); ?></td>
				<td align="right"><?php echo number_format($jml_sakhir); ?></td>
			</tr>
			<tr class="td" bgcolor="#e5e5e5">
				<td align="center" colspan="8"><strong>GRAND TOTAL</strong></td>
				<td align="right"><?php echo number_format($grand_sawal); ?></td>
				<td align="right"><?php echo number_format($grand_mdebet); ?></td>
				<td align="right"><?php echo number_format($grand_mkredit); ?></td>
				<td align="right"><?php echo number_format($grand_sakhir); ?></td>
			</tr><?php
		}
		$vbayar=$row['kode_inventaris'];
		$kode_inventaris=$row['kode_inventaris'];
		include '../help/ket_inventaris.php';
		$vnmbayar=$xkode_inventaris;?>
		<tr><td colspan="12"><strong><?php echo $vnmbayar;?></strong></td></tr>	
		<tr><td>&nbsp;</td><td colspan="12"><strong>GOLONGAN : <?php echo $row['golongan'];?></strong></td></tr><?php
		$jml_sawal=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;
		$grand_sawal=0;$grand_mdebet=0;$grand_mkredit=0;$grand_sakhir=0;
	}else{
		if($golongan<>$row['golongan']){?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="8"><strong>JUMLAH</strong></td>
				<td align="right"><?php echo number_format($jml_sawal); ?></td>
				<td align="right"><?php echo number_format($jml_mdebet); ?></td>
				<td align="right"><?php echo number_format($jml_mkredit); ?></td>
				<td align="right"><?php echo number_format($jml_sakhir); ?></td>
			</tr>
			<tr>
			<td>&nbsp;</td>
			<td colspan="11"><strong>GOLONGAN : <?php echo $row['golongan'];?></strong></td>
			</tr>
			<?php
			$jml_sawal=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;
		}
	}
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $row['branch'];?></td>
		<td><?php echo $row['no_inventaris'];?></td>
		<td><?php echo $row['nama_inventaris'];?></td>
		<td align="right"><?php echo number_format($row['nilai_perolehan']);?></td>
		<td ><?php echo date_sql($row['tgl_perolehan']);?></td>
		<td align="right"><?php echo $row['jumlah_unit'];?></td>
		<td align="right"><?php echo $row['masa_manfaat'];?>Tahun</td>
		<td align="right"><?php echo number_format($row['saldo_awal']); ?></td>
		<td align="right"><?php echo number_format($row['mutasi_debet']); ?></td>
		<td align="right"><?php echo number_format($row['mutasi_kredit']); ?></td>
		<td align="right"><?php echo number_format($row['saldo_akhir']); ?></td>
	</tr> <?php
	$jml_sawal=$jml_sawal+$row['saldo_awal'];
	$jml_mdebet=$jml_mdebet+$row['mutasi_debet'];
	$jml_mkredit=$jml_mkredit+$row['mutasi_kredit'];
	$jml_sakhir=$jml_sakhir+$row['saldo_akhir'];
	
	$grand_sawal=$grand_sawal+$row['saldo_awal'];
	$grand_mdebet=$grand_mdebet+$row['mutasi_debet'];
	$grand_mkredit=$grand_mkredit+$row['mutasi_kredit'];
	$grand_sakhir=$grand_sakhir+$row['saldo_akhir'];

	$total_sawal=$total_sawal+$row['saldo_awal'];
	$total_mdebet=$total_mdebet+$row['mutasi_debet'];
	$total_mkredit=$total_mkredit+$row['mutasi_kredit'];
	$total_sakhir=$total_sakhir+$row['saldo_akhir'];
	
	$vbayar=$row['kode_inventaris'];
	$kode_inventaris=$row['kode_inventaris'];
	$golongan=$row['golongan'];
	include '../help/ket_inventaris.php';
	$vnmbayar=$xkode_inventaris;
	$no++;
}?>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="8"><strong>JUMLAH</strong></td>
	<td align="right"><?php echo number_format($jml_sawal); ?></td>
	<td align="right"><?php echo number_format($jml_mdebet); ?></td>
	<td align="right"><?php echo number_format($jml_mkredit); ?></td>
	<td align="right"><?php echo number_format($jml_sakhir); ?></td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="8"><strong>JUMLAH</strong></td>
	<td align="right"><?php echo number_format($grand_sawal); ?></td>
	<td align="right"><?php echo number_format($grand_mdebet); ?></td>
	<td align="right"><?php echo number_format($grand_mkredit); ?></td>
	<td align="right"><?php echo number_format($grand_sakhir); ?></td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="8"><strong>TOTAL </strong>:</td>
	<td align="right"><?php echo number_format($total_sawal); ?></td>
	<td align="right"><?php echo number_format($total_mdebet); ?></td>
	<td align="right"><?php echo number_format($total_mkredit); ?></td>
	<td align="right"><?php echo number_format($total_sakhir); ?></td>
</tr>
</tbody>
