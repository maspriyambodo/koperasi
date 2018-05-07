<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th rowspan="2">NO</th>
	<th rowspan="2">NOREK</th>
	<th rowspan="2">NAMA</th>
	<th rowspan="2">NOPEN</th>
	<th rowspan="2">REKENING LAIN</th>
	<th colspan="4">REALISASI TAGIHAN REGULER</th>
	<th colspan="4">REALISASI TAGIHAN SUSULAN</th>
	<th colspan="4">JUMLAH REALISASI TAGIHAN</th>
	<th rowspan="2">NAMA SALES</th>
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
	$no=1;$vbayar="";$vlunas='';
	$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;
	$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gpokok3=0;$gbunga3=0;$gadm3=0;$gjumlah3=0;
	$tpokok1=0;$tbunga1=0;$tadm1=0;$tjumlah1=0;$tpokok2=0;$tbunga2=0;$tadm2=0;$tjumlah2=0;$tpokok3=0;$tbunga3=0;$tadm3=0;$tjumlah3=0;
	while ($row = $result->row($hasil)) {
		if ($vbayar!=$row['produk']){ 
			if($no>1){ ?>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
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
					<td align="right" colspan="1">&nbsp;</td>
				</tr>
				<tr class="td" bgcolor="#e5e5e5">
					<td colspan="5" align="center"><strong>GRAND TOTAL</strong></td>
					<td align="right"><?php echo formatrp($gpokok1); ?></td>
					<td align="right"><?php echo formatrp($gbunga1); ?></td>
					<td align="right"><?php echo formatrp($gadm1); ?></td>
					<td align="right"><?php echo formatrp($gjumlah1); ?></td>
					<td align="right"><?php echo formatrp($gpokok2); ?></td>
					<td align="right"><?php echo formatrp($gbunga2); ?></td>
					<td align="right"><?php echo formatrp($gadm2); ?></td>
					<td align="right"><?php echo formatrp($gjumlah2); ?></td>
					<td align="right"><?php echo formatrp($gpokok3); ?></td>
					<td align="right"><?php echo formatrp($gbunga3); ?></td>
					<td align="right"><?php echo formatrp($gadm3); ?></td>
					<td align="right"><?php echo formatrp($gjumlah3); ?></td>
					<td align="right" colspan="1">&nbsp;</td>
				</tr>
				<?php
				$jpokok1=0;$jbunga1=0;$jadm1=0;$jjumlah1=0;$jpokok2=0;$jbunga2=0;$jadm2=0;$jjumlah2=0;$jpokok3=0;$jbunga3=0;$jadm3=0;$jjumlah3=0;$gpokok1=0;$gbunga1=0;$gadm1=0;$gjumlah1=0;$gpokok2=0;$gbunga2=0;$gadm2=0;$gjumlah2=0;$gpokok3=0;$gbunga3=0;$gadm3=0;$gjumlah3=0;
			}?>
			<tr><td colspan="18"><strong><?php echo 'JENIS PRODUK : '.$row['nmproduk']; ?></strong></td></tr><?php
		}
		if($no>1){
			if ($vlunas!=$row['kkbayar']){ 
				if ($vbayar==$row['produk']){ ?>
					<tr class="td" bgcolor="#e5e5e5">
						<td colspan="5" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
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
						<td align="right" colspan="1">&nbsp;</td>
					</tr>
					<?php
					$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;
				}
			}
		}
		if($row['kdtran']==222){
			$clsname="evet";
		}else{
			$clsname="";
		}
		?>
		<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td><?php echo $no; ?></td>
			<td><?php echo $row['norek']; ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td>&nbsp;<?php echo $row['nopen']; ?></td>
			<td>&nbsp;<?php echo $row['nocitra']; ?></td>
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
			<td align="left"><?php echo $row['namas']; ?></td>
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

		$gpokok1=$gpokok1+$row['pokok'];
		$gbunga1=$gbunga1+$row['bunga'];
		$gadm1=$gadm1+$row['adm'];
		$gjumlah1=$gjumlah1+$row['jumlah'];
		$gpokok2=$gpokok2+$row['pokok1'];
		$gbunga2=$gbunga2+$row['bunga1'];
		$gadm2=$gadm2+$row['adm1'];
		$gjumlah2=$gjumlah2+$row['jumlah1'];
		$gpokok3=$gpokok3+$row['pokok2'];
		$gbunga3=$gbunga3+$row['bunga2'];
		$gadm3=$gadm3+$row['adm2'];
		$gjumlah3=$gjumlah3+$row['jumlah2'];

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

		$vbayar=$row['produk'];
		$vlunas=$row['kkbayar'];
		$vnmbayar=$row['nmbayar'];
		$no++;
	}?>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center"><strong>JUMLAH <?php echo $vnmbayar; ?></strong></td>
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
		<td align="right" colspan="1">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center"><strong>GRAND TOTAL</strong></td>
		<td align="right"><?php echo formatrp($gpokok1); ?></td>
		<td align="right"><?php echo formatrp($gbunga1); ?></td>
		<td align="right"><?php echo formatrp($gadm1); ?></td>
		<td align="right"><?php echo formatrp($gjumlah1); ?></td>
		<td align="right"><?php echo formatrp($gpokok2); ?></td>
		<td align="right"><?php echo formatrp($gbunga2); ?></td>
		<td align="right"><?php echo formatrp($gadm2); ?></td>
		<td align="right"><?php echo formatrp($gjumlah2); ?></td>
		<td align="right"><?php echo formatrp($gpokok3); ?></td>
		<td align="right"><?php echo formatrp($gbunga3); ?></td>
		<td align="right"><?php echo formatrp($gadm3); ?></td>
		<td align="right"><?php echo formatrp($gjumlah3); ?></td>
		<td align="right" colspan="1">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="5" align="center"><strong>TOTAL</strong></td>
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
		<td align="right" colspan="1">&nbsp;</td>
	</tr>
</tbody>