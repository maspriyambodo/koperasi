<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">KANTOR BAYAR</th>
		<th colspan="5">RENCANA TAGIHAN</th>
		<th colspan="6">TIDAK TERTAGIH</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>REK</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>REK</th>
		<th>%</th>
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
	
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if($row['pokok3']+$row['bunga3']+$row['adm3']>0){
		if ($vbayar!=$row['produk']){ 
			if($no>1){
				$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
				$jml_saldoa1=($jjumlah1/$jjumlah)*100;
				$jml_saldoa2=($jjumlah2/$jjumlah)*100;
				$jml_saldoa3=($jjumlah3/$jjumlah)*100;
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jjumlah);?></td>
					<td align="right"><?php echo formatrp($jorg);?></td>
					<td align="right"><?php echo formatrp($jpokok1);?></td>
					<td align="right"><?php echo formatrp($jbunga1);?></td>
					<td align="right"><?php echo formatrp($jadm1);?></td>
					<td align="right"><?php echo formatrp($jjumlah1);?></td>
					<td align="right"><?php echo formatrp($jorg1);?></td>
					<td align="right"><?php echo formatrp($jml_saldoa1,2);?>%</td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jorg3=0;?>
			<tr><td colspan="13"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}
		$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
		$jml_saldoa1=($row['jumlah1']/$row['jumlah'])*100;
		$jml_saldoa2=($row['jumlah2']/$row['jumlah'])*100;
		$jml_saldoa3=($row['jumlah3']/$row['jumlah'])*100;
		?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left" width="20%"><?php echo $row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rek']);?></td>
			<td align="right"><?php echo formatrp($row['pokok3']);?></td>
			<td align="right"><?php echo formatrp($row['bunga3']);?></td>
			<td align="right"><?php echo formatrp($row['adm3']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah3']);?></td>
			<td align="right"><?php echo formatrp($row['rek3']);?></td>
			<td align="right"><?php echo formatrp($jml_saldoa3,2);?>%</td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$jorg=$jorg+$row['rek'];
		
		$jpokok1=$jpokok1+$row['pokok3'];
		$jbunga1=$jbunga1+$row['bunga3'];
		$jadm1=$jadm1+$row['adm3'];
		$jjumlah1=$jjumlah1+$row['jumlah3'];
		$jorg1=$jorg1+$row['rek3'];

		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gjumlah=$gjumlah+$row['jumlah'];
		$gorg=$gorg+$row['rek'];
		
		$gpokok1=$gpokok1+$row['pokok3'];
		$gbunga1=$gbunga1+$row['bunga3'];
		$gadm1=$gadm1+$row['adm3'];
		$gjumlah1=$gjumlah1+$row['jumlah3'];
		$gorg1=$gorg1+$row['rek3'];

		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$torg=$torg+$row['rek'];
		
		$tpokok1=$tpokok1+$row['pokok3'];
		$tbunga1=$tbunga1+$row['bunga3'];
		$tadm1=$tadm1+$row['adm3'];
		$tjumlah1=$tjumlah1+$row['jumlah3'];
		$torg1=$torg1+$row['rek3'];

		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
		}
	}
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	$jml_saldoa1=($jjumlah1/$jjumlah)*100;
	$jml_saldoa2=($gjumlah1/$gjumlah)*100;
	$jml_saldoa3=($tjumlah1/$tjumlah)*100;
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>JUMLAH : <?php echo $vnmbayar;?> </strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td align="right"><?php echo formatrp($jorg);?></td>
		<td align="right"><?php echo formatrp($jpokok1);?></td>
		<td align="right"><?php echo formatrp($jbunga1);?></td>
		<td align="right"><?php echo formatrp($jadm1);?></td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right"><?php echo formatrp($jorg1);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa1,2);?>%</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm);?></td>
		<td align="right"><?php echo formatrp($tjumlah);?></td>
		<td align="right"><?php echo formatrp($torg);?></td>
		<td align="right"><?php echo formatrp($tpokok1);?></td>
		<td align="right"><?php echo formatrp($tbunga1);?></td>
		<td align="right"><?php echo formatrp($tadm1);?></td>
		<td align="right"><?php echo formatrp($tjumlah1);?></td>
		<td align="right"><?php echo formatrp($torg1);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa3,2);?>%</td>
	</tr>
</tbody>