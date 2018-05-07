<tbody><?php
	$jpokok1=0;$jpokok2=0;$no=1;$vbayar="";
	$tpokok1=0;$tpokok2=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=substr($row['nonas'],0,1)){ 
			if($no>1){  ?>
				 <tr class="td" bgcolor="#fda8a4">
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
		}
		if(substr($row['nonas'],-3)==000){
			$clsname="evet";
		}elseif(substr($row['nonas'],-2)==00){
			$clsname="odd";
		}else{
			$clsname="even";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td ><?php echo $no; ?></td>
			<td >
			<?php  
			if($branch=='0111'){
				echo $branch.'-'.$row['nonas'].'-'.$row['produk']; 
			}else{
				echo $row['branch'].'-'.$row['nonas'].'-'.$row['produk'];
			} ?>
			</td>
			<td><?php echo $row['nama']; ?></td> <?php 
			if($row[$fieldhari1]<0){ 
				if(substr($row['nonas'],0,1)==1 || substr($row['nonas'],0,1)==4){ ?>
					<td align="right" width="8%"><?php echo formatrp(0); ?></td>
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari1]); ?></td><?php 
					if(substr($row['nonas'],-2)!='00'){
						$tpokok1=$tpokok1+$row[$fieldhari1];
					}
				}else{ ?>
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari1]); ?></td>
					<td align="right" width="8%"><?php echo formatrp(0); ?></td> <?php
					if(substr($row['nonas'],-2)!='00'){
						$tpokok2=$tpokok2+$row[$fieldhari1];
					}
				}
			}else{ 
				if(substr($row['nonas'],0,1)==1 || substr($row['nonas'],0,1)==4){ ?>
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari1]); ?></td>
					<td align="right" width="8%"><?php echo formatrp(0); ?></td> 
					<?php 
					if(substr($row['nonas'],-2)!='00'){
						$tpokok1=$tpokok1+$row[$fieldhari1];
					}
				}else{ ?>
					<td align="right" width="8%"><?php echo formatrp(0); ?></td> 
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari1]); ?></td>
					<?php
					if(substr($row['nonas'],-2)!='00'){
						$tpokok2=$tpokok2+$row[$fieldhari1];
					}
				}
			} ?>
			<td align="right" width="8%"><?php echo formatrp($row[$fieldhari2]); ?></td>
			<td align="right" width="8%"><?php echo formatrp($row[$fieldhari3]); ?></td>
			<td align="right" width="8%"><?php echo formatrp($row[$fieldhari4]); ?></td>
			<td align="right" width="8%"><?php echo formatrp($row[$fieldhari5]); ?></td><?php
			if($row[$fieldhari6]<0){ 
				if(substr($row['nonas'],0,1)==1 || substr($row['nonas'],0,1)==4){  ?>
					<td align="right" width="8%"><?php echo formatrp(0); ?></td>
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari6]); ?></td><?php
					if(substr($row['nonas'],-2)!='00'){
						$jpokok1=$jpokok1+$row[$fieldhari6];
					}
				}else{ ?>
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari6]); ?></td> 
					<td align="right" width="8%"><?php echo formatrp(0); ?></td> <?php
					if(substr($row['nonas'],-2)!='00'){
						$jpokok2=$jpokok2+$row[$fieldhari6];
					}
				}
			}else{ 
				if(substr($row['nonas'],0,1)==1 || substr($row['nonas'],0,1)==4){  ?>
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari6]); ?></td> 
					<td align="right" width="8%"><?php echo formatrp(0); ?></td> <?php
					if(substr($row['nonas'],-2)!='00'){
						$jpokok1=$jpokok1+$row[$fieldhari6];
					}
				}else{ ?>
					<td align="right" width="8%"><?php echo formatrp(0); ?></td> 
					<td align="right" width="8%"><?php echo formatrp($row[$fieldhari6]); ?></td><?php
					if(substr($row['nonas'],-2)!='00'){
						$jpokok2=$jpokok2+$row[$fieldhari6];
					}
				}
			} ?>
		</tr> <?php 
		if(substr($row['nonas'],-3)=='000'){
		}else{
			if(substr($row['nonas'],-2)=='00'){
				$kdebet=$kdebet+$row[$fieldhari2];
				$kkredit=$kkredit+$row[$fieldhari3];
				$mdebet=$mdebet+$row[$fieldhari4];
				$mkredit=$mkredit+$row[$fieldhari5];
			}
		}
		$vbayar=substr($row['nonas'],0,1);
		$no++;
	}?>
	 <tr class="td" bgcolor="#fda8a4">
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