<thead>
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

	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gorg=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gorg1=0;
	$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gorg2=0;

	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$torg=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$torg1=0;
	$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$torg2=0;
	while ($row=$result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){
				$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
				if($jjumlah1>0){
					$jml_saldoa1=($jjumlah1/$jjumlah)*100;
				}else{
					$jml_saldoa1=0;
				}
				if($jjumlah2>0){
					$jml_saldoa2=($jjumlah2/$jjumlah)*100;
				}else{
					$jml_saldoa2=0;
				}
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td><strong>JUMLAH</strong></td>
					<td align="right"><?php echo number_format($jpokok); ?></td>
					<td align="right"><?php echo number_format($jbunga); ?></td>
					<td align="right"><?php echo number_format($jadm);?></td>
					<td align="right"><?php echo number_format($jjumlah);?></td>
					<td align="right"><?php echo number_format($jorg);?></td>
					<td align="right"><?php echo number_format($jpokok1);?></td>
					<td align="right"><?php echo number_format($jbunga1);?></td>
					<td align="right"><?php echo number_format($jadm1);?></td>
					<td align="right"><?php echo number_format($jjumlah1);?></td>
					<td align="right"><?php echo number_format($jorg1);?></td>
					<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
					<td align="right"><?php echo number_format($jpokok2);?></td>
					<td align="right"><?php echo number_format($jbunga2);?></td>
					<td align="right"><?php echo number_format($jadm2);?></td>
					<td align="right"><?php echo number_format($jjumlah2);?></td>
					<td align="right"><?php echo number_format($jorg2);?></td>
					<td align="right"><?php echo number_format($jml_saldoa2,2);?></td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;
			$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;
			$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;
			?>
			<tr><td colspan="19"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
		}?>
		<tr>
			<?php
			$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
			if($row['jumlah1']>0){
				$jml_saldoa1=($row['jumlah1']/$row['jumlah'])*100;
			}else{
				$jml_saldoa1=0;
			}
			if($row['jumlah2']>0){
				$jml_saldoa2=($row['jumlah2']/$row['jumlah'])*100;
			}else{
				$jml_saldoa2=0;
			}
			?>
			<td ><?php echo $no; ?></td>
			<td align="left"><?php echo $row['nmbayar']; ?></td>
			<td align="right"><?php echo number_format($row['pokok']);?></td>
			<td align="right"><?php echo number_format($row['bunga']);?></td>
			<td align="right"><?php echo number_format($row['adm']);?></td>
			<td align="right"><?php echo number_format($row['jumlah']);?></td>
			<td align="right"><?php echo number_format($row['rekening']);?></td>
			<td align="right"><?php echo number_format($row['pokok1']);?></td>
			<td align="right"><?php echo number_format($row['bunga1']);?></td>
			<td align="right"><?php echo number_format($row['adm1']);?></td>
			<td align="right"><?php echo number_format($row['jumlah1']);?></td>
			<td align="right"><?php echo number_format($row['rekening1']);?></td>
			<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
			<td align="right"><?php echo number_format($row['pokok2']);?></td>
			<td align="right"><?php echo number_format($row['bunga2']);?></td>
			<td align="right"><?php echo number_format($row['adm2']);?></td>
			<td align="right"><?php echo number_format($row['jumlah2']);?></td>
			<td align="right"><?php echo number_format($row['rekening2']);?></td>
			<td align="right"><?php echo number_format($jml_saldoa2,2);?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$jorg=$jorg+$row['rekening'];
		
		$jpokok1=$jpokok1+$row['pokok1'];
		$jbunga1=$jbunga1+$row['bunga1'];
		$jadm1=$jadm1+$row['adm1'];
		$jjumlah1=$jjumlah1+$row['jumlah1'];
		$jorg1=$jorg1+$row['rekening1'];

		$jpokok2=$jpokok2+$row['pokok2'];
		$jbunga2=$jbunga2+$row['bunga2'];
		$jadm2=$jadm2+$row['adm2'];
		$jjumlah2=$jjumlah2+$row['jumlah2'];
		$jorg2=$jorg2+$row['rekening2'];

		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$torg=$torg+$row['rekening'];
		
		$tpokok1=$tpokok1+$row['pokok1'];
		$tbunga1=$tbunga1+$row['bunga1'];
		$tadm1=$tadm1+$row['adm1'];
		$tjumlah1=$tjumlah1+$row['jumlah1'];
		$torg1=$torg1+$row['rekening1'];

		$tpokok2=$tpokok2+$row['pokok2'];
		$tbunga2=$tbunga2+$row['bunga2'];
		$tadm2=$tadm2+$row['adm2'];
		$tjumlah2=$tjumlah2+$row['jumlah2'];
		$torg2=$torg2+$row['rekening2'];

		$vbayar=$row['produk'];
		$no++;
	}
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	if($jjumlah1>0){
		$jml_saldoa1=($jjumlah1/$jjumlah)*100;
	}else{
		$jml_saldoa1=0;
	}
	if($jjumlah2>0){
		$jml_saldoa2=($jjumlah2/$jjumlah)*100;
	}else{
		$jml_saldoa2=0;
	}
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td><strong>JUMLAH</strong></td>
		<td align="right"><?php echo number_format($jpokok); ?></td>
		<td align="right"><?php echo number_format($jbunga); ?></td>
		<td align="right"><?php echo number_format($jadm);?></td>
		<td align="right"><?php echo number_format($jjumlah);?></td>
		<td align="right"><?php echo number_format($jorg);?></td>
		<td align="right"><?php echo number_format($jpokok1);?></td>
		<td align="right"><?php echo number_format($jbunga1);?></td>
		<td align="right"><?php echo number_format($jadm1);?></td>
		<td align="right"><?php echo number_format($jjumlah1);?></td>
		<td align="right"><?php echo number_format($jorg1);?></td>
		<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
		<td align="right"><?php echo number_format($jpokok2);?></td>
		<td align="right"><?php echo number_format($jbunga2);?></td>
		<td align="right"><?php echo number_format($jadm2);?></td>
		<td align="right"><?php echo number_format($jjumlah2);?></td>
		<td align="right"><?php echo number_format($jorg2);?></td>
		<td align="right"><?php echo number_format($jml_saldoa2,2);?></td>
	</tr>
	<?php
	$jml_saldoa1=0;$jml_saldoa2=0;$jml_saldoa3=0;
	if($tjumlah1>0){
		$jml_saldoa1=($tjumlah1/$tjumlah)*100;
	}else{
		$jml_saldoa1=0;
	}
	if($tjumlah2>0){
		$jml_saldoa2=($tjumlah2/$tjumlah)*100;
	}else{
		$jml_saldoa2=0;
	}
	?>
	<tr>
		<td class="items" colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo number_format($tpokok); ?></td>
		<td align="right"><?php echo number_format($tbunga); ?></td>
		<td align="right"><?php echo number_format($tadm);?></td>
		<td align="right"><?php echo number_format($tjumlah);?></td>
		<td align="right"><?php echo number_format($torg);?></td>
		<td align="right"><?php echo number_format($tpokok1);?></td>
		<td align="right"><?php echo number_format($tbunga1);?></td>
		<td align="right"><?php echo number_format($tadm1);?></td>
		<td align="right"><?php echo number_format($tjumlah1);?></td>
		<td align="right"><?php echo number_format($torg1);?></td>
		<td align="right"><?php echo number_format($jml_saldoa1,2);?></td>
		<td align="right"><?php echo number_format($tpokok2);?></td>
		<td align="right"><?php echo number_format($tbunga2);?></td>
		<td align="right"><?php echo number_format($tadm2);?></td>
		<td align="right"><?php echo number_format($tjumlah2);?></td>
		<td align="right"><?php echo number_format($torg2);?></td>
		<td align="right"><?php echo number_format($jml_saldoa2,2);?></td>
	</tr>
</tbody>