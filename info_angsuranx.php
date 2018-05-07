<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">REKENING</th>
	<th rowspan="2">URAIAN</th>
	<th rowspan="2">TANGGAL</th>
	<th colspan="2">MUTASI KAS</th>
	<th colspan="2">MUTASI MEMORIAL</th>
	<th rowspan="2">SALDO AKHIR</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody>
	<tr><td align="left" colspan="8">SALDO AWAL</td><td align="right"><?php echo formatrp($saldo); ?></td></tr><?php 
	$jpokok=0;$no=1;$vbayar="";
	$tpokok=0;$jumlah1=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;
	while ($row = $result->row($hasil)) { ?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td ><?php echo $row['norekgl']; ?></td>
			<td ><?php echo $row['keterangan']; ?></td>
			<td align="right"><?php echo $row['tanggal']; ?></td>
			<td align="right"><?php echo formatrp($row['debetkas']); ?></td>
			<td align="right"><?php echo formatrp($row['kreditkas']); ?></td>
			<td align="right"><?php echo formatrp($row['debetmemo']); ?></td>
			<td align="right"><?php echo formatrp($row['kreditmemo']); ?></td>
			<td align="right">
			<?php 
			if($kode=='D'){
				$saldo=($saldo+$row['debetkas']+$row['debetmemo'])-($row['kreditkas']+$row['kreditmemo']);
			}else{
				$saldo=($saldo+$row['kreditkas']+$row['kreditmemo'])-($row['debetkas']+$row['debetmemo']);
			}
			echo formatrp($saldo); 
			?>
			</td>
		</tr><?php 
		$kdebet=$kdebet+$row['debetkas'];
		$kkredit=$kkredit+$row['kreditkas'];
		$mdebet=$mdebet+$row['debetmemo'];
		$mkredit=$mkredit+$row['kreditmemo'];
		$no++;
	}?>
	 <tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center">JUMLAH </td>
		<td align="right"><?php echo formatrp($kdebet); ?></td>
		<td align="right"><?php echo formatrp($kkredit); ?></td>
		<td align="right"><?php echo formatrp($mdebet); ?></td>
		<td align="right"><?php echo formatrp($mkredit); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
</tbody>
