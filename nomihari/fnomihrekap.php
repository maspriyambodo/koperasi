<thead>
<tr>
	<th rowspan="2">NO</th>
	<th rowspan="2">KOLEKTIBILITAS</th>
	<th rowspan="2">NOMINAL</th>
	<th rowspan="2">SALDO AWAL</th>
	<th colspan="2">MUTASI KAS</th>
	<th colspan="2">MUTASI MEMORIAL</th>
	<th rowspan="2">SALDO AKHIR</th>
	<th rowspan="2">ORANG</th>
</tr>
<tr>
	<th>DEBET</th>
	<th>KREDIT</th>
	<th>DEBET</th>
	<th>KREDIT</th>
</tr>
</thead>
<tbody>
<?php
$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;$vbayar='';
$tnomi=0;$tsawal=0;$tkdebet=0;$tkkredit=0;$tmdebet=0;$tmkredit=0;$tsakhir=0;$torg=0;
while ($row = $result->fetch_array(MYSQLI_BOTH)) {
	$kolek=$row['kolek'];
	include '../help/ketkolek.php';
	if ($vbayar<>$row['kkbayar']){
		if ($no>1){ ?>
			<tr>
				<td colspan="2">JUMLAH</td>
				<td align="right"><?php echo number_format($nomi); ?></td>
				<td align="right"><?php echo number_format($sawal); ?></td>
				<td align="right"><?php echo number_format($kdebet); ?></td>
				<td align="right"><?php echo number_format($kkredit); ?></td>
				<td align="right"><?php echo number_format($mdebet); ?></td>
				<td align="right"><?php echo number_format($mkredit); ?></td>
				<td align="right"><?php echo number_format($sakhir); ?></td>
				<td align="right"><?php echo number_format($org); ?></td>
			</tr><?php
		}?>
		<tr>
			<td colspan="10"><strong><?php echo 'KANTOR BAYAR : '.$row['kkbayar'].' [ '.$row['nmbayar'].' ]';?></strong></td>
		</tr><?php
		$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;
	}		
	?>
	<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $xkolek; ?></td>
	<td align="right"><?php echo number_format($row['nomi']); ?></td>
	<td align="right" width="10%"><?php echo number_format($row['saldo']); ?></td>
	<td align="right"><?php echo number_format($row['mutdeb']); ?></td>
	<td align="right"><?php echo number_format($row['mutkre']); ?></td>
	<td align="right"><?php echo number_format($row['memdeb']); ?></td>
	<td align="right"><?php echo number_format($row['memkre']); ?></td>
	<td align="right" width="10%"><?php echo number_format($row['saldoa']); ?></td>
	<td align="right"><?php echo number_format($row['counter']); ?></td>
	</tr>
	<?php
	$nomi=$nomi+$row['nomi'];
	$sawal=$sawal+$row['saldo'];
	$kdebet=$kdebet+$row['mutdeb'];
	$kkredit=$kkredit+$row['mutkre'];
	$mdebet=$mdebet+$row['memdeb'];
	$mkredit=$mkredit+$row['memkre'];
	$sakhir=$sakhir+$row['saldoa'];
	$org=$org+$row['counter'];
	$tnomi=$tnomi+$row['nomi'];
	$tsawal=$tsawal+$row['saldo'];
	$tkdebet=$tkdebet+$row['mutdeb'];
	$tkkredit=$tkkredit+$row['mutkre'];
	$tmdebet=$tmdebet+$row['memdeb'];
	$tmkredit=$tmkredit+$row['memkre'];
	$tsakhir=$tsakhir+$row['saldoa'];
	$torg=$torg+$row['counter'];
	$vbayar=$row['kkbayar'];
	$no++;
}
?>
<tr>
<td colspan="2">JUMLAH</td>
	<td align="right"><?php echo number_format($nomi); ?></td>
	<td align="right"><?php echo number_format($sawal); ?></td>
	<td align="right"><?php echo number_format($kdebet); ?></td>
	<td align="right"><?php echo number_format($kkredit); ?></td>
	<td align="right"><?php echo number_format($mdebet); ?></td>
	<td align="right"><?php echo number_format($mkredit); ?></td>
	<td align="right"><?php echo number_format($sakhir); ?></td>
	<td align="right"><?php echo number_format($org); ?></td>
</tr>
<tr>
<td colspan="2">TOTAL</td>
	<td align="right"><?php echo number_format($tnomi); ?></td>
	<td align="right"><?php echo number_format($tsawal); ?></td>
	<td align="right"><?php echo number_format($tkdebet); ?></td>
	<td align="right"><?php echo number_format($tkkredit); ?></td>
	<td align="right"><?php echo number_format($tmdebet); ?></td>
	<td align="right"><?php echo number_format($tmkredit); ?></td>
	<td align="right"><?php echo number_format($tsakhir); ?></td>
	<td align="right"><?php echo number_format($torg); ?></td>
</tr>
</tbody>
