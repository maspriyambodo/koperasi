<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">NAMA</th>
	<th colspan="2">MUTASI</th>
	<th rowspan="2">NO/TGL TRANSAKSI</th>
	<th rowspan="2">KETERANGAN</th>
	<th rowspan="2">OPERATOR</th>
	<th rowspan="2">OTORISASI</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>NASABAH</th>
	<th>AKUNTANSI</th>
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
						<td colspan="3" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
						<td align="right"><?php echo number_format($jjumlah3);?></td>
						<td align="right"><?php echo number_format($jjumlah4);?></td>
						<td align="right" colspan="4">&nbsp;</td>
					</tr><?php
					$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
				}?>
				<tr>
					<td colspan="10"><strong><?php echo 'TANGGAL : '.date_sql($row['tanggal']);?></strong></td>
				</tr>
				<?php
				$no=1;
			}?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $row['norek']; ?></td>
				<td><?php echo $row['norekgl']; ?></td>
				<td width="15%"><?php echo $row['nama']; ?></td>
				<td align="right"><?php echo number_format($row['debetmemo']); ?></td>
				<td align="right"><?php echo number_format($row['kreditmemo']); ?></td>
				<td><?php echo $row['notransaksi'].' / '.date_sql($row['tanggal']); ?></td>
				<td><?php echo $row['keterangan']; ?></td>
				<td><?php echo $row['oper']; ?></td>
				<td><?php echo $row['otor']; ?></td>
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
		<td colspan="3" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo number_format($jjumlah3);?></td>
		<td align="right"><?php echo number_format($jjumlah4);?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo number_format($tjumlah3); ?></td>
		<td align="right"><?php echo number_format($tjumlah4); ?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
</tbody>