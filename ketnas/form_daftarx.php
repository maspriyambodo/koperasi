<table style="border-collapse: collapse;" width="100%" border="1" align="center" cellpadding="3px" >
<thead>
	<tr><td colspan="14" align="center"><?php echo $desc.'<br>'.$cabang;?></td></tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">NO</th>
		<th rowspan="2">NO NASABAH</th>
		<th rowspan="2">NO REKENING</th>
		<th rowspan="2">NAMA</th>
		<th rowspan="2">TG TRAN</th>
		<th rowspan="2">PLAFOND</th>
		<th rowspan="2">SALDO AWAL</th>
		<th colspan="2">MUTASI KAS</th>
		<th colspan="2">MUTASI MEMORIAL</th>
		<th rowspan="2">SALDO AKHIR</th>
		<th rowspan="2">SCEDULE</th>
		<th rowspan="2">KOLEK/JW/SB</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>DEBET</th>
		<th>KREDIT</th>
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
				<td align="right"><?php echo $jml_nomi;?></td>
				<td align="right"><?php echo $jml_sawal;?></td>
				<td align="right"><?php echo $jml_kdebet;?></td>
				<td align="right"><?php echo $jml_kkredit;?></td>
				<td align="right"><?php echo $jml_mdebet;?></td>
				<td align="right"><?php echo $jml_mkredit;?></td>
				<td align="right"><?php echo $jml_sakhir;?></td>
				<td align="right"><?php echo $jml_loan;?></td>
				<td>&nbsp;</td>
			</tr>
			<tr class="td" bgcolor="#e5e5e5">
				<td align="center" colspan="5"><strong>GRAND TOTAL</strong></td>
				<td align="right"><?php echo $grand_nomi;?></td>
				<td align="right"><?php echo $grand_sawal;?></td>
				<td align="right"><?php echo $grand_kdebet;?></td>
				<td align="right"><?php echo $grand_kkredit;?></td>
				<td align="right"><?php echo $grand_mdebet;?></td>
				<td align="right"><?php echo $grand_mkredit;?></td>
				<td align="right"><?php echo $grand_sakhir;?></td>
				<td align="right"><?php echo $grand_loan;?></td>
				<td>&nbsp;</td>
				<?php
				$jml_nomi=0;$jml_sawal=0;$jml__kdebet=0;$jml_kkredit=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;$jml_loan=0;
				$grand_nomi=0;$grand_sawal=0;$grand_kdebet=0;$grand_kkredit=0;$grand_mdebet=0;$grand_mkredit=0;$grand_sakhir=0;$grand_loan=0;
				?>
			</tr><?php
		}
		?>
		<tr>
			<td colspan="14"><strong><?php echo $row['nmproduk']; ?></strong></td>
		</tr>
		<?php
	}
	if($no>1){
		if ($vlunas!=$row['kkbayar']){ 
			if ($vbayar==$row['produk']){ ?>
				<tr>
					<td>&nbsp;</td>
					<td colspan="4"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
					<td align="right"><?php echo $jml_nomi;?></td>
					<td align="right"><?php echo $jml_sawal;?></td>
					<td align="right"><?php echo $jml_kdebet;?></td>
					<td align="right"><?php echo $jml_kkredit;?></td>
					<td align="right"><?php echo $jml_mdebet;?></td>
					<td align="right"><?php echo $jml_mkredit;?></td>
					<td align="right"><?php echo $jml_sakhir;?></td>
					<td align="right"><?php echo $jml_loan;?></td>
					<td>&nbsp;</td>
				</tr>
				<?php
			}
			$jml_nomi=0;$jml_sawal=0;$jml__kdebet=0;$jml_kkredit=0;$jml_mdebet=0;$jml_mkredit=0;$jml_sakhir=0;$jml_loan=0;
		}
	} ?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $row['branch'].'-'.$row['nonas'].'-'.$row['sufix']; ?></td>
		<td><?php echo $row['norek'];?></td>
		<td><?php echo $row['nama'];?></td>
		<td ><?php echo date_sql($row['tgtran']);?></td>
		<td align="right"><?php echo $row['nomi'];?></td>
		<td align="right"><?php echo $row['saldo'];?></td>
		<td align="right"><?php echo $row['mutdeb'];?></td>
		<td align="right"><?php echo $row['mutkre'];?></td>
		<td align="right"><?php echo $row['memdeb'];?></td>
		<td align="right"><?php echo $row['memkre'];?></td>
		<td align="right"><?php echo $row['saldoa'];?></td>
		<td align="right"><?php echo $row['nomi']-$row['jumlah'];?></td>
		<td align="right"><?php echo $row['kolek']." - ".$row['jangka']." - ".$row['suku']; ?></td>
		<td align="right"><?php echo $row['nmbayar'];?></td>
	</tr> <?php
	$jml_nomi=$jml_nomi+$row['nomi'];
	$jml_sawal=$jml_sawal+$row['saldo'];
	$jml_kdebet=$jml_kdebet+$row['mutdeb'];
	$jml_kkredit=$jml_kkredit+$row['mutkre'];
	$jml_mdebet=$jml_mdebet+$row['memdeb'];
	$jml_mkredit=$jml_mkredit+$row['memkre'];
	$jml_sakhir=$jml_sakhir+$row['saldoa'];
	$jml_loan=$jml_loan+($row['nomi']-$row['jumlah']);
	
	$grand_nomi=$grand_nomi+$row['nomi'];
	$grand_sawal=$grand_sawal+$row['saldo'];
	$grand_kdebet=$grand_kdebet+$row['mutdeb'];
	$grand_kkredit=$grand_kkredit+$row['mutkre'];
	$grand_mdebet=$grand_mdebet+$row['memdeb'];
	$grand_mkredit=$grand_mkredit+$row['memkre'];
	$grand_sakhir=$grand_sakhir+$row['saldoa'];
	$grand_loan=$grand_loan+($row['nomi']-$row['jumlah']);

	$total_nomi=$total_nomi+$row['nomi'];
	$total_sawal=$total_sawal+$row['saldo'];
	$total_kdebet=$total_kdebet+$row['mutdeb'];
	$total_kkredit=$total_kkredit+$row['mutkre'];
	$total_mdebet=$total_mdebet+$row['memdeb'];
	$total_mkredit=$total_mkredit+$row['memkre'];
	$total_sakhir=$total_sakhir+$row['saldoa'];
	$total_loan=$total_loan+($row['nomi']-$row['jumlah']);
	
	$vbayar=$row['produk'];
	$vlunas=$row['kkbayar'];
	$vnmbayar=$row['nmbayar'];
	$no++;
}?>
<tr class="td" bgcolor="#e5e5e5">
	<td>&nbsp;</td>
	<td colspan="4"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
	<td align="right"><?php echo $jml_nomi;?></td>
	<td align="right"><?php echo $jml_sawal;?></td>
	<td align="right"><?php echo $jml_kdebet;?></td>
	<td align="right"><?php echo $jml_kkredit;?></td>
	<td align="right"><?php echo $jml_mdebet;?></td>
	<td align="right"><?php echo $jml_mkredit;?></td>
	<td align="right"><?php echo $jml_sakhir;?></td>
	<td align="right"><?php echo $jml_loan;?></td>
	<td>&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="5"><strong>GRAND TOTAL </strong>:</td>
	<td align="right"><?php echo $grand_nomi;?></td>
	<td align="right"><?php echo $grand_sawal;?></td>
	<td align="right"><?php echo $grand_kdebet;?></td>
	<td align="right"><?php echo $grand_kkredit;?></td>
	<td align="right"><?php echo $grand_mdebet;?></td>
	<td align="right"><?php echo $grand_mkredit;?></td>
	<td align="right"><?php echo $grand_sakhir;?></td>
	<td align="right"><?php echo $grand_loan;?></td>
	<td>&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<td align="center" colspan="5"><strong>TOTAL </strong>:</td>
	<td align="right"><?php echo $total_nomi;?></td>
	<td align="right"><?php echo $total_sawal;?></td>
	<td align="right"><?php echo $total_kdebet;?></td>
	<td align="right"><?php echo $total_kkredit;?></td>
	<td align="right"><?php echo $total_mdebet;?></td>
	<td align="right"><?php echo $total_mkredit;?></td>
	<td align="right"><?php echo $total_sakhir;?></td>
	<td align="right"><?php echo $total_loan;?></td>
	<td>&nbsp;</td>
</tr>
</tbody>
</table>