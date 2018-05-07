<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>PRODUK</th>
	<th>NOMINAL</th>
	<th>OBD</th>
	<th>POKOK</th>
	<th>%</th>
	<th>BUNGA</th>
	<th>%</th>
	<th>ADM</th>
	<th>DENDA</th>
	<th>JUMLAH</th>
	<th>REK</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0; $jumlah1=0;$jumlah2=0;$no=1;$jml_saldoa3=0;$jml_saldoa4=0;
	while ($row=$result->row($hasil)){
		$jml_saldoa1=0;$jml_saldoa2=0;
		$jml_saldoa1=($row['pokok']/$row['saldoa'])*100;
		$jml_saldoa2=($row['bunga']/$row['saldoa'])*100;
		?>
		<tr>
			<td ><?php echo $no;?></td>
			<td ><?php echo $row['nmproduk'];?></td>
			<td align="right"><?php echo formatrp($row['nomi']);?></td>
			<td align="right"><?php echo formatrp($row['saldoa']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo number_format($jml_saldoa1,2);?>%</td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
			<td align="right"><?php echo number_format($jml_saldoa2,2);?>%</td>
			<td align="right"><?php echo formatrp($row['adm']);?></td>
			<td align="right"><?php echo formatrp($row['denda']);?></td>
			<td align="right"><?php echo formatrp($row['jumlah']);?></td>
			<td align="right"><?php echo formatrp($row['rekening']);?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		$jumlah2=$jumlah2+$row['rekening'];
		$jml_saldoa3=$jml_saldoa3+$row['nomi'];
		$jml_saldoa4=$jml_saldoa4+$row['saldoa'];
		$no++;
	}
	$jml_saldoa1=0;$jml_saldoa2=0;
	$jml_saldoa1=($jpokok/$jml_saldoa4)*100;
	$jml_saldoa2=($jbunga/$jml_saldoa4)*100;
	?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jml_saldoa3); ?></td>
		<td align="right"><?php echo formatrp($jml_saldoa4); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo number_format($jml_saldoa1,2);?>%</td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo number_format($jml_saldoa2,2);?>%</td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jdenda); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
	</tr>
</tbody>
