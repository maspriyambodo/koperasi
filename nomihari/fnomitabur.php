<thead>
	<tr>
		<th rowspan="2">NO</th>
		<th rowspan="2">JENIS TABUNGAN</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI KAS</th>
		<th colspan="2">MUTASI MEMORIAL</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">SALDO EFEKTIF</th>		
		<th rowspan="2">JML REK</th>
	</tr>
	<tr>
		<th>DEBET</th>
		<th>KREDIT</th>
		<th>DEBET</th>
		<th>KREDIT</th>
	</tr>
</thead>
<tbody>
	<?php
	$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;$efektif=0;
	$tsawal=0;$tkdebet=0;$tkkredit=0;$tmdebet=0;$tmkredit=0;$tsakhir=0;$torg=0;
	while ($row = $result->row($hasil)) { ?>
		<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nmproduk']; ?></td>
		<td align="right" width="10%"><?php echo formatrp($row['saldoawal']); ?></td>
		<td align="right"><?php echo formatrp($row['mutdebet']); ?></td>
		<td align="right"><?php echo formatrp($row['mutkredit']); ?></td>			
		<td align="right"><?php echo formatrp($row['memdebet']); ?></td>
		<td align="right"><?php echo formatrp($row['memkredit']); ?></td>			
		<td align="right"><?php echo formatrp($row['saldoakhir']); ?></td>
		<td align="right"><?php echo formatrp($row['efektif']); ?></td>
		<td align="right" width="5%"><?php echo $row['org']; ?></td>
		</tr>
		<?php
		$sawal=$sawal+$row['saldoawal'];
		$kdebet=$kdebet+$row['mutdebet'];
		$kkredit=$kkredit+$row['mutkredit'];
		$mdebet=$mdebet+$row['memdebet'];
		$mkredit=$mkredit+$row['memkredit'];
		$sakhir=$sakhir+$row['saldoakhir'];
		$efektif=$efektif+$row['efektif'];
		$org=$org+$row['org'];
		$no++;
	}
	?>
	<tr>
	<td colspan="2">JUMLAH</td>
	<td align="right"><?php echo formatrp($sawal); ?></td>
	<td align="right"><?php echo formatrp($kdebet); ?></td>
	<td align="right"><?php echo formatrp($kkredit); ?></td>
	<td align="right"><?php echo formatrp($mdebet); ?></td>
	<td align="right"><?php echo formatrp($mkredit); ?></td>
	<td align="right"><?php echo formatrp($sakhir); ?></td>
	<td align="right"><?php echo formatrp($efektif); ?></td>
	<td align="right"><?php echo formatrp($org); ?></td>
	</tr>
</tbody>
