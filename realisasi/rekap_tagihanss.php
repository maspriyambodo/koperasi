<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th>NAMA</th>
		<th>NOREK</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>KET TIDAK DITAGIH</th>
		<th>SOLUSI PENAGIHAN</th>
		<th>NAMA SALES</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
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
				$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
				$jml_saldoa1=($jjumlah1/$jjumlah)*100;
				$jml_saldoa2=($gjumlah1/$gjumlah)*100;
				$jml_saldoa3=($tjumlah1/$tjumlah)*100;
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td colspan="2"><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jjumlah);?></td>
					<td colspan="3">&nbsp;</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm);?></td>
					<td align="right"><?php echo formatrp($gjumlah);?></td>
					<td colspan="3">&nbsp;</td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gorg=0;?>
			<tr><td colspan="10"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){
					?>
					<tr class="td" bgcolor="#e5e5e5">
						<td>&nbsp;</td>
						<td colspan="2"><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
						<td align="right"><?php echo formatrp($jpokok); ?></td>
						<td align="right"><?php echo formatrp($jbunga); ?></td>
						<td align="right"><?php echo formatrp($jadm);?></td>
						<td align="right"><?php echo formatrp($jjumlah);?></td>
						<td colspan="3">&nbsp;</td>
					</tr><?php
				}
				$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;;
			}
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left"><?php echo $row['norek']; ?></td>
			<td align="left"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="left"><?php $alasan_tt=$row['alasan_tt'];include '../help/alasan_tt.php';echo $xalasan_tt; ?></td>
			<td align="left"><?php echo $row['solusi_tt']; ?></td>
			<td align="left"><?php echo $row['namas']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah=$jjumlah+$row['jumlah'];
		
		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gjumlah=$gjumlah+$row['jumlah'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		
		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	$jml_saldoa1=($jjumlah1/$jjumlah)*100;
	$jml_saldoa2=($gjumlah1/$gjumlah)*100;
	$jml_saldoa3=($tjumlah1/$tjumlah)*100;
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td colspan="2"><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gpokok); ?></td>
		<td align="right"><?php echo formatrp($gbunga); ?></td>
		<td align="right"><?php echo formatrp($gadm);?></td>
		<td align="right"><?php echo formatrp($gjumlah);?></td>
		<td colspan="3">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td class="items" colspan="3" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm);?></td>
		<td align="right"><?php echo formatrp($tjumlah);?></td>
		<td colspan="3">&nbsp;</td>
	</tr>
</tbody>