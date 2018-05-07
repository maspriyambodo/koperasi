<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>KANTOR BAYAR</th>
	<th>PLAFOND</th>
	<th>OBD</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>DENDA</th>
	<th>JUMLAH</th>
	<th>REK</th>
</tr>
</thead>
<tbody><?php
	$no=1;$vbayar="";
	$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0; $jumlah1=0;$jumlah2=0;$jml_saldoa1=0;$jml_saldoa2=0;
	$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0; $tjumlah1=0;$tjumlah2=0;$jml_saldoa3=0;$jml_saldoa4=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){
			if ($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="2" align="center">JUMLAH</td>
					<td align="right"><?php echo formatrp($jml_saldoa1); ?></td>
					<td align="right"><?php echo formatrp($jml_saldoa2); ?></td>
					<td align="right"><?php echo formatrp($jpokok); ?></td>
					<td align="right"><?php echo formatrp($jbunga); ?></td>
					<td align="right"><?php echo formatrp($jadm); ?></td>
					<td align="right"><?php echo formatrp($jdenda); ?></td>
					<td align="right"><?php echo formatrp($jumlah1); ?></td>
					<td align="right"><?php echo formatrp($jumlah2); ?></td>
				</tr><?php
				$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0; $jumlah1=0;$jumlah2=0;$jml_saldoa1=0;$jml_saldoa2=0;
			} ?>
			<tr><td colspan="10"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
			$no=1;
		}?>
		<tr>
			<td ><?php echo $no;?></td>
			<td width="20%"><?php echo $row['nmbayar'];?></td>
			<td align="right"><?php echo formatrp($row['nomi']);?></td>
			<td align="right"><?php echo formatrp($row['saldoa']);?></td>
			<td align="right"><?php echo formatrp($row['pokok']);?></td>
			<td align="right"><?php echo formatrp($row['bunga']);?></td>
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
		$jml_saldoa1=$jml_saldoa3+$row['nomi'];
		$jml_saldoa2=$jml_saldoa2+$row['saldoa'];

		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['rekening'];
		$jml_saldoa3=$jml_saldoa3+$row['nomi'];
		$jml_saldoa4=$jml_saldoa4+$row['saldoa'];

		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jml_saldoa1); ?></td>
		<td align="right"><?php echo formatrp($jml_saldoa2); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jdenda); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($jml_saldoa3); ?></td>
		<td align="right"><?php echo formatrp($jml_saldoa4); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tdenda); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
	</tr>
</tbody>
