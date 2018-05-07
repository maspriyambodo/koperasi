<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>REKENING</th>
		<th>NAMA</th>
		<th>TGL TRANSAKSI</th>
		<th>JANGKA</th>
		<th>UMUR</th>
		<th>NOMINAL</th>
		<th>SALDO</th>
	</tr>
</thead>
<tbody>
	<?php
	$sawal=0;$sakhir=0;$no=1;$vbayar='';
	$tsawal=0;$tsakhir=0;
	while ($row=$result->row($hasil)){
		if ($vbayar<>$row['produk']){
			if ($no>1){
				?>
				<tr class="td" bgcolor="#e5e5e5"
				<td colspan="6">JUMLAH</td>
				<td align="right"><?php echo formatrp($sawal);?></td>
				<td align="right"><?php echo formatrp($sakhir);?></td>
				</tr>
				<?php
			}
			?>
			<tr><td colspan="8"><strong><?php echo $row['nmproduk']; ?></strong></td></tr>
			<?php
			$sawal=0;$sakhir=0;$no=1;
		}		
		?>
		<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['norek'];?></td>
		<td><?php echo $row['nama'];?></td>
		<td><?php echo date_sql($row['tgtran']);?></td>
		<td><?php echo $row['jangka'];?></td>
		<td><?php echo $row['umur'];?></td>
		<td align="right"><?php echo formatrp($row['nomi']);?></td>
		<td align="right"><?php echo formatrp($row['saldoa']);?></td>
		</tr>
		<?php
		$sawal=$sawal+$row['nomi'];
		$sakhir=$sakhir+$row['saldoa'];
		$tsawal=$tsawal+$row['nomi'];
		$tsakhir=$tsakhir+$row['saldoa'];
		$vbayar	=$row['produk'];
		$no++;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
	<td colspan="6">JUMLAH</td>
	<td align="right"><?php echo formatrp($sawal); ?></td>
	<td align="right"><?php echo formatrp($sakhir); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
	<td colspan="6">TOTAL</td>
	<td align="right"><?php echo formatrp($tsawal); ?></td>
	<td align="right"><?php echo formatrp($tsakhir); ?></td>
	</tr>
</tbody>