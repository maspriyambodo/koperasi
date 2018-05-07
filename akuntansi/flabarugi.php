<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>URAIAN</th>
	<th>REKENING</th>
	<th>SALDO</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$no=1;$vbayar="";
	while ($row = $result->row($hasil)) {
		if ($vbayar!=substr($row['sandi'],0,1)){ 
			if($no>1){  ?>
				 <tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center">JUMLAH PENDAPATAN</td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<?php $jpokok=0;$no=1;?>
				</tr> <?php
			}
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td ><?php echo $row['uraian']; ?></td>
			<td align="center" ><?php echo $branch.'-'.$row['sandi'].'-360'; ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari6]); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row[$fieldhari6];
		$vbayar=substr($row['sandi'],0,1);
		$no++;
	}?>
	 <tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH BIAYA</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>

	</tr>
</tbody>