<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">NOREK</th>
	<th rowspan="2">NAMA</th>
	<th colspan="2">MUTASI KAS</th>
	<th colspan="2">MUTASI MEMORIAL</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";$xtanggal="";
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){ 
		if ($vbayar!=$row['tanggal']){
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td align="center">&nbsp;</td>
					<td colspan="2" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
					<td align="right"><?php echo number_format($jjumlah1);?></td>
					<td align="right"><?php echo number_format($jjumlah2);?></td>
					<td align="right"><?php echo number_format($jjumlah3);?></td>
					<td align="right"><?php echo number_format($jjumlah4);?></td>
				</tr><?php
				$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
			}?>
			<tr>
				<td colspan="5"><strong><?php echo 'TANGGAL : '.date_sql($row['tanggal']);?></strong></td>
			</tr>
			<?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norekgl']; ?></td>
			<td width="35%"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo number_format($row['debetkas']); ?></td>
			<td align="right"><?php echo number_format($row['kreditkas']); ?></td>
			<td align="right"><?php echo number_format($row['debetmemo']); ?></td>
			<td align="right"><?php echo number_format($row['kreditmemo']); ?></td>
		</tr><?php 
		$jjumlah1=$jjumlah1+$row['debetkas'];
		$jjumlah2=$jjumlah2+$row['kreditkas'];
		$jjumlah3=$jjumlah3+$row['debetmemo'];
		$jjumlah4=$jjumlah4+$row['kreditmemo'];
		$tjumlah1=$tjumlah1+$row['debetkas'];
		$tjumlah2=$tjumlah2+$row['kreditkas'];
		$tjumlah3=$tjumlah3+$row['debetmemo'];
		$tjumlah4=$tjumlah4+$row['kreditmemo'];
		$vbayar=$row['tanggal'];
		$xtanggal=$row['tanggal'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td align="center">&nbsp;</td>
		<td colspan="2" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo number_format($jjumlah1);?></td>
		<td align="right"><?php echo number_format($jjumlah2);?></td>
		<td align="right"><?php echo number_format($jjumlah3);?></td>
		<td align="right"><?php echo number_format($jjumlah4);?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center"><strong>JUMLAH</strong></td>
		<td align="right"><?php echo number_format($tjumlah1); ?></td>
		<td align="right"><?php echo number_format($tjumlah2); ?></td>
		<td align="right"><?php echo number_format($tjumlah3); ?></td>
		<td align="right"><?php echo number_format($tjumlah4); ?></td>
	</tr>
</tbody>