<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th colspan="4">REKENING</th>
	<th rowspan="2">NAMA</th>
	<th rowspan="2">NOPEN</th>
	<th rowspan="2">POKOK</th>
	<th rowspan="2">BUNGA</th>
	<th rowspan="2">ADM</th>
	<th rowspan="2">JUMLAH</th>
	<th colspan="2">JW</th>
	<th colspan="3">TANGGAL</th>
	<th rowspan="2">KET</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>KOPERASI</th>
	<th>BANK</th>
	<th>CIF BANK</th>
	<th>ASO BANK</th>
	<th>KE</th>
	<th>DARI</th>
	<th>TRANSAKSI</th>
	<th>MULAI</th>
	<th>AKHIR</th>
</tr>
</thead>
<tbody><?php
	$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";
	$tpokok=0;$tbunga=0;$tadm=0;$tjumlah1=0;$tjumlah2=0;$x=1;
	while ($row = $result->row($hasil)) {
		$dy=date('d',strtotime($row['tgtran']));
		$bl=date('m',strtotime($row['tgtran']));
		$th=date('Y',strtotime($row['tgtran']));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$x);
		$mtgtran=$date->format('Y-m-d');
		if ($vbayar!=$row['kkbayar']){ 
			if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="7" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jpokok); ?></td>
				<td align="right"><?php echo formatrp($jbunga); ?></td>
				<td align="right"><?php echo formatrp($jadm); ?></td>
				<td align="right"><?php echo formatrp($jumlah1); ?></td>
				<td align="right" colspan="6">&nbsp;</td>
				<?php $jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;?>
			</tr><?php
			}?>
			<tr><td colspan="17"><strong><?php echo 'KANTOR BAYAR : '.$row['kkbayar'].' [ '.$row['nmbayar'].' ]'; ?></strong></td></tr><?php
			$no=1;
		}
		if($row['kdtran']==222){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>		
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td><?php echo $no; ?></td>
			<td align="left">&nbsp;<?php echo $row['norek']; ?></td>
			<td align="left">&nbsp;<?php echo $row['nocitra']; ?></td>
			<td><?php echo $row['no_cif_bank']; ?></td>
			<td><?php echo $row['no_aso_bank']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td align="left">&nbsp;<?php echo $row['nopen']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="center"><?php echo $row['angsurke']; ?></td>
			<td align="center"><?php echo $row['jangka']; ?></td>
			<td><?php echo $row['tgtran']; ?></td>
			<td><?php echo $mtgtran; ?></td>
			<td><?php echo $row['tgl_jatuh_tempo']; ?></td>
			<td><?php if($row['angsurke']==1){$huruf=array("KREDIT PEMBAHARUAN","KREDIT BARU","KREDIT TAKE OVER","DOUBLE PINJAMAN","RESTRUKTURISASI KREDIT","KREDIT TAMBAHAN");$i=0;while($i < 6){if($row['kdpin'] == $i){echo $huruf[$i];}$i++;}}?></td>
		</tr><?php 
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jumlah1=$jumlah1+$row['jumlah'];
		$tpokok=$tpokok+$row['pokok'];
		$tbunga=$tbunga+$row['bunga'];
		$tadm=$tadm+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$vbayar=$row['kkbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="7" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok); ?></td>
		<td align="right"><?php echo formatrp($jbunga); ?></td>
		<td align="right"><?php echo formatrp($jadm); ?></td>
		<td align="right"><?php echo formatrp($jumlah1); ?></td>
		<td align="right" colspan="6">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="7" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok); ?></td>
		<td align="right"><?php echo formatrp($tbunga); ?></td>
		<td align="right"><?php echo formatrp($tadm); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right" colspan="6">&nbsp;</td>
	</tr>
</tbody>