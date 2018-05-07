<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>KANTOR BAYAR</th>
	<th>RENCANA REGULER</th>
	<th>RENCANA SUSULAN</th>
	<th>JUMLAH TAGIHAN</th>
	<th>ORANG</th>
</tr>
</thead>
<tbody><?php
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jrekening=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$trekening=0;
	$no=1;$vbayar="";
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="2" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jjumlah1); ?></td>
				<td align="right"><?php echo formatrp($jjumlah2); ?></td>
				<td align="right"><?php echo formatrp($jjumlah3); ?></td>
				<td align="right"><?php echo formatrp($jrekening); ?></td>
			</tr><?php
			$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jrekening=0;
			}?>
			<tr><td colspan="6"><strong><?php echo 'JENIS PRODUK :'.$row['nmproduk']; ?></strong></td>	</tr><?php
		}
		if($row['kdtran']==888){$clsname="evet";}else{$clsname="";}?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td width="7%"><?php echo $no; ?></td>
			<td width="35%"><?php echo '[ '.$row['kkbayar'].' ] '.$row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah1']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah2']); ?></td>
			<td align="right"><?php echo formatrp($row['rekening']); ?></td>
		</tr><?php 
		$jjumlah1=$jjumlah1+$row['jumlah'];
		$jjumlah2=$jjumlah2+$row['jumlah1'];
		$jjumlah3=$jjumlah3+$row['jumlah2'];
		$jrekening=$jrekening+$row['rekening'];
		
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['jumlah1'];
		$tjumlah3=$tjumlah3+$row['jumlah2'];
		$trekening=$trekening+$row['rekening'];
		
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jjumlah1); ?></td>
		<td align="right"><?php echo formatrp($jjumlah2); ?></td>
		<td align="right"><?php echo formatrp($jjumlah3); ?></td>
		<td align="right"><?php echo formatrp($jrekening); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td class="items" colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right"><?php echo formatrp($trekening); ?></td>
	</tr>
</tbody>
