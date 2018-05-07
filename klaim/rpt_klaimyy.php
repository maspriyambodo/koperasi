<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>NAMA ASURANSI</th>
		<th>NOMINAL</th>
		<th>SALDO</th>
		<th>JUMLAH CAIR</th>
		<th>REK</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';$vproduk='';
	$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;
	$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;
	$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;
	$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jorg3=0;

	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gorg=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gorg1=0;
	$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gorg2=0;
	$gpokok3=0;$gbunga3=0;$gadm3=0;$gjumlah3=0;$gorg3=0;

	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$torg=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$torg1=0;
	$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$torg2=0;
	$tpokok3=0;$tbunga3=0;$tadm3=0;$tjumlah3=0;$torg3=0;
	
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jjumlah);?></td>
					<td align="right"><?php echo formatrp($jorg);?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gjumlah);?></td>
					<td align="right"><?php echo formatrp($gorg);?></td>
				</tr>
				<?php
			}
			$jpokok=0;$jbunga=0;$jjumlah=0;$jorg=0;$gpokok=0;$gbunga=0;$gjumlah=0;$gorg=0;
			?>
			<tr><td colspan="6"><strong><?php echo $row['nmproduk']; ?></strong></td></tr>
			<?php
		}
		if($no>1){
			if ($vlunas!=$row['jenis_klaim']){ 
				if ($vbayar==$row['produk']){
					?>
					<tr class="td" bgcolor="#e5e5e5">
						<td>&nbsp;</td>
						<td><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
						<td align="right"><?php echo formatrp($jpokok); ?></td>
						<td align="right"><?php echo formatrp($jbunga); ?></td>
						<td align="right"><?php echo formatrp($jjumlah);?></td>
						<td align="right"><?php echo formatrp($jorg);?></td>
						</tr>
						<?php
				}
				$jpokok=0;$jbunga=0;$jjumlah=0;$jorg=0;
			}
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left" width="20%"><?php echo $row['nama_asuransi']; ?></td>
			<td align="right"><?php echo formatrp($row['nomi']);?></td>
			<td align="right"><?php echo formatrp($row['saldo']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['orang']);?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['nomi'];
		$jbunga=$jbunga+$row['saldo'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$jorg=$jorg+$row['orang'];
		
		$gpokok=$gpokok+$row['nomi'];
		$gbunga=$gbunga+$row['saldo'];
		$gjumlah=$gjumlah+$row['jumlah'];
		$gorg=$gorg+$row['orang'];
		
		$tpokok=$tpokok+$row['nomi'];
		$tbunga=$tbunga+$row['saldo'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$torg=$torg+$row['orang'];
		
		$vbayar=$row['produk'];
		$vproduk=$row['nmproduk'];
		$vlunas=$row['jenis_klaim'];
		$jenis_klaim=$vlunas;
		include '../dist/_jenisklaim.php';
		$vnmbayar=$jenisklaim;
		$no++;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td align="right"><?php echo formatrp($jorg);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gpokok); ?></td>
		<td align="right"><?php echo formatrp($gbunga); ?></td>
		<td align="right"><?php echo formatrp($gjumlah);?></td>
		<td align="right"><?php echo formatrp($gorg);?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tjumlah);?></td>
		<td align="right"><?php echo formatrp($torg);?></td>
	</tr>
</tbody>