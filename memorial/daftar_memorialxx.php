<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">NAMA</th>
	<th colspan="2">MUTASI KAS</th>
	<th colspan="2">MUTASI MEMORIAL</th>
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
					<td colspan="3" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
					<td align="right"><?php echo formatrp($jjumlah1);?></td>
					<td align="right"><?php echo formatrp($jjumlah2);?></td>
					<td align="right"><?php echo formatrp($jjumlah3);?></td>
					<td align="right"><?php echo formatrp($jjumlah4);?></td>
					<td align="right" colspan="4">&nbsp;</td>
				</tr><?php
				$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
			}?>
			<tr>
				<td colspan="11"><strong><?php echo 'TANGGAL : '.date_sql($row['tanggal']);?></strong></td>
			</tr>
			<?php
			$no=1;
		}?>	
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['norekgl']; ?></td>
			<td width="20%"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['debetkas']); ?></td>
			<td align="right"><?php echo formatrp($row['kreditkas']); ?></td>
			<td align="right"><?php echo formatrp($row['debetmemo']); ?></td>
			<td align="right"><?php echo formatrp($row['kreditmemo']); ?></td>
			<td><?php echo $row['notransaksi'].' / '.date_sql($row['tanggal']); ?></td>
			<td><?php echo $row['keterangan']; ?></td>
			<td><?php echo $row['oper']; ?></td>
			<td><?php echo $row['otor']; ?></td>
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
		<td colspan="3" align="center"><?php echo 'JUMLAH TANGGAL : '.date_sql($xtanggal);?></td>
		<td align="right"><?php echo formatrp($jjumlah1);?></td>
		<td align="right"><?php echo formatrp($jjumlah2);?></td>
		<td align="right"><?php echo formatrp($jjumlah3);?></td>
		<td align="right"><?php echo formatrp($jjumlah4);?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right"><?php echo formatrp($tjumlah4); ?></td>
		<td align="right" colspan="4">&nbsp;</td>
	</tr>
</tbody>