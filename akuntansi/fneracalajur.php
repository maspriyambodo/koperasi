<tbody><?php
	$jpokok1=0;$jpokok2=0;$no=1;$vbayar="";
	$tpokok1=0;$tpokok2=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=substr($row['sandi'],0,1)){ 
			if($no>1){  ?>
				 <tr class="td" bgcolor="#e5e5e5">
					<td colspan="3" align="center">JUMLAH </td>
					<td align="right"><?php echo formatrp($tpokok1); ?></td>
					<td align="right"><?php echo formatrp($tpokok2); ?></td>
					<td align="right"><?php echo formatrp($kdebet); ?></td>
					<td align="right"><?php echo formatrp($kkredit); ?></td>
					<td align="right"><?php echo formatrp($mdebet); ?></td>
					<td align="right"><?php echo formatrp($mkredit); ?></td>
					<td align="right"><?php echo formatrp($jpokok1); ?></td>
					<td align="right"><?php echo formatrp($jpokok2); ?></td>
					<?php $jpokok1=0;$jpokok2=0;$tpokok1=0;$tpokok2=0;$no=1;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;?>
				</tr> <?php
			}
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td align="center"><?php echo $branch.'-'.$row['sandi'].'-360'; ?></td>
			<td width="25%"><?php echo $row['uraian']; ?></td> <?php 
			if($row[$fieldhari1]<0){ 
				if(substr($row['sandi'],0,1)==1 || substr($row['sandi'],0,1)==4){  ?>
					<td align="right"><?php echo formatrp(0); ?></td>
					<td align="right"><?php echo formatrp($row[$fieldhari1]); ?></td> <?php 
					$tpokok1=$tpokok1+$row[$fieldhari1];
				}else{ ?>
					<td align="right"><?php echo formatrp($row[$fieldhari1]); ?></td> 
					<td align="right"><?php echo formatrp(0); ?></td> <?php
					$tpokok2=$tpokok2+$row[$fieldhari1];
				}
			}else{ 
				if(substr($row['sandi'],0,1)==1 || substr($row['sandi'],0,1)==4){  ?>
					<td align="right"><?php echo formatrp($row[$fieldhari1]); ?></td> 
					<td align="right"><?php echo formatrp(0); ?></td> <?php 
					$tpokok1=$tpokok1+$row[$fieldhari1];
				}else{ ?>
					<td align="right"><?php echo formatrp(0); ?></td> 
					<td align="right"><?php echo formatrp($row[$fieldhari1]); ?></td> <?php
					$tpokok2=$tpokok2+$row[$fieldhari1];
				}
			} ?>
			<td align="right"><?php echo formatrp($row[$fieldhari2]); ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari3]); ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari4]); ?></td>
			<td align="right"><?php echo formatrp($row[$fieldhari5]); ?></td> <?php
			if($row[$fieldhari6]<0){ 
				if(substr($row['sandi'],0,1)==1 || substr($row['sandi'],0,1)==4){  ?>
					<td align="right"><?php echo formatrp(0); ?></td>
					<td align="right"><?php echo formatrp($row[$fieldhari6]); ?></td> <?php
					$jpokok1=$jpokok1+$row[$fieldhari6];
				}else{ ?>
					<td align="right"><?php echo formatrp($row[$fieldhari6]); ?></td> 
					<td align="right"><?php echo formatrp(0); ?></td> <?php
					$jpokok2=$jpokok2+$row[$fieldhari6];
				}
			}else{ 
				if(substr($row['sandi'],0,1)==1 || substr($row['sandi'],0,1)==4){  ?>
					<td align="right"><?php echo formatrp($row[$fieldhari6]); ?></td> 
					<td align="right"><?php echo formatrp(0); ?></td> <?php
					$jpokok1=$jpokok1+$row[$fieldhari6];
				}else{ ?>
					<td align="right"><?php echo formatrp(0); ?></td> 
					<td align="right"><?php echo formatrp($row[$fieldhari6]); ?></td> <?php
					$jpokok2=$jpokok2+$row[$fieldhari6];
				}
			} ?>
		</tr> <?php 
		$kdebet=$kdebet+$row[$fieldhari2];
		$kkredit=$kkredit+$row[$fieldhari3];
		$mdebet=$mdebet+$row[$fieldhari4];
		$mkredit=$mkredit+$row[$fieldhari5];

		$vbayar=substr($row['sandi'],0,1);
		$no++;
	}?>
	 <tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH </td>
		<td align="right"><?php echo formatrp($tpokok1); ?></td>
		<td align="right"><?php echo formatrp($tpokok2); ?></td>
		<td align="right"><?php echo formatrp($kdebet); ?></td>
		<td align="right"><?php echo formatrp($kkredit); ?></td>
		<td align="right"><?php echo formatrp($mdebet); ?></td>
		<td align="right"><?php echo formatrp($mkredit); ?></td>
		<td align="right"><?php echo formatrp($jpokok1); ?></td>
		<td align="right"><?php echo formatrp($jpokok2); ?></td>
	</tr>
</tbody>