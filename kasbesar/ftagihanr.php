<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">NOREK</th>
	<th rowspan="2">NAMA</th>
	<th colspan="2">MUTASI KAS</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;?>
	<tr>
		<td colspan="4">SALDO AWAL</td><td align="right"><?php echo formatrp($saldo_awal); ?></td>
	</tr><?php
	while ($row=$result->row($hasil)){ 
		if ($vbayar!=$row['produk']){
			if($no>1){?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="3" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jbunga); ?></td>
				<td align="right"><?php echo formatrp($jpokok); ?></td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr><?php
			}?>
			<tr>
				<td colspan="5"><strong><?php echo ' TYPE REKENING : '.$row['produk']; ?></strong></td>
			</tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td><?php echo substr($row['norekgl'],0,4).'-'.substr($row['norekgl'],4,6).'-'.substr($row['norekgl'],-3); ?></td>
			<td width="30%"><?php echo $row['nama']; ?></td>
			<td align="right"><?php echo formatrp($row['kreditm']); ?></td>
			<td align="right"><?php echo formatrp($row['debetm']); ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['debetm'];
		$jbunga=$jbunga+$row['kreditm'];
		
		$tbunga=$tbunga+$row['kreditm'];
		$tpokok=$tpokok+$row['debetm'];
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="3" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
	</tr>
	<tr>
		<td colspan="4">SALDO AKHIR</td><td align="right"><?php echo formatrp($saldo_awal+$tbunga-$tpokok); ?></td>
	</tr>
</tbody>