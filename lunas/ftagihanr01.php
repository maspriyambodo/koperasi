<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NAMA SALES</th>
	<th>KANTOR BAYAR</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>REK</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row=$result->row($hasil)){
		if ($vbayar!=$row['produk']){
			if ($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="3" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jpokok); ?></td>
				<td align="right"><?php echo formatrp($jbunga); ?></td>
				<td align="right"><?php echo formatrp($jadm); ?></td>
				<td align="right"><?php echo formatrp($jumlah1); ?></td>
				<td align="right"><?php echo formatrp($jumlah2); ?></td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr><?php
			} ?>
			<tr>
				<td colspan="8"><strong><?php echo $row['nmproduk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td ><?php echo $no; ?></td>
			<td ><?php echo $row['namas']; ?></td>
			<td ><?php echo $row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right" width="5%"><?php echo formatrp($row['rekening']); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		$jumlah2=$jumlah2+$row['rekening'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tjumlah2=$tjumlah2+$row['rekening'];
		
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right"><?php echo formatrp($jumlah2); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
	</tr>
</tbody>
