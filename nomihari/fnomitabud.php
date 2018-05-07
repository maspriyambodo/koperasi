<thead>
	<tr>
		<th rowspan="2">NO</th>
		<th rowspan="2">NOREK</th>
		<th rowspan="2">NAMA</th>
		<th rowspan="2">TG BUKA</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI KAS</th>
		<th colspan="2">MUTASI MEMORIAL</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">SALDO EFEKTIF</th>
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
	if ($vbayar<>$row['produk']){
		if ($no>1){ ?>
			<tr>
				<td colspan="4">JUMLAH</td>
				<td align="right"><?php echo formatrp($sawal); ?></td>
				<td align="right"><?php echo formatrp($kdebet); ?></td>
				<td align="right"><?php echo formatrp($kkredit); ?></td>
				<td align="right"><?php echo formatrp($mdebet); ?></td>
				<td align="right"><?php echo formatrp($mkredit); ?></td>
				<td align="right"><?php echo formatrp($sakhir); ?></td>
				<td align="right"><?php echo formatrp($nomi); ?></td>
			</tr> <?php
		} ?>
		<tr>
			<td colspan="11"><strong><?php echo 'JENIS TABUNGAN : '.$row['produk'];?></strong></td>
		</tr> <?php
		$nomi=0;$sawal=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;$sakhir=0;$org=0;$no=1;
	}		
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['norek']; ?></td>
		<td width="25%"><?php echo $row['nama']; ?></td>
		<td><?php echo $row['tgbuka']; ?></td>
		<td align="right" width="10%"><?php echo formatrp($row['saldoawal']); ?></td>
		<td align="right"><?php echo formatrp($row['mutdebet']); ?></td>
		<td align="right"><?php echo formatrp($row['mutkredit']); ?></td>
		<td align="right"><?php echo formatrp($row['memdebet']); ?></td>
		<td align="right"><?php echo formatrp($row['memkredit']); ?></td>
		<td align="right" width="10%"><?php echo formatrp($row['saldoakhir']); ?></td>
		<td align="right" width="10%"><?php echo formatrp($row['efektif']); ?></td>
	</tr> <?php
	$nomi=$nomi+$row['efektif'];
	$sawal=$sawal+$row['saldoawal'];
	$kdebet=$kdebet+$row['mutdebet'];
	$kkredit=$kkredit+$row['mutkredit'];
	$mdebet=$mdebet+$row['memdebet'];
	$mkredit=$mkredit+$row['memkredit'];
	$sakhir=$sakhir+$row['saldoakhir'];
	$tnomi=$tnomi+$row['efektif'];
	$tsawal=$tsawal+$row['saldoawal'];
	$tkdebet=$tkdebet+$row['mutdebet'];
	$tkkredit=$tkkredit+$row['mutkredit'];
	$tmdebet=$tmdebet+$row['memdebet'];
	$tmkredit=$tmkredit+$row['memkredit'];
	$tsakhir=$tsakhir+$row['saldoakhir'];
	$vbayar	=$row['produk'];
	$no++;
}?>
<tr>
	<td colspan="4">JUMLAH</td>
	<td align="right"><?php echo formatrp($sawal); ?></td>
	<td align="right"><?php echo formatrp($kdebet); ?></td>
	<td align="right"><?php echo formatrp($kkredit); ?></td>
	<td align="right"><?php echo formatrp($mdebet); ?></td>
	<td align="right"><?php echo formatrp($mkredit); ?></td>
	<td align="right"><?php echo formatrp($sakhir); ?></td>
	<td align="right"><?php echo formatrp($nomi); ?></td>
</tr>
<tr>
	<td colspan="4">TOTAL</td>
	<td align="right"><?php echo formatrp($tsawal); ?></td>
	<td align="right"><?php echo formatrp($tkdebet); ?></td>
	<td align="right"><?php echo formatrp($tkkredit); ?></td>
	<td align="right"><?php echo formatrp($tmdebet); ?></td>
	<td align="right"><?php echo formatrp($tmkredit); ?></td>
	<td align="right"><?php echo formatrp($tsakhir); ?></td>
	<td align="right"><?php echo formatrp($tnomi); ?></td>
</tr>
</tbody>
