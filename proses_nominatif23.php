<thead>
<tr><th colspan="10"><strong><?php echo $desc;?></strong></th></tr>
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
while ($row = $result->row($hasil)) {
	$kolek=$row['kolek'];
	include 'parameter/ketkolek.php';
	if ($vbayar<>$row['produk']){
		if ($no>1){ ?>
			<tr>
				<td colspan="2">JUMLAH</td>
				<td align="right"><?php echo formatrp($nomi); ?></td>
				<td align="right"><?php echo formatrp($sawal); ?></td>
				<td align="right"><?php echo formatrp($kdebet); ?></td>
				<td align="right"><?php echo formatrp($kkredit); ?></td>
				<td align="right"><?php echo formatrp($mdebet); ?></td>
				<td align="right"><?php echo formatrp($mkredit); ?></td>
				<td align="right"><?php echo formatrp($sakhir); ?></td>
				<td align="right"><?php echo formatrp($org); ?></td>
			</tr><?php
		}?>
		<tr><td colspan="10"><strong><?php echo 'JENIS PEMINJAM : '.$row['produk'].' - '.$row['deb1']; ?></strong></td></tr><?php
		$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;
	}?>
	<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $xkolek; ?></td>
	<td align="right"><?php echo formatrp($row['nomi']); ?></td>
	<td align="right"><?php echo formatrp($row['saldo']); ?></td>
	<td align="right"><?php echo formatrp($row['mutdeb']); ?></td>
	<td align="right"><?php echo formatrp($row['mutkre']); ?></td>
	<td align="right"><?php echo formatrp($row['memdeb']); ?></td>
	<td align="right"><?php echo formatrp($row['memkre']); ?></td>
	<td align="right"><?php echo formatrp($row['saldoa']); ?></td>
	<td align="right"><?php echo formatrp($row['counter']); ?></td>
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
	$vbayar	=$row['produk'];
	$no++;
}
?>
<tr>
<td colspan="2">JUMLAH</td>
	<td align="right"><?php echo formatrp($nomi); ?></td>
	<td align="right"><?php echo formatrp($sawal); ?></td>
	<td align="right"><?php echo formatrp($kdebet); ?></td>
	<td align="right"><?php echo formatrp($kkredit); ?></td>
	<td align="right"><?php echo formatrp($mdebet); ?></td>
	<td align="right"><?php echo formatrp($mkredit); ?></td>
	<td align="right"><?php echo formatrp($sakhir); ?></td>
	<td align="right"><?php echo formatrp($org); ?></td>
</tr>
<tr>
<td colspan="2">TOTAL</td>
	<td align="right"><?php echo formatrp($tnomi); ?></td>
	<td align="right"><?php echo formatrp($tsawal); ?></td>
	<td align="right"><?php echo formatrp($tkdebet); ?></td>
	<td align="right"><?php echo formatrp($tkkredit); ?></td>
	<td align="right"><?php echo formatrp($tmdebet); ?></td>
	<td align="right"><?php echo formatrp($tmkredit); ?></td>
	<td align="right"><?php echo formatrp($tsakhir); ?></td>
	<td align="right"><?php echo formatrp($torg); ?></td>
</tr>
</tbody>