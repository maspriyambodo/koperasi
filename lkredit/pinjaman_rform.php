 <thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">No</th>
	<th rowspan="2">Nama Sales</th>
	<th rowspan="2">SB / JW</th>
	<th rowspan="2">Nominal</th>
	<th colspan="9" align="center">Potongan</th>
	<th rowspan="2">Jumlah</th>
	<th rowspan="2">Diterima</th>
	<th rowspan="2">Orang</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>Pokok Pel</th>
	<th>Bunga Pel</th>
	<th>Adm Pel</th>
	<th>ADM</th>
	<th>Provisi</th>
	<th>Meterai</th>
	<th>Premi</th>
	<th>Ang Awal</th>
	<th>Pot. Lainnya</th>
</tr>
</thead>
<tbody>
<?php
$no=1;
$tnomi=0;$tsaldo=0;$tlunas=0;$tbungakk=0;$tjumbtl=0;$tjumadm=0;$tjumprovisi=0;$tmeterai=0;$tjumpremi=0;$tpotongan=0;$tterima=0;$vbayar='9';$tjumangsur=0;$jnomi=0;$jsaldo=0;$jlunas=0;$jbungakk=0;$jjumbtl=0;$jjumadm=0;$jjumprovisi=0;$jmeterai=0;$jjumpremi=0;$jpotongan=0;$jterima=0;$jjumangsur=0;$jumangsur=0;$torang=0;$jorang=0;
while ($row=$result->row($hasil)){
	$kdkop=$row['kdkop'];
	$potongan=$row['plunas']+$row['blunas']+$row['dbunga']+$row['alunas']+$row['jumbtl']+$row['jumadm']+$row['jumprovisi']+$row['jumpremi']+$row['meterai']+$row['pot_angsuran']+$row['jum_period'];
	$terima=$row['nomi']-$potongan;
	if ($vbayar<>$row['produk']){
		if ($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td align="center" colspan="3">JUMLAH</td>
				<td align="right"><?php echo formatrp($tnomi); ?></td>
				<td align="right"><?php echo formatrp($tsaldo); ?></td>
				<td align="right"><?php echo formatrp($tlunas); ?></td>
				<td align="right"><?php echo formatrp($tbungakk); ?></td>
				<td align="right"><?php echo formatrp($tjumadm); ?></td>
				<td align="right"><?php echo formatrp($tjumprovisi); ?></td>
				<td align="right"><?php echo formatrp($tmeterai); ?></td>
				<td align="right"><?php echo formatrp($tjumpremi); ?></td>
				<td align="right"><?php echo formatrp($tjumangsur); ?></td>
				<td align="right"><?php echo formatrp($tjumbtl); ?></td>
				<td align="right"><?php echo formatrp($tpotongan); ?></td>
				<td align="right"><?php echo formatrp($tterima); ?></td>
				<td align="center"><?php echo formatrp($torang); ?></td>
			</tr> <?php
		} ?>
		<tr><td colspan="16"><strong><?php echo $row['produk'].' [ '.$row['nmproduk'].' ]';?></strong></td></tr><?php $tnomi=0;$tsaldo=0;$tlunas=0;$tbungakk=0;$tjumbtl=0;$tjumadm=0;$tjumprovisi=0;$tmeterai=0;$tjumpremi=0;$tpotongan=0;$tterima=0;$tjumangsur=0;$torang=0;
	} ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['kdsales'].' [ '.$row['nama'].' ]'; ?></td>
		<td><?php echo $row['suku'].'% - '.$row['jangka'];?> Bulan</td>
		<td align="right"><?php echo formatrp($row['nomi']); ?></td>
		<td align="right"><?php echo formatrp($row['plunas']); ?></td>
		<td align="right"><?php echo formatrp($row['blunas']); ?></td>
		<td align="right"><?php echo formatrp($row['dbunga']+$row['alunas']); ?></td>
		<td align="right"><?php echo formatrp($row['jumadm']); ?></td>
		<td align="right"><?php echo formatrp($row['jumprovisi']); ?></td>
		<td align="right"><?php echo formatrp($row['meterai']); ?></td>
		<td align="right"><?php echo formatrp($row['jumpremi']); ?></td>
		<td align="right"><?php echo formatrp($row['pot_angsuran']); ?></td>
		<td align="right"><?php echo formatrp($row['jumbtl']+$row['jum_period']); ?></td>
		<td align="right"><?php echo formatrp($potongan); ?></td>
		<td align="right"><?php echo formatrp($terima); ?></td>
		<td align="center"><?php echo $row['orang']; ?></td>
	</tr>
	<?php 
	$tnomi=$tnomi+$row['nomi'];
	$tsaldo=$tsaldo+$row['plunas'];
	$tlunas=$tlunas+$row['blunas'];
	$tbungakk=$tbungakk+$row['dbunga']+$row['alunas'];
	$tjumbtl=$tjumbtl+$row['jumbtl']+$row['jum_period'];
	$tjumadm=$tjumadm+$row['jumadm'];
	$tjumprovisi=$tjumprovisi+$row['jumprovisi'];
	$tmeterai=$tmeterai+$row['meterai'];
	$tjumpremi=$tjumpremi+$row['jumpremi'];
	$tpotongan=$tpotongan+$potongan;
	$tterima=$tterima+$terima;
	
	$tjumangsur=$tjumangsur+$row['pot_angsuran'];
	$torang=$torang+$row['orang'];
	$jnomi=$jnomi+$row['nomi'];
	$jsaldo=$jsaldo+$row['plunas'];
	$jlunas=$jlunas+$row['blunas'];
	$jbungakk=$jbungakk+$row['dbunga']+$row['alunas'];
	$jjumbtl=$jjumbtl+$row['jumbtl']+$row['jum_period'];
	$jjumadm=$jjumadm+$row['jumadm'];
	$jjumprovisi=$jjumprovisi+$row['jumprovisi'];
	$jmeterai=$jmeterai+$row['meterai'];
	$jjumpremi=$jjumpremi+$row['jumpremi'];
	$jpotongan=$jpotongan+$potongan;
	$jterima=$jterima+$terima;
	$jjumangsur=$jjumangsur+$row['pot_angsuran'];
	$jorang=$jorang+$row['orang'];
	$vbayar=$row['produk'];
	$no++;
}
?>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="3">JUMLAH</td>
	<td align="right"><?php echo formatrp($tnomi); ?></td>
	<td align="right"><?php echo formatrp($tsaldo); ?></td>
	<td align="right"><?php echo formatrp($tlunas); ?></td>
	<td align="right"><?php echo formatrp($tbungakk); ?></td>
	<td align="right"><?php echo formatrp($tjumadm); ?></td>
	<td align="right"><?php echo formatrp($tjumprovisi); ?></td>
	<td align="right"><?php echo formatrp($tmeterai); ?></td>
	<td align="right"><?php echo formatrp($tjumpremi); ?></td>
	<td align="right"><?php echo formatrp($tjumangsur); ?></td>
	<td align="right"><?php echo formatrp($tjumbtl); ?></td>
	<td align="right"><?php echo formatrp($tpotongan); ?></td>
	<td align="right"><?php echo formatrp($tterima); ?></td>
	<td align="center"><?php echo formatrp($torang); ?></td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="3">TOTAL</td>
	<td align="right"><?php echo formatrp($jnomi); ?></td>
	<td align="right"><?php echo formatrp($jsaldo); ?></td>
	<td align="right"><?php echo formatrp($jlunas); ?></td>
	<td align="right"><?php echo formatrp($jbungakk); ?></td>
	<td align="right"><?php echo formatrp($jjumadm); ?></td>
	<td align="right"><?php echo formatrp($jjumprovisi); ?></td>
	<td align="right"><?php echo formatrp($jmeterai); ?></td>
	<td align="right"><?php echo formatrp($jjumpremi); ?></td>
	<td align="right"><?php echo formatrp($jjumangsur); ?></td>
	<td align="right"><?php echo formatrp($jjumbtl); ?></td>
	<td align="right"><?php echo formatrp($jpotongan); ?></td>
	<td align="right"><?php echo formatrp($jterima); ?></td>
	<td align="center"><?php echo formatrp($jorang); ?></td>
</tr>
</tbody>