<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th>NO</th>
		<th width="20%">KANTOR BAYAR</th>
		<th>O B D</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>REKENING</th>
	</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah=0;$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jumlah2=0;$jumlah3=0;$jsaldo=0;
	$gpokok=0;$gbunga=0;$gadm=0;$gjumlah=0;$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gjumlah3=0;$gsaldo=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah=0;$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$tjumlah3=0;$tsaldo=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center">JUMLAH</td>
					<td align="right"><?php echo formatrp($jsaldo); ?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jumlah); ?></td>
					<td align="right"><?php echo formatrp($jumlah3); ?></td>
				</tr><?php
				$jpokok=0;$jbunga=0;$jadm=0;$jumlah=0;$jumlah3=0;$jsaldo=0;
			}?>
			<tr><td colspan="8"><strong><?php echo 'JENIS PRODUK : '.$row['nmproduk']; ?></strong></td></tr><?php
			$no=1;
		}
		if($row['kdtran']==888){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td ><?php echo $no; ?></td>
			<td ><?php echo '[ '.$row['kkbayar'].' ] '.$row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['saldoa']); ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['rekening']); ?></td>
		</tr><?php 
		$jsaldo=$jsaldo+$row['saldoa'];
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah=$jumlah+$row['jumlah'];
		$jumlah3=$jumlah3+$row['rekening'];
		
		$tsaldo=$tsaldo+$row['saldoa'];
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah=$tjumlah+$row['jumlah'];
		$tjumlah3=$tjumlah3+$row['rekening'];
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jsaldo); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah); ?></td>
		<td align="right"><?php echo formatrp($jumlah3); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td class="items" colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tsaldo); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
	</tr>
</tbody>
