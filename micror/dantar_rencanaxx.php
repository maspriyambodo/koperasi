<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NOREK</th>
	<th>NAMA</th>
	<th>TANGGAL</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>KE</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;
	while ($row = $result->fetch_array(MYSQLI_BOTH)) {
		if ($vbayar!=$row['kdsales']){
			if ($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="4" align="center">JUMLAH</td>
				<td align="right"><?php echo number_format($jpokok); ?></td>
				<td align="right"><?php echo number_format($jbunga); ?></td>
				<td align="right"><?php echo number_format($jadm); ?></td>
				<td align="right"><?php echo number_format($jumlah1); ?></td>
				<td align="right">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr><?php
			}?>
			<tr><td colspan="9"><strong><?php echo ' KODE SALES : '.$row['kdsales']; ?></strong></td></tr><?php
			$no=1;
		}?>
		<tr>
			<td><?php echo $no; ?></td>
			<td ><?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['tanggal']; ?></td>
			<td align="right"><?php echo number_format($row['pokok']); ?></td>
			<td align="right"><?php echo number_format($row['bunga']); ?></td>
			<td align="right"><?php echo number_format($row['adm']); ?></td>
			<td align="right"><?php echo number_format($row['jumlah']); ?></td>
			<td align="center"><?php echo $row['angsurke']; ?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		
		$vbayar=$row['kdsales'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center">JUMLAH</td>
		<td align="right"><?php echo number_format($jpokok); ?></td>
		<td align="right"><?php echo number_format($jbunga); ?></td>
		<td align="right"><?php echo number_format($jadm); ?></td>
		<td align="right"><?php echo number_format($jumlah1); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center">TOTAL</td>
		<td align="right"><?php echo number_format($tpokok); ?></td>
		<td align="right"><?php echo number_format($tbunga); ?></td>
		<td align="right"><?php echo number_format($tadm); ?></td>
		<td align="right"><?php echo number_format($tjumlah1); ?></td>
		<td align="right">&nbsp;</td>
	</tr>
</tbody>