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
	$no=1;$vbayar="";$xtanggal="";$vnotransaksi='';$vnoreferensi='';
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$gjumlah1=0;$gjumlah2=0;$gjumlah3=0;$gjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){ 
		if($row['debetmemo']>0 OR $row['kreditmemo']>0){
			if ($vbayar!=$row['tanggal']){
				if($no>1){?>
					<tr class="td" bgcolor="#e5e5e5">
						<td align="center">&nbsp;</td>
						<td colspan="2"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
						<td align="right"><?php echo number_format($jjumlah3);?></td>
						<td align="right"><?php echo number_format($jjumlah4);?></td>
					</tr><?php
					$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
				}?>
				<tr><td colspan="5"><strong><?php echo 'TANGGAL : '.date_sql($row['tanggal']);?></strong></td></tr>
				<?php
				$no=1;
			}else{
				if($row['noreferensi']==''){
					if($vnotransaksi!=$row['notransaksi']){?>
						<tr class="td" bgcolor="#e5e5e5">
							<td colspan="3" align="center">JUMLAH</td>
							<td align="right"><?php echo number_format($gjumlah3);?></td>
							<td align="right"><?php echo number_format($gjumlah4);?></td>
						</tr><?php
						$gjumlah1=0;$gjumlah2=0;$gjumlah3=0;$gjumlah4=0;
					}
				}else{
					if($vnoreferensi!=$row['noreferensi']){?>
						<tr class="td" bgcolor="#e5e5e5">
							<td colspan="3" align="center">JUMLAH</td>
							<td align="right"><?php echo number_format($gjumlah3);?></td>
							<td align="right"><?php echo number_format($gjumlah4);?></td>
						</tr><?php
						$gjumlah1=0;$gjumlah2=0;$gjumlah3=0;$gjumlah4=0;
					}
				}
			}?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['norekgl'];?></td>
				<td width="40%"><?php echo $row['nama'];?></td>
				<td align="right"><?php echo number_format($row['debetmemo']);?></td>
				<td align="right"><?php echo number_format($row['kreditmemo']);?></td>
			</tr><?php 
			$jjumlah3=$jjumlah3+$row['debetmemo'];
			$jjumlah4=$jjumlah4+$row['kreditmemo'];
			
			$gjumlah3 +=$row['debetmemo'];
			$gjumlah4 +=$row['kreditmemo'];
			
			$tjumlah3=$tjumlah3+$row['debetmemo'];
			$tjumlah4=$tjumlah4+$row['kreditmemo'];
			$vbayar=$row['tanggal'];
			$vnoreferensi=$row['noreferensi'];
			$vnotransaksi=$row['notransaksi'];
			$xtanggal=$row['tanggal'];
			$no++;
		}
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH</td>
		<td align="right"><?php echo number_format($gjumlah3);?></td>
		<td align="right"><?php echo number_format($gjumlah4);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td align="center">&nbsp;</td>
		<td colspan="2"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo number_format($jjumlah3);?></td>
		<td align="right"><?php echo number_format($jjumlah4);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo number_format($tjumlah3); ?></td>
		<td align="right"><?php echo number_format($tjumlah4); ?></td>
	</tr>
</tbody>