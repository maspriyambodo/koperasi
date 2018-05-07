<thead>
	<tr><td colspan="19" align="center" style="font-weight: bold;"><?php echo $desc; ?></td></tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">KANTOR BAYAR</th>
		<th colspan="5">RENCANA TAGIHAN</th>
		<th colspan="6">REALISASI TAGIHAN</th>
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
		if ($vbayar!=$row['produk']){ 
			if($no>1){
				$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
				$jml_saldoa1=($jjumlah1/$jjumlah)*100;
				$jml_saldoa2=($jjumlah3/$jjumlah)*100;	?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>JUMLAH</strong></td>
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
					<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
					<td align="right"><?php echo formatrp($jpokok3);?></td>
					<td align="right"><?php echo formatrp($jbunga3);?></td>
					<td align="right"><?php echo formatrp($jadm3);?></td>
					<td align="right"><?php echo formatrp($jjumlah3);?></td>
					<td align="right"><?php echo formatrp($jorg3);?></td>
					<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jorg3=0;?>
			<tr><td colspan="19"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}?>
		<tr>
			<?php
			$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
			$jml_saldoa1=($row['jumlah1']/$row['jumlah'])*100;
			
			$jpokok2=$row['pokok']-$row['pokok1'];
			$jbunga2=$row['bunga']-$row['bunga1'];
			$jadm2=$row['adm']-$row['adm1'];
			$jjumlah2=$row['jumlah']-$row['jumlah1'];
			$jorg2=$row['rek']-$row['rek1'];
			$jml_saldoa2=($jjumlah2/$row['jumlah'])*100;
			?>
			<td ><?php echo $no; ?></td>
			<td align="left" width="20%"><?php echo $row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rek']);?></td>
			<td align="right"><?php echo formatrp($row['pokok1']);?></td>
			<td align="right"><?php echo formatrp($row['bunga1']);?></td>
			<td align="right"><?php echo formatrp($row['adm1']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah1']);?></td>
			<td align="right"><?php echo formatrp($row['rek1']);?></td>
			<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
			<td align="right"><?php echo formatrp($jpokok2);?></td>
			<td align="right"><?php echo formatrp($jbunga2);?></td>
			<td align="right"><?php echo formatrp($jadm2);?></td>
			<td align="right"><?php echo formatrp($jjumlah2);?></td>
			<td align="right"><?php echo formatrp($jorg2);?></td>
			<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$jorg=$jorg+$row['rek'];
		
		$jpokok1=$jpokok1+$row['pokok1'];
		$jbunga1=$jbunga1+$row['bunga1'];
		$jadm1=$jadm1+$row['adm1'];
		$jjumlah1=$jjumlah1+$row['jumlah1'];
		$jorg1=$jorg1+$row['rek1'];

		$jpokok3=$jpokok3+$jpokok2;
		$jbunga3=$jbunga3+$jbunga2;
		$jadm3=$jadm3+$jadm2;
		$jjumlah3=$jjumlah3+$jjumlah2;
		$jorg3=$jorg3+$jorg2;

		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$torg=$torg+$row['rek'];
		
		$tpokok1=$tpokok1+$row['pokok1'];
		$tbunga1=$tbunga1+$row['bunga1'];
		$tadm1=$tadm1+$row['adm1'];
		$tjumlah1=$tjumlah1+$row['jumlah1'];
		$torg1=$torg1+$row['rek1'];

		$tpokok3=$tpokok3+$jpokok2;
		$tbunga3=$tbunga3+$jbunga2;
		$tadm3=$tadm3+$jadm2;
		$tjumlah3=$tjumlah3+$jjumlah2;
		$torg3=$torg3+$jorg2;

		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	$jml_saldoa1=($jjumlah1/$jjumlah)*100;
	$jml_saldoa2=($jjumlah3/$jjumlah)*100;
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>JUMLAH</strong></td>
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
		<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
		<td align="right"><?php echo formatrp($jpokok3);?></td>
		<td align="right"><?php echo formatrp($jbunga3);?></td>
		<td align="right"><?php echo formatrp($jadm3);?></td>
		<td align="right"><?php echo formatrp($jjumlah3);?></td>
		<td align="right"><?php echo formatrp($jorg3);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
	</tr>
	<?php
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	$jml_saldoa1=($tjumlah1/$tjumlah)*100;
	$jml_saldoa2=($tjumlah3/$tjumlah)*100;
	?>
	<tr>
		<td class="items" colspan="2" align="center">TOTAL</td>
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
		<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
		<td align="right"><?php echo formatrp($tpokok3);?></td>
		<td align="right"><?php echo formatrp($tbunga3);?></td>
		<td align="right"><?php echo formatrp($tadm3);?></td>
		<td align="right"><?php echo formatrp($tjumlah3);?></td>
		<td align="right"><?php echo formatrp($torg3);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
	</tr>
</tbody>