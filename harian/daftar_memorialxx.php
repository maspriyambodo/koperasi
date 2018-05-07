<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">NOREK</th>
	<th rowspan="2">NAMA</th>
	<th colspan="2">MUTASI</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$xtanggal="";
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){ 
		if($row['debetmemo']>0 OR $row['kreditmemo']>0){
			if ($vbayar!=$row['tanggal']){
				if($no>1){?>
					<tr class="td" bgcolor="#e5e5e5">
						<td align="center">&nbsp;</td>
						<td colspan="2" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
						<td align="right"><?php echo formatrp($jjumlah3);?></td>
						<td align="right"><?php echo formatrp($jjumlah4);?></td>
					</tr><?php
					$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
				}?>
				<tr><td colspan="5"><strong><?php echo 'TANGGAL : '.date_sql($row['tanggal']);?></strong></td></tr>
				<?php
				$no=1;
			}?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['norekgl']; ?></td>
				<td width="40%"><?php echo $row['nama']; ?></td>
				<td align="right"><?php echo formatrp($row['debetmemo']); ?></td>
				<td align="right"><?php echo formatrp($row['kreditmemo']); ?></td>
			</tr><?php 
			$jjumlah3=$jjumlah3+$row['debetmemo'];
			$jjumlah4=$jjumlah4+$row['kreditmemo'];
			$tjumlah3=$tjumlah3+$row['debetmemo'];
			$tjumlah4=$tjumlah4+$row['kreditmemo'];
			$vbayar=$row['tanggal'];
			$xtanggal=$row['tanggal'];
			$no++;
		}
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td align="center">&nbsp;</td>
		<td colspan="2" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo formatrp($jjumlah3);?></td>
		<td align="right"><?php echo formatrp($jjumlah4);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right"><?php echo formatrp($tjumlah4); ?></td>
	</tr>
</tbody>