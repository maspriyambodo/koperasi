<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>PRODUK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>PAJAK</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){
		$no=1;
		?>
		<tr>
			<td><?php echo $no; ?></td>
			<td width="15%"><?php echo $row['produk']; ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['pajak']); ?></td>
		</tr>
		<?php 
		$tjumlah2=$tjumlah2+$row['bunga'];
		$tjumlah3=$tjumlah3+$row['adm'];
		$tjumlah4=$tjumlah4+$row['pajak'];
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center"><strong>TOTAL</strong></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right"><?php echo formatrp($tjumlah4); ?></td>
	</tr>
</tbody>