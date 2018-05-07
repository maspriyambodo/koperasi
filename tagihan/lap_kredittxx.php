<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">KANTOR BAYAR</th>
	<th colspan="4">TDK TERTAGIH TAGIHAN REGULER</th>
	<th colspan="4">TDK TERTAGIH TAGIHAN SUSULAN</th>
	<th colspan="4">JUMLAH TIDAK TERTAGIH</th>
	<th rowspan="2">ORANG</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>
	<th>POKOK</th>
	<th>BUNGA</th>
	<th>ADM</th>
	<th>JUMLAH</th>	
</tr>
</thead>
<tbody><?php
	$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jrekening=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$tpokok3=0;$tbunga3=0;$tadm3=0;$tjumlah3=0;$trekening=0;
	$no=1;$vbayar="";
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
			<tr class="td" bgcolor="#e5e5e5">
				<td colspan="2" align="center">JUMLAH</td>
				<td align="right"><?php echo formatrp($jpokok1); ?></td>
				<td align="right"><?php echo formatrp($jbunga1); ?></td>
				<td align="right"><?php echo formatrp($jadm1); ?></td>
				<td align="right"><?php echo formatrp($jjumlah1); ?></td>
				<td align="right"><?php echo formatrp($jpokok2); ?></td>
				<td align="right"><?php echo formatrp($jbunga2); ?></td>
				<td align="right"><?php echo formatrp($jadm2); ?></td>
				<td align="right"><?php echo formatrp($jjumlah2); ?></td>
				<td align="right"><?php echo formatrp($jpokok3); ?></td>
				<td align="right"><?php echo formatrp($jbunga3); ?></td>
				<td align="right"><?php echo formatrp($jadm3); ?></td>
				<td align="right"><?php echo formatrp($jjumlah3); ?></td>
				<td align="right"><?php echo formatrp($jrekening); ?></td>
			</tr><?php
			$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$jrekening=0;
			}?>
			<tr><td colspan="15"><strong><?php echo 'JENIS PRODUK :'.$row['nmproduk']; ?></strong></td>	</tr><?php
		}
		if($row['kdtran']==888){$clsname="evet";}else{$clsname="";}?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td width="7%"><?php echo $no; ?></td>
			<td width="35%"><?php echo '[ '.$row['kkbayar'].' ] '.$row['nmbayar']; ?></td>
			<td align="right"><?php echo formatrp($row['pokok']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga']); ?></td>
			<td align="right"><?php echo formatrp($row['adm']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah']); ?></td>
			<td align="right"><?php echo formatrp($row['pokok1']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga1']); ?></td>
			<td align="right"><?php echo formatrp($row['adm1']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah1']); ?></td>
			<td align="right"><?php echo formatrp($row['pokok2']); ?></td>
			<td align="right"><?php echo formatrp($row['bunga2']); ?></td>
			<td align="right"><?php echo formatrp($row['adm2']); ?></td>
			<td align="right"><?php echo formatrp($row['jumlah2']); ?></td>
			<td align="right"><?php echo formatrp($row['rekening']); ?></td>
		</tr><?php 
		$jpokok1=$jpokok1+$row['pokok'];
		$jbunga1=$jbunga1+$row['bunga'];
		$jadm1=$jadm1+$row['adm'];
		$jjumlah1=$jjumlah1+$row['jumlah'];
		$jpokok2=$jpokok2+$row['pokok1'];
		$jbunga2=$jbunga2+$row['bunga1'];
		$jadm2=$jadm2+$row['adm1'];
		$jjumlah2=$jjumlah2+$row['jumlah1'];
		$jpokok3=$jpokok3+$row['pokok2'];
		$jbunga3=$jbunga3+$row['bunga2'];
		$jadm3=$jadm3+$row['adm2'];
		$jjumlah3=$jjumlah3+$row['jumlah2'];
		$jrekening=$jrekening+$row['rekening'];
		
		$tpokok1=$tpokok1+$row['pokok'];
		$tbunga1=$tbunga1+$row['bunga'];
		$tadm1=$tadm1+$row['adm'];
		$tjumlah1=$tjumlah1+$row['jumlah'];
		$tpokok2=$tpokok2+$row['pokok1'];
		$tbunga2=$tbunga2+$row['bunga1'];
		$tadm2=$tadm2+$row['adm1'];
		$tjumlah2=$tjumlah2+$row['jumlah1'];
		$tpokok3=$tpokok3+$row['pokok2'];
		$tbunga3=$tbunga3+$row['bunga2'];
		$tadm3=$tadm3+$row['adm2'];
		$tjumlah3=$tjumlah3+$row['jumlah2'];
		$trekening=$trekening+$row['rekening'];
		
		$vbayar=$row['produk'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="2" align="center">JUMLAH</td>
		<td align="right"><?php echo formatrp($jpokok1); ?></td>
		<td align="right"><?php echo formatrp($jbunga1); ?></td>
		<td align="right"><?php echo formatrp($jadm1); ?></td>
		<td align="right"><?php echo formatrp($jjumlah1); ?></td>
		<td align="right"><?php echo formatrp($jpokok2); ?></td>
		<td align="right"><?php echo formatrp($jbunga2); ?></td>
		<td align="right"><?php echo formatrp($jadm2); ?></td>
		<td align="right"><?php echo formatrp($jjumlah2); ?></td>
		<td align="right"><?php echo formatrp($jpokok3); ?></td>
		<td align="right"><?php echo formatrp($jbunga3); ?></td>
		<td align="right"><?php echo formatrp($jadm3); ?></td>
		<td align="right"><?php echo formatrp($jjumlah3); ?></td>
		<td align="right"><?php echo formatrp($jrekening); ?></td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td class="items" colspan="2" align="center">TOTAL</td>
		<td align="right"><?php echo formatrp($tpokok1); ?></td>
		<td align="right"><?php echo formatrp($tbunga1); ?></td>
		<td align="right"><?php echo formatrp($tadm1); ?></td>
		<td align="right"><?php echo formatrp($tjumlah1); ?></td>
		<td align="right"><?php echo formatrp($tpokok2); ?></td>
		<td align="right"><?php echo formatrp($tbunga2); ?></td>
		<td align="right"><?php echo formatrp($tadm2); ?></td>
		<td align="right"><?php echo formatrp($tjumlah2); ?></td>
		<td align="right"><?php echo formatrp($tpokok3); ?></td>
		<td align="right"><?php echo formatrp($tbunga3); ?></td>
		<td align="right"><?php echo formatrp($tadm3); ?></td>
		<td align="right"><?php echo formatrp($tjumlah3); ?></td>
		<td align="right"><?php echo formatrp($trekening); ?></td>
	</tr>
</tbody>
