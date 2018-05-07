<tbody><?php
	$jpokok=0;$no=1;$vbayar="";
	$tpokok=0;$jumlah1=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=substr($row['sandi'],0,1)){ 
			if($no>1){  ?>
				 <tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center">JUMLAH PENDAPATAN</td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($tpokok); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right">&nbsp;</td>
					<?php $jpokok=0;$tpokok=0;$jumlah1=0;$no=1;?>
				</tr> <?php
			}
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td ><?php echo $row['uraian']; ?></td>
			<td align="center" ><?php echo $branch.'-'.$row['sandi'].'-360'; ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari6]); ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari1]); ?></td>
			<td align="right"><?php echo formatrp($row['naik']); ?></td>
			<td align="right"><?php echo number_format($row['turun'],2); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row[$fieldhari6];
		$tpokok=$tpokok+$row[$fieldhari1];
		$jumlah1=$jumlah1+$row['naik'];
		$vbayar=substr($row['sandi'],0,1);
		$no++;
	}?>
	 <tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH BIAYA</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
</tbody>