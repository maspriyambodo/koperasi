<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">NO NASABAH</th>
		<th rowspan="2">NO REKENING</th>
		<th rowspan="2">NAMA</th>
		<th rowspan="2">TG TRAN</th>
		<th rowspan="2">NOMINAL</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">KOLEK/JW/SB</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>DEBET</th>
		<th>KREDIT</th>
	</tr>
</thead>
<tbody>
<?php
$vbayar='';;$vlunas='';$no=1;
$jml_nomi=0;$jml_sawal=0;$jml_kdebet=0;$jml_kkredit=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;$jml_loan=0;
$grand_nomi=0;$grand_sawal=0;$grand_kdebet=0;$grand_kkredit=0;$grand_mdebet=0;$grand_mkredit=0;$grand_sakhir=0;$grand_loan=0;
$total_nomi=0;$total_sawal=0;$total_kdebet=0;$total_kkredit=0;$total_mdebet=0;$total_mkredit=0;$total_sakhir=0;$total_loan=0;
$tgl=date_sql($tanggal);
$bln =date('m',strtotime($tgl));
$bln .=date('Y',strtotime($tgl));
while ($row=$result->row($hasil)){
	if ($vbayar!=$row['produk']){ 
		if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td>&nbsp;</td>
				<td colspan="4"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
				<td align="right"><?php echo formatrp($jml_nomi); ?></td>
				<td align="right"><?php echo formatrp($jml_sawal); ?></td>
				<td align="right"><?php echo formatrp($jml_kdebet); ?></td>
				<td align="right"><?php echo formatrp($jml_kkredit); ?></td>
				<td align="right"><?php echo formatrp($jml_sakhir); ?></td>
				<td>&nbsp;</td>
			</tr>
			<tr class="td" bgcolor="#e5e5e5">
				<td align="center" colspan="5"><strong>GRAND TOTAL</strong></td>
				<td align="right"><?php echo formatrp($grand_nomi); ?></td>
				<td align="right"><?php echo formatrp($grand_sawal); ?></td>
				<td align="right"><?php echo formatrp($grand_kdebet); ?></td>
				<td align="right"><?php echo formatrp($grand_kkredit); ?></td>
				<td align="right"><?php echo formatrp($grand_sakhir); ?></td>
				<td>&nbsp;</td>
			</tr><?php
			$jml_nomi=0;$jml_sawal=0;$jml__kdebet=0;$jml_kkredit=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;$jml_loan=0;
			$grand_nomi=0;$grand_sawal=0;$grand_kdebet=0;$grand_kkredit=0;$grand_mdebet=0;$grand_mkredit=0;$grand_sakhir=0;$grand_loan=0;
		}?>
		<tr><td colspan="11"><strong><?php echo $row['nmproduk']; ?></strong></td></tr><?php
	}
	if($no>1){
		if ($vlunas!=$row['kkbayar']){ 
			if ($vbayar==$row['produk']){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td>&nbsp;</td>
					<td colspan="4"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo formatrp($jml_nomi); ?></td>
					<td align="right"><?php echo formatrp($jml_sawal); ?></td>
					<td align="right"><?php echo formatrp($jml_kdebet); ?></td>
					<td align="right"><?php echo formatrp($jml_kkredit); ?></td>
					<td align="right"><?php echo formatrp($jml_sakhir); ?></td>
					<td>&nbsp;</td>
				</tr>
				<?php
			}
			$jml_nomi=0;$jml_sawal=0;$jml__kdebet=0;$jml_kkredit=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;$jml_loan=0;
		}
	} ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['nonas']; ?></td>
		<td><?php echo $row['norek']; ?></td>
		<td><?php echo $row['nama']; ?></td>
		<td ><?php echo date_sql($row['tgtran']); ?></td>
		<td align="right"><?php echo formatrp($row['nomi']); ?></td>
		<td align="right"><?php echo formatrp($row['saldo_awal']); ?></td>
		<td align="right"><?php echo formatrp($row['mutasi_debet']); ?></td>
		<td align="right"><?php echo formatrp($row['mutasi_kredit']); ?></td>
		<td align="right"><?php echo formatrp($row['saldo_akhir']); ?></td>
		<td align="right"><?php echo $row['kolek']." - ".$row['jangka']." - ".$row['suku']; ?></td>
	</tr> <?php
	$jml_nomi=$jml_nomi+$row['nomi'];
	$jml_sawal=$jml_sawal+$row['saldo_awal'];
	$jml_kdebet=$jml_kdebet+$row['mutasi_debet'];
	$jml_kkredit=$jml_kkredit+$row['mutasi_kredit'];
	$jml_sakhir=$jml_sakhir+$row['saldo_akhir'];
	
	$grand_nomi=$grand_nomi+$row['nomi'];
	$grand_sawal=$grand_sawal+$row['saldo_awal'];
	$grand_kdebet=$grand_kdebet+$row['mutasi_debet'];
	$grand_kkredit=$grand_kkredit+$row['mutasi_kredit'];
	$grand_sakhir=$grand_sakhir+$row['saldo_akhir'];

	$total_nomi=$total_nomi+$row['nomi'];
	$total_sawal=$total_sawal+$row['saldo_awal'];
	$total_kdebet=$total_kdebet+$row['mutasi_debet'];
	$total_kkredit=$total_kkredit+$row['mutasi_kredit'];
	$total_sakhir=$total_sakhir+$row['saldo_akhir'];
	
	$vbayar=$row['produk'];
	$vlunas=$row['kkbayar'];
	$vnmbayar=$row['nmbayar'];
	$no++;
}?>
<tr class="td" bgcolor="#e5e5e5">
	<td>&nbsp;</td>
	<td colspan="4"><strong>JUMLAH  <?php echo $vnmbayar; ?></strong></td>
	<td align="right"><?php echo formatrp($jml_nomi); ?></td>
	<td align="right"><?php echo formatrp($jml_sawal); ?></td>
	<td align="right"><?php echo formatrp($jml_kdebet); ?></td>
	<td align="right"><?php echo formatrp($jml_kkredit); ?></td>
	<td align="right"><?php echo formatrp($jml_sakhir); ?></td>
	<td>&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="5"><strong>GRAND TOTAL </strong>:</td>
	<td align="right"><?php echo formatrp($grand_nomi); ?></td>
	<td align="right"><?php echo formatrp($grand_sawal); ?></td>
	<td align="right"><?php echo formatrp($grand_kdebet); ?></td>
	<td align="right"><?php echo formatrp($grand_kkredit); ?></td>
	<td align="right"><?php echo formatrp($grand_sakhir); ?></td>
	<td>&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="5"><strong>TOTAL </strong>:</td>
	<td align="right"><?php echo formatrp($total_nomi); ?></td>
	<td align="right"><?php echo formatrp($total_sawal); ?></td>
	<td align="right"><?php echo formatrp($total_kdebet); ?></td>
	<td align="right"><?php echo formatrp($total_kkredit); ?></td>
	<td align="right"><?php echo formatrp($total_sakhir); ?></td>
	<td>&nbsp;</td>
</tr>
</tbody>
