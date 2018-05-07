<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>NOPEN</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>KE</th>
	<th>NAMA SALES</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vlunas='';
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;
	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah1=0;$gjumlah2=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right" colspan="2">&nbsp;</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="4" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right" colspan="2">&nbsp;</td>
				</tr>
				<?php
				$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;
				$gpokok=0;$gbunga=0;$gadm=0;$gjumlah1=0;$gjumlah2=0;
			}?>
			<tr><td colspan="10"><strong><?php echo 'JENIS PRODUK : '.$row['nmproduk']; ?></strong></td></tr><?php
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
						<td align="right"><?php echo formatrp($jpokok); ?></td>
						<td align="right"><?php echo formatrp($jbunga); ?></td>
						<td align="right"><?php echo formatrp($jadm); ?></td>
						<td align="right"><?php echo formatrp($jumlah1); ?></td>
						<td align="right" colspan="2">&nbsp;</td>
					</tr>
					<?php
					$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;
				}
			}
		}
		if($row['kdtran']==222){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['nopen']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="center"><?php echo $row['angsurke']; ?></td>
			<td align="left"><?php echo $row['namas']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		
		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gjumlah1=$gjumlah1+$row['jumlah'];

		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		
		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gpokok); ?></td>
		<td align="right"><?php echo formatrp($gbunga); ?></td>
		<td align="right"><?php echo formatrp($gadm); ?></td>
		<td align="right"><?php echo formatrp($gjumlah1); ?></td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
</tbody>