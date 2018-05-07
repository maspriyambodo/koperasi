<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>JANGKA / UMUR</th>
		<th>JENIS PEMINJAM</th>
		<th>NOMINAL</th>
		<th>SALDO</th>
		<th>REKENING</th>
	</tr>
</thead>
<tbody>
	<?php
	$sawal=0;$sakhir=0;$org=0;$no=1;$vbayar='';
	$tsawal=0;$tsakhir=0;$torg=0;
	while ($row=$result->row($hasil)){
		if ($vbayar<>$row['kkbayar']){
			if ($no>1){
				?>
				<tr class="td" bgcolor="#e5e5e5">
				<td colspan="3" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($sawal); ?></td>
				<td align="right"><?php echo formatrp($sakhir); ?></td>
				<td align="right"><?php echo formatrp($org); ?></td>
				</tr>
				<?php
			}
			?>
			<tr><td colspan="6"><strong><?php echo $row['nmbayar']; ?></strong></td></tr>
			<?php
			$sawal=0;$sakhir=0;$org=0;$no=1;
		}		
		?>
		<tr>
		<td><?php echo $no; ?></td>
		<td align="left"><?php echo $row['jangka'].' BULAN - '.$row['umur'].' TAHUN';?></td>
		<td><?php echo $row['nmproduk']; ?></td>
		<td align="right"><?php echo formatrp($row['nomi']); ?></td>
		<td align="right"><?php echo formatrp($row['saldoa']); ?></td>
		<td align="right"><?php echo $row['org']; ?></td>
		</tr>
		<?php
		$sawal=$sawal+$row['nomi'];
		$sakhir=$sakhir+$row['saldoa'];
		$org=$org+$row['org'];
		$tsawal=$tsawal+$row['nomi'];
		$tsakhir=$tsakhir+$row['saldoa'];
		$torg=$torg+$row['org'];
		$vbayar=$row['kkbayar'];
		$no++;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($sawal); ?></td>
		<td align="right"><?php echo formatrp($sakhir); ?></td>
		<td align="right"><?php echo formatrp($org); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tsawal); ?></td>
		<td align="right"><?php echo formatrp($tsakhir); ?></td>
		<td align="right"><?php echo formatrp($torg); ?></td>
	</tr>
</tbody>
