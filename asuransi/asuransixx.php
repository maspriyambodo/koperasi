<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>NAMA ASURANSI</th>
		<th>JANGKA</th>
		<th>UMUR</th>
		<th>NOMINAL</th>
		<th>TENOR PREMI</th>
		<th>JUMLAH PREMI</th>
		<th>REKENING</th>
	</tr>
</thead>
<tbody>
	<?php
	$sawal=0;$sakhir=0;$org=0;$no=1;$vbayar='';
	$tsawal=0;$tsakhir=0;$torg=0;
	while ($row=$result->row($hasil)){
		if ($vbayar<>$row['produk']){
			if ($no>1){
				?>
				<tr class="td" bgcolor="#e5e5e5">
				<td colspan="4">JUMLAH</td>
				<td align="right"><?php echo formatrp($sawal); ?></td>
				<td align="right">&nbsp;</td>
				<td align="right"><?php echo formatrp($sakhir); ?></td>
				<td align="right"><?php echo formatrp($org); ?></td>
				</tr>
				<?php
			}
			?>
			<tr>
				<td colspan="8"><strong><?php echo $row['nmproduk']; ?></strong></td>
			</tr>
			<?php
			$sawal=0;$sakhir=0;$org=0;$no=1;
		}		
		?>
		<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['kdpremi'].' - '.$row['nama_asuransi']; ?></td>
		<td><?php echo $row['jangka']; ?></td>
		<td align="center"><?php echo $row['umur']; ?></td>
		<td align="right"><?php echo formatrp($row['nomi']); ?></td>
		<td align="center" width="10%"><?php echo $row['premi']; ?></td>
		<td align="right"><?php echo formatrp($row['jumpremi']); ?></td>
		<td align="right"><?php echo $row['org']; ?></td>
		</tr>
		<?php
		$sawal=$sawal+$row['nomi'];
		$sakhir=$sakhir+$row['jumpremi'];
		$org=$org+$row['org'];
		$tsawal=$tsawal+$row['nomi'];
		$tsakhir=$tsakhir+$row['jumpremi'];
		$torg=$torg+$row['org'];
		$vbayar=$row['produk'];
		$no++;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4">JUMLAH</td>
		<td align="right"><?php echo formatrp($sawal); ?></td>
		<td align="right">&nbsp;</td>
		<td align="right"><?php echo formatrp($sakhir); ?></td>
		<td align="right"><?php echo formatrp($org); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4">TOTAL</td>
		<td align="right"><?php echo formatrp($tsawal); ?></td>
		<td align="right">&nbsp;</td>
		<td align="right"><?php echo formatrp($tsakhir); ?></td>
		<td align="right"><?php echo formatrp($torg); ?></td>
	</tr>
</tbody>
