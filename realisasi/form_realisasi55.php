<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th colspan="2">KETERANGAN</th>
		<th rowspan="2">OBD</th>
		<th rowspan="2">POKOK</th>
		<th rowspan="2">BUNGA</th>
		<th rowspan="2">ADM</th>
		<th rowspan="2">JUMLAH</th>
		<th rowspan="2">REK</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>ALASAN TIDAK TERTAGIH</th>
		<th>SOLUSI TIDAK TERTAGIH</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;$jsaldoa=0;
	$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;$jsaldoa1=0;
	$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;$jsaldoa2=0;

	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gorg=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gorg1=0;
	$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gorg2=0;

	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$torg=0;$tsaldoa=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$torg1=0;$tsaldoa=0;
	$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$torg2=0;$tsaldoa=0;
	
	while ($row=$result->row($hasil)) {
		if ($vbayar!=$row['kkbayar']){ 
			if($no>1){
				?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3"><strong>JUMLAH</strong></td>
					<td align="right"><?php echo formatrp($jsaldoa); ?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm);?></td>
					<td align="right"><?php echo formatrp($jjumlah);?></td>
					<td align="right"><?php echo formatrp($jorg);?></td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah=0;$jorg=0;$jsaldoa=0;
			$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jorg1=0;$jsaldoa1=0;
			$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jorg2=0;$jsaldoa2=0;
			?>
			<tr><td colspan="9"><strong><?php echo $row['nmbayar']; ?></strong></td></tr><?php
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td align="left"><?php $alasan_tt=$row['alasan_tt'];include '../help/alasan_tt.php';echo $xalasan_tt; ?></td>
			<td align="left"><?php echo $row['solusi_tt']; ?></td>
			<td align="right"><?php echo formatrp($row['saldoa']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rekening']);?></td>
		</tr><?php 
		$jsaldoa=$jsaldoa+$row['saldoa'];
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$jorg=$jorg+$row['rekening'];
		
		$tsaldoa=$tsaldoa+$row['saldoa'];
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$torg=$torg+$row['rekening'];
		
		$vbayar=$row['kkbayar'];
		$no++;
	}
	?>
	<tr>
		<td colspan="3"><strong>JUMLAH</strong></td>
		<td align="right"><?php echo formatrp($jsaldoa); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm);?></td>
		<td align="right"><?php echo formatrp($jjumlah);?></td>
		<td align="right"><?php echo formatrp($jorg);?></td>
	</tr>
	<tr>
		<td colspan="3" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tsaldoa); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm);?></td>
		<td align="right"><?php echo formatrp($tjumlah);?></td>
		<td align="right"><?php echo formatrp($torg);?></td>
	</tr>
</tbody>