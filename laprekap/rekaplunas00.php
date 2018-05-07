<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>KANTOR BAYAR</th>
	<th>PLAFOND</th>
	<th>OBD</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>DENDA</th>
	<th>FINALTI</th>
	<th>JUMLAH</th>
	<th>REK</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$vproduk='';$vnmproduk='';
	$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jfinalti=0;
	$jumlah1=0;$jumlah2=0;$jml_saldoa1=0;$jml_saldoa2=0;	
	$gpokok=0;$gbunga=0;$gadm=0;$gdenda=0;$gfinalti=0;
	$gjumlah1=0;$gjumlah2=0;$gjml_saldoa1=0;$gjml_saldoa2=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tfinalti=0;
	$tjumlah1=0;$tjumlah2=0;$jml_saldoa3=0;$jml_saldoa4=0;
	while ($row=$result->row($hasil)){
		if($vbayar!=$row['jtransaksi']){
			if ($no>1){?>
				<tr bgcolor="#dbfffe">
					<td>&nbsp;</td>
					<td>JUMLAH <?php echo $vnmproduk; ?></td>
					<td align="right"><?php echo formatrp($gjml_saldoa1); ?></td>
					<td align="right"><?php echo formatrp($gjml_saldoa2); ?></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm); ?></td>
					<td align="right"><?php echo formatrp($gdenda); ?></td>
					<td align="right"><?php echo formatrp($gfinalti); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center">SUB JUMLAH</td>
					<td align="right"><?php echo formatrp($jml_saldoa1); ?></td>
					<td align="right"><?php echo formatrp($jml_saldoa2); ?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jdenda); ?></td>
					<td align="right"><?php echo formatrp($jfinalti); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right"><?php echo formatrp($jumlah2); ?></td>
				</tr><?php
			}
			$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jfinalti=0;
			$jumlah1=0;$jumlah2=0;$jml_saldoa1=0;$jml_saldoa2=0;
			$gpokok=0;$gbunga=0;$gadm=0;$gdenda=0;$gfinalti=0;
			$gjumlah1=0;$gjumlah2=0;$gjml_saldoa1=0;$gjml_saldoa2=0;
			$kete='PELUNASAN SETOR SENDIRI';
			if($row['jtransaksi']==53){
				$kete='PELUNASAN PEMBAHARUAN KREDIT';
			}
			echo '<tr><td colspan="12"><strong>'.$kete.'</strong></td></tr>';
		}
		if($no>1){
			if($vproduk!=$row['produk']){
				if($vbayar==$row['jtransaksi']){?>
				<tr bgcolor="#dbfffe">
					<td>&nbsp;</td>
					<td>JUMLAH <?php echo $vnmproduk; ?></td>
					<td align="right"><?php echo formatrp($gjml_saldoa1); ?></td>
					<td align="right"><?php echo formatrp($gjml_saldoa2); ?></td>
					<td align="right"><?php echo formatrp($gpokok); ?></td>
					<td align="right"><?php echo formatrp($gbunga); ?></td>
					<td align="right"><?php echo formatrp($gadm); ?></td>
					<td align="right"><?php echo formatrp($gdenda); ?></td>
					<td align="right"><?php echo formatrp($gfinalti); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
				</tr><?php
				$gpokok=0;$gbunga=0;$gadm=0;$gdenda=0;$gfinalti=0;
				$gjumlah1=0;$gjumlah2=0;$gjml_saldoa1=0;$gjml_saldoa2=0;
				}
			}
		}?>
		<tr>
			<td ><?php echo $no;?></td>
			<td width="20%"><?php echo $row['nmbayar'];?></td>
			<td align="right"><?php echo formatrp($row['nomi']);?></td>
			<td align="right"><?php echo formatrp($row['saldoa']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['denda']);?></td>
			<td align="right"><?php echo formatrp($row['finalti']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rekening']);?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jdenda=$jdenda+$row['denda'];
		$jfinalti=$jfinalti+$row['finalti'];
		$jumlah1=$jumlah1+$row['jumlah'];
		$jumlah2=$jumlah2+$row['rekening'];
		$jml_saldoa1=$jml_saldoa1+$row['nomi'];
		$jml_saldoa2=$jml_saldoa2+$row['saldoa'];
		$gpokok=$gpokok+$row['pokok'];
		$gbunga=$gbunga+$row['bunga'];
		$gadm=$gadm+$row['adm'];
		$gdenda=$gdenda+$row['denda'];
		$gfinalti=$gfinalti+$row['finalti'];
		$gjumlah1=$gjumlah1+$row['jumlah'];
		$gjumlah2=$gjumlah2+$row['rekening'];
		$gjml_saldoa1=$gjml_saldoa1+$row['nomi'];
		$gjml_saldoa2=$gjml_saldoa2+$row['saldoa'];
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tdenda=$tdenda+$row['denda'];
		$tfinalti=$tfinalti+$row['finalti'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['rekening'];
		$jml_saldoa3=$jml_saldoa3+$row['nomi'];
		$jml_saldoa4=$jml_saldoa4+$row['saldoa'];
		$vbayar=$row['jtransaksi'];
		$vproduk=$row['produk'];
		$vnmproduk=$row['nmproduk'];
		$no++;
	}?>
	<tr bgcolor="#dbfffe">
		<td>&nbsp;</td>
		<td>JUMLAH <?php echo $vnmproduk; ?></td>
		<td align="right"><?php echo formatrp($gjml_saldoa1); ?></td>
		<td align="right"><?php echo formatrp($gjml_saldoa2); ?></td>
		<td align="right"><?php echo formatrp($gpokok); ?></td>
		<td align="right"><?php echo formatrp($gbunga); ?></td>
		<td align="right"><?php echo formatrp($gadm); ?></td>
		<td align="right"><?php echo formatrp($gdenda); ?></td>
		<td align="right"><?php echo formatrp($gfinalti); ?></td>
		<td align="right"><?php echo formatrp($gjumlah1); ?></td>
		<td align="right"><?php echo formatrp($gjumlah2); ?></td>
	</tr>	
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">SUB JUMLAH</td>
		<td align="right"><?php echo formatrp($jml_saldoa1); ?></td>
		<td align="right"><?php echo formatrp($jml_saldoa2); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jdenda); ?></td>
		<td align="right"><?php echo formatrp($jfinalti); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($jml_saldoa3); ?></td>
		<td align="right"><?php echo formatrp($jml_saldoa4); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tdenda); ?></td>
		<td align="right"><?php echo formatrp($tfinalti); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
	</tr>
</tbody>
