<thead>
	<tr><td colspan="19" align="center" style="font-weight: bold;"><?php echo $desc; ?></td></tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">KANTOR BAYAR</th>
		<th colspan="5">TIDAK TERTAGIH</th>
		<th colspan="6">SETORAN</th>
		<th colspan="6">NET TIDAK TERTAGIH</th>
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
	$jpokok4=0;$jbunga4=0;$jadm4=0;$jjumlah4=0;$jorg4=0;

	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gorg=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gorg1=0;
	$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gorg2=0;
	$gpokok3=0;$gbunga3=0;$gadm3=0;$gjumlah3=0;$gorg3=0;

	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$torg=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$torg1=0;
	$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$torg2=0;
	$tpokok3=0;$tbunga3=0;$tadm3=0;$tjumlah3=0;$torg3=0;
	$tpokok4=0;$tbunga4=0;$tadm3=0;$tjumlah4=0;$torg4=0;
	
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if($row['jumlah']>0){
		if ($vbayar!=$row['produk']){ 
			if($no>1){
				$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
				//$jml_saldoa2=($jjumlah/$jjumlah3)*100;
				//$jml_saldoa1=($jjumlah1/$jjumlah3)*100;
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>JUMLAH</strong></td>
					<td align="right"><?php echo formatrp($jpokok3);?></td>
					<td align="right"><?php echo formatrp($jbunga3);?></td>
					<td align="right"><?php echo formatrp($jadm3);?></td>
					<td align="right"><?php echo formatrp($jjumlah3);?></td>
					<td align="right"><?php echo formatrp($jorg3);?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jjumlah);?></td>
					<td align="right"><?php echo formatrp($jorg);?></td>
					<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
					<td align="right"><?php echo formatrp($jpokok1);?></td>
					<td align="right"><?php echo formatrp($jbunga1);?></td>
					<td align="right"><?php echo formatrp($jadm1);?></td>
					<td align="right"><?php echo formatrp($jjumlah1);?></td>
					<td align="right"><?php echo formatrp($jorg1);?></td>
					<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
				</tr><?php
				$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jorg3=0;
			}?>
			<tr><td colspan="19"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}?>
		<tr>
			<?php
			$jpokok2=$row['pokok2'];//-$row['pokok1'];
			if($jpokok2<0){
				//$jpokok2=0;
			}
			$jbunga2=$row['bunga2'];//-$row['bunga1'];
			if($jbunga2<0){
				//$jbunga2=0;
			}
			$jadm2=$row['adm2'];//-$row['adm1'];
			if($jadm2<0){
				//$jadm2=0;
			}
			$jjumlah2=$row['jumlah2'];//$jpokok2+$jbunga2+$jadm2;
			$jorg2=$row['rek2'];//-$row['rek1'];
			if($jorg2<0){
				//$jorg2=0;
			}
			$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
			$jml_saldoa1=($row['jumlah1']/$row['jumlah'])*100;
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
		$jpokok3=$jpokok3+$row['pokok'];
		$jbunga3=$jbunga3+$row['bunga'];
		$jadm3=$jadm3+$row['adm'];
		$jjumlah3=$jjumlah3+$row['jumlah'];
		$jorg3=$jorg3+$row['rek'];

		$jpokok=$jpokok+$row['pokok1'];
		$jbunga=$jbunga+$row['bunga1'];
		$jadm=$jadm+$row['adm1'];
		$jjumlah=$jjumlah+$row['jumlah1'];
		$jorg=$jorg+$row['rek1'];
		
		$jpokok1=$jpokok1+$jpokok2;
		$jbunga1=$jbunga1+$jbunga2;
		$jadm1=$jadm1+$jadm2;
		$jjumlah1=$jjumlah1+$jjumlah2;
		$jorg1=$jorg1+$jorg2;

		$tpokok3=$tpokok3+$row['pokok'];
		$tbunga3=$tbunga3+$row['bunga'];
		$tadm3=$tadm3+$row['adm'];
		$tjumlah3=$tjumlah3+$row['jumlah'];
		$torg3=$torg3+$row['rek'];

		$tpokok=$tpokok+$row['pokok1'];
		$tbunga=$tbunga+$row['bunga1'];
		$tadm=$tadm+$row['adm1'];
		$tjumlah=$tjumlah+$row['jumlah1'];
		$torg=$torg+$row['rek1'];
		
		$tpokok1=$tpokok1+$jpokok2;
		$tbunga1=$tbunga1+$jbunga2;
		$tadm1=$tadm1+$jadm2;
		$tjumlah1=$tjumlah1+$jjumlah2;
		$torg1=$torg1+$jorg2;

		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
		}
	}
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	$jml_saldoa2=($jjumlah/$jjumlah3)*100;
	$jml_saldoa1=($jjumlah1/$jjumlah3)*100;
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>JUMLAH</strong></td>
		<td align="right"><?php echo formatrp($jpokok3);?></td>
		<td align="right"><?php echo formatrp($jbunga3);?></td>
		<td align="right"><?php echo formatrp($jadm3);?></td>
		<td align="right"><?php echo formatrp($jjumlah3);?></td>
		<td align="right"><?php echo formatrp($jorg3);?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td align="right"><?php echo formatrp($jorg);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
		<td align="right"><?php echo formatrp($jpokok1);?></td>
		<td align="right"><?php echo formatrp($jbunga1);?></td>
		<td align="right"><?php echo formatrp($jadm1);?></td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right"><?php echo formatrp($jorg1);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
	</tr>
	<?php
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	$jml_saldoa2=($tjumlah/$tjumlah3)*100;
	$jml_saldoa1=($tjumlah1/$tjumlah3)*100;
	?>
	<tr>
		<td class="items" colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok3);?></td>
		<td align="right"><?php echo formatrp($tbunga3);?></td>
		<td align="right"><?php echo formatrp($tadm3);?></td>
		<td align="right"><?php echo formatrp($tjumlah3);?></td>
		<td align="right"><?php echo formatrp($torg3);?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm);?></td>
		<td align="right"><?php echo formatrp($tjumlah);?></td>
		<td align="right"><?php echo formatrp($torg);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa2,2);?></td>
		<td align="right"><?php echo formatrp($tpokok1);?></td>
		<td align="right"><?php echo formatrp($tbunga1);?></td>
		<td align="right"><?php echo formatrp($tadm1);?></td>
		<td align="right"><?php echo formatrp($tjumlah1);?></td>
		<td align="right"><?php echo formatrp($torg1);?></td>
		<td align="right"><?php echo formatrp($jml_saldoa1,2);?></td>
	</tr>
</tbody>