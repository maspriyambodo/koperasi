<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>NOPEN</th>
	<th>REK. LAIN</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>KE</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['kkbayar']){ 
			if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="5" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jpokok); ?></td>
				<td align="right"><?php echo formatrp($jbunga); ?></td>
				<td align="right"><?php echo formatrp($jadm); ?></td>
				<td align="right"><?php echo formatrp($jumlah1); ?></td>
				<td align="right">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr><?php
			}?>
			<tr><td colspan="10"><strong><?php echo 'KANTOR BAYAR : '.$row['kkbayar'].' [ '.$row['nmbayar'].' ]'; ?></strong></td></tr><?php
			$no=1;
		}
		if($row['kdtran']==222){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td><?php echo $no; ?></td>
			<td align="left">&nbsp;<?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td align="left">&nbsp;<?php echo $row['nopen']; ?></td>
			<td align="left">&nbsp;<?php echo $row['nocitra']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="center"><?php echo $row['angsurke']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		
		$vbayar=$row['kkbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
</tbody>