<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th colspan="2">NO REKENING</th>
	<th rowspan="2">NAMA</th>
	<th rowspan="2">BUNGA</th>
	<th rowspan="2">ADM</th>
	<th rowspan="2">PAJAK</th>
	<th rowspan="2">TGL TRANSAKSI</th>
	<th rowspan="2">OPERATOR</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>NASABAH</th>
	<th>AKUNTANSI</th>
</tr>

</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){ 
			if($no>1){?>
				<tr class="td" bgcolor="#e5e5e5">
					<td align="center">&nbsp;</td>
					<td colspan="3" align="center"><?php echo 'JUMLAH : '; ?></td>
					<td align="right"><?php echo formatrp($jjumlah2); ?></td>
					<td align="right"><?php echo formatrp($jjumlah3); ?></td>
					<td align="right"><?php echo formatrp($jjumlah4); ?></td>
					<td align="right" colspan="2">&nbsp;</td>
				</tr><?php
				$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
			}?>
			<tr>
				<td colspan="9"><strong><?php echo 'JENIS PRODUK : '.$row['produk'];?></strong></td>
			</tr>
			<?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['norekgl']; ?></td>
			<td width="15%"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['pajak']); ?></td>
			<td><?php echo date_sql($row['tanggal']); ?></td>
			<td><?php echo $row['oper']; ?></td>
		</tr><?php 
		$jjumlah2=$jjumlah2+$row['bunga'];
		$jjumlah3=$jjumlah3+$row['adm'];
		$jjumlah4=$jjumlah4+$row['pajak'];
		$tjumlah2=$tjumlah2+$row['bunga'];
		$tjumlah3=$tjumlah3+$row['adm'];
		$tjumlah4=$tjumlah4+$row['pajak'];
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td align="center">&nbsp;</td>
		<td colspan="3" align="center"><?php echo 'JUMLAH : '; ?></td>
		<td align="right"><?php echo formatrp($jjumlah2); ?></td>
		<td align="right"><?php echo formatrp($jjumlah3); ?></td>
		<td align="right"><?php echo formatrp($jjumlah4); ?></td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="4" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right"><?php echo formatrp($tjumlah4); ?></td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
</tbody>