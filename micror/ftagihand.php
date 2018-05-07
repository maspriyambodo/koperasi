<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>REKENING</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jpokok=0;$jbunga=0;$jadm=0;$jjumlah1=0;$jjumlah2=0;
	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah1=0;$gjumlah2=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){
			if ($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td colspan="2"><strong>JUMLAH : <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jjumlah1); ?></td>
					<td align="right"><?php echo formatrp($jjumlah2); ?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="3">GRAND TOTAL</td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
				</tr>
				<?php
				$jpokok=0;$jbunga=0;$jadm=0;$jjumlah1=0;$gpokok=0;$gbunga=0;$gadm=0;$gjumlah1=0;
			}?>
			<tr><td colspan="8"><strong><?php echo ' JENIS PRODUK : '.$row['nmproduk']; ?></strong></td></tr><?php
			$no=1;
		}
		if($no>1){
			if ($vlunas!=$row['kdsales']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td>&nbsp;</td>
						<td colspan="2"><strong>JUMLAH : <?php echo $vnmbayar; ?></strong></td>
						<td align="right"><?php echo formatrp($jpokok); ?></td>
						<td align="right"><?php echo formatrp($jbunga); ?></td>
						<td align="right"><?php echo formatrp($jadm); ?></td>
						<td align="right"><?php echo formatrp($jjumlah1); ?></td>
						<td align="right"><?php echo formatrp($jjumlah2); ?></td>
					</tr>
					<?php
				}
				$jpokok=0;$jbunga=0;$jadm=0;$jjumlah1=0;
			}
		} ?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['rekening']); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jjumlah1=$jjumlah1+$row['jumlah'];
		$jjumlah2=$jjumlah2+$row['rekening'];
		
		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gjumlah1=$gjumlah1+$row['jumlah'];
		$gjumlah2=$gjumlah2+$row['rekening'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['rekening'];
		
		$vbayar=$row['produk'];
		$vlunas=$row['kdsales'];
		$vnmbayar=$row['namas'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td>&nbsp;</td>
		<td colspan="2"><strong>JUMLAH : <?php echo $vnmbayar; ?></strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jjumlah1); ?></td>
		<td align="right"><?php echo formatrp($jjumlah2); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gpokok); ?></td>
		<td align="right"><?php echo formatrp($gbunga); ?></td>
		<td align="right"><?php echo formatrp($gadm); ?></td>
		<td align="right"><?php echo formatrp($gjumlah1); ?></td>
		<td align="right"><?php echo formatrp($gjumlah2); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3"><strong>TOTAL</strong>L</td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
	</tr>
</tbody>