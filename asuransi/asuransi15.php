<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>REKENING</th>
		<th>NAMA</th>
		<th>NAMA ASURANSI</th>
		<th>NO PREMI</th>
		<th>JANGKA</th>
		<th>UMUR</th>
		<th>NOMINAL</th>
		<th>SALDO</th>
		<th>TARIF PREMI</th>
		<th>JUMLAH PREMI</th>
	</tr>
</thead>
<tbody>
	<?php
	$no=1;$vbayar='';
	$sawal=0;$sakhir=0;$jumlah1=0;
	$tsawal=0;$tsakhir=0;$jumlah2=0;
	while ($row=$result->row($hasil)){
		if ($vbayar<>$row['produk']){
			if ($no>1){
				?>
				<tr>
				<td colspan="7">JUMLAH</td>
				<td align="right"><?php echo formatrp($sawal);?></td>
				<td align="right"><?php echo formatrp($jumlah1);?></td>
				<td align="right">&nbsp;</td>
				<td align="right"><?php echo formatrp($sakhir);?></td>
				</tr>
				<?php
			}
			?>
			<tr><td colspan="11"><strong><?php echo $row['nmproduk']; ?></strong></td></tr>
			<?php
			$sawal=0;$sakhir=0;$no=1;$jumlah1=0;
		}		
		?>
		<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['norek']; ?></td>
		<td width="20%"><?php echo $row['nama']; ?></td>
		<td><?php echo $row['nama_asuransi']; ?></td>
		<td><?php echo $row['nopremi']; ?></td>
		<td><?php echo $row['jangka']; ?></td>
		<td><?php echo $row['umur']; ?></td>
		<td align="right"><?php echo formatrp($row['nomi']); ?></td>
		<td align="right"><?php echo formatrp($row['saldoa']); ?></td>
		<td align="center" width="10%"><?php echo $row['premi']; ?></td>
		<td align="right"><?php echo formatrp($row['jumpremi']); ?></td>
		</tr>
		<?php
		$sawal +=$row['nomi'];
		$sakhir +=$row['jumpremi'];
		$jumlah1 +=$row['saldoa'];
		$tsawal +=$row['nomi'];
		$tsakhir +=$row['jumpremi'];
		$jumlah2 +=$row['saldoa'];
		$vbayar	=$row['produk'];
		$no++;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
	<td colspan="7">JUMLAH</td>
	<td align="right"><?php echo formatrp($sawal); ?></td>
	<td align="right"><?php echo formatrp($jumlah1); ?></td>
	<td align="right">&nbsp;</td>
	<td align="right"><?php echo formatrp($sakhir); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
	<td colspan="7">TOTAL</td>
	<td align="right"><?php echo formatrp($tsawal); ?></td>
	<td align="right"><?php echo formatrp($jumlah2); ?></td>
	<td align="right">&nbsp;</td>
	<td align="right"><?php echo formatrp($tsakhir); ?></td>
	</tr>
</tbody>