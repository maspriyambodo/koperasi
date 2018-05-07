<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>NAMA ASURANSI</th>
		<th>NOMINAL</th>
		<th>OUTSTANDING</th>
		<th>JML PENGAJUAN</th>
		<th>JML PENCAIRAN</th>
		<th>REK</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';$vproduk='';
	$jpokok0=0;$jbunga0=0;$jadm0=0;$jjumlah0=0;$jorg0=0;
	$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;
	$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;
	$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jorg3=0;
	$jpokok4=0;$jbunga4=0;$jadm4=0;$jjumlah4=0;$jorg4=0;

	$gpokok0=0;$gbunga0=0;$gadm0=0;$gjumlah0=0;$gorg0=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gorg1=0;
	$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gorg2=0;
	$gpokok3=0;$gbunga3=0;$gadm3=0;$gjumlah3=0;$gorg3=0;

	$tpokok0=0;$tbunga0=0;$tadm0=0;$tjumlah0=0;$torg0=0;
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
					<td align="right"><?php echo formatrp($jpokok0); ?></td>
					<td align="right"><?php echo formatrp($jpokok1); ?></td>
					<td align="right"><?php echo formatrp($jpokok2);?></td>
					<td align="right"><?php echo formatrp($jpokok3);?></td>
					<td align="right"><?php echo $jpokok4;?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($jbunga0); ?></td>
					<td align="right"><?php echo formatrp($jbunga1); ?></td>
					<td align="right"><?php echo formatrp($jbunga2);?></td>
					<td align="right"><?php echo formatrp($jbunga3);?></td>
					<td align="right"><?php echo $jbunga4;?></td>
				</tr>
				<?php
			}
			$jpokok0=0;$jpokok1=0;$jpokok2=0;$jpokok3=0;$jpokok4=0;$jbunga0=0;$jbunga1=0;$jbunga2=0;$jbunga3=0;$jbunga4=0;
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
						<td align="right"><?php echo formatrp($jpokok0); ?></td>
						<td align="right"><?php echo formatrp($jpokok1); ?></td>
						<td align="right"><?php echo formatrp($jpokok2);?></td>
						<td align="right"><?php echo formatrp($jpokok3);?></td>
						<td align="right"><?php echo $jpokok4;?></td>
					</tr>
					<?php
				}
				$jpokok0=0;$jpokok1=0;$jpokok2=0;$jpokok3=0;$jpokok4=0;
			}
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left" width="20%"><?php echo $row['nama_asuransi']; ?></td>
			<td align="right"><?php echo formatrp($row['nomi']);?></td>
			<td align="right"><?php echo formatrp($row['saldo']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah_klaim']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah_cair']);?></td>
			<td align="right"><?php echo formatrp($row['orang']);?></td>
		</tr><?php 
		$jpokok0 +=$row['nomi'];
		$jpokok1 +=$row['saldo'];
		$jpokok2 +=$row['jumlah_klaim'];
		$jpokok3 +=$row['jumlah_cair'];
		$jpokok4 +=$row['orang'];
		
		$jbunga0 +=$row['nomi'];
		$jbunga1 +=$row['saldo'];
		$jbunga2 +=$row['jumlah_klaim'];
		$jbunga3 +=$row['jumlah_cair'];
		$jbunga4 +=$row['orang'];
		
		$jadm0 +=$row['nomi'];
		$jadm1 +=$row['saldo'];
		$jadm2 +=$row['jumlah_klaim'];
		$jadm3 +=$row['jumlah_cair'];
		$jadm4 +=$row['orang'];
		
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
		<td align="right"><?php echo formatrp($jpokok0); ?></td>
		<td align="right"><?php echo formatrp($jpokok1); ?></td>
		<td align="right"><?php echo formatrp($jpokok2);?></td>
		<td align="right"><?php echo formatrp($jpokok3);?></td>
		<td align="right"><?php echo $jpokok4;?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($jbunga0); ?></td>
		<td align="right"><?php echo formatrp($jbunga1); ?></td>
		<td align="right"><?php echo formatrp($jbunga2);?></td>
		<td align="right"><?php echo formatrp($jbunga3);?></td>
		<td align="right"><?php echo $jbunga4;?></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($jadm0); ?></td>
		<td align="right"><?php echo formatrp($jadm1); ?></td>
		<td align="right"><?php echo formatrp($jadm2);?></td>
		<td align="right"><?php echo formatrp($jadm3);?></td>
		<td align="right"><?php echo $jadm4;?></td>
	</tr>
</tbody>