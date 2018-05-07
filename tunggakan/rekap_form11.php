<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>KANTOR BAYAR</th>
	<th>PLAFOND</th>
	<th>OBD</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>REKENING</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$jnomi=0;$jsaldoa=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;$tnomi=0;$tsaldoa=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){  ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center">JUMLAH</td>
					<td align="right"><?php echo formatrp($jnomi); ?></td>
					<td align="right"><?php echo formatrp($jsaldoa); ?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right"><?php echo formatrp($jumlah2); ?></td>
				</tr> <?php
				$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$jnomi=0;$jsaldoa=0;
			} ?>
			<tr><td colspan="9"><strong><?php echo ' JENIS PRODUK : '.$row['produk']; ?></strong></td></tr><?php
			$no=1;
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td ><?php echo $row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['nomi']); ?></td>
			<td align="right"><?php echo formatrp($row['saldoa']); ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['rekening']); ?></td>
		</tr><?php 
		$jnomi +=$row['nomi'];
		$jsaldoa +=$row['saldoa'];
		$jpokok +=$row['pokok'];
		$jbunga +=$row['bunga'];
		$jadm +=$row['adm'];
		$jumlah1 +=$row['jumlah'];
		$jumlah2 +=$row['rekening'];
		
		$tnomi +=$row['nomi'];
		$tsaldoa +=$row['saldoa'];
		$tpokok +=$row['pokok'];
		$tbunga +=$row['bunga'];
		$tadm +=$row['adm'];
		$tjumlah1 +=$row['jumlah'];
		$tjumlah2 +=$row['rekening'];
		
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jnomi); ?></td>
		<td align="right"><?php echo formatrp($jsaldoa); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td class="items" colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tnomi); ?></td>
		<td align="right"><?php echo formatrp($tsaldoa); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
	</tr>
</tbody>