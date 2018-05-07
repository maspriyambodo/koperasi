<?php echo '
<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th >NO</th>
	<th >NO REKENING</th>
	<th >N A M A</th>
	<th >TGL LAHIR</th>
	<th >UMUR / JW</th>
	<th >TGL AWAL</th>
	<th >TGL AKHIR</th>
	<th >TGL MENINGGAL</th>
	<th >PLAFOND</th>
	<th >OUTSTANDING</th>
	<th >JML PENGAJUAN</th>
	<th >JML PENCAIRAN</th>
	<th >KODE / NO PREMI</th>
	<th >SUMBER DANA</th>
</tr>
</thead>
<tbody>';
	$no=1;$vbayar="";$vlunas="";
	$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
	$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
	while ($row=$result->row($hasil)){
		$xkdkop=ket_tagihh($row['kdkop']);
		if ($vbayar!=$row['produk']){ 
			if($no>1){ echo '
				<tr class="td" bgcolor="#e5e5e5">
					<td align="center">&nbsp;</td>
					<td colspan="7" align="center">SUB JUMLAH :</td>
					<td align="right">'.formatrp($jjumlah1).'</td>
					<td align="right">'.formatrp($jjumlah2).'</td>
					<td align="right">'.formatrp($jjumlah3).'</td>
					<td align="right">'.formatrp($jjumlah4).'</td>
					<td align="right" colspan="2">&nbsp;</td>
				</tr>';
				$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
			} echo '
			<tr><td colspan="14"><strong>JENIS PRODUK : '.$row['nmproduk'].'</strong></td></tr>';
			$no=1;
		} echo '
		<tr>
			<td>'.$no.'</td>
			<td>'.$row['norek'].'</td>
			<td width="15%">'.$row['nama'].'</td>
			<td>'.date_sql($row['tgl_lahir']).'</td>
			<td width="10%">'.$row['umur'].' Tahun / '.$row['jangka'].' '.$xkdkop.'</td>
			<td>'.date_sql($row['tgtran']).'</td>
			<td>'.date_sql($row['tgl_jatuh_tempo']).'</td>
			<td>'.date_sql($row['tgl_mati']).'</td>
			<td align="right">'.formatrp($row['plafond']).'</td>
			<td align="right">'.formatrp($row['saldo']).'</td>
			<td align="right">'.formatrp($row['jumlah_klaim']).'</td>
			<td align="right">'.formatrp($row['jumlah_cair']).'</td>
			<td>'.$row['kdpremi'].' / '.$row['nopremi'].'</td>
			<td>'; $jenis_klaim=$row['jenis_klaim'];include '../dist/_jenisklaim.php';echo '</td>
		</tr>';
		$jjumlah1 +=$row['plafond'];
		$jjumlah2 +=$row['saldo'];
		$jjumlah3 +=$row['jumlah_klaim'];
		$jjumlah4 +=$row['jumlah_cair'];
		$tjumlah1 +=$row['plafond'];
		$tjumlah2 +=$row['saldo'];
		$tjumlah3 +=$row['jumlah_klaim'];
		$tjumlah4 +=$row['jumlah_cair'];
		$vbayar=$row['produk'];
		$vlunas=$row['nmproduk'];
		$no++;
	} echo '
	<tr class="td" bgcolor="#e5e5e5">
		<td align="center">&nbsp;</td>
		<td colspan="7" align="center">SUB JUMLAH :</td>
		<td align="right">'.formatrp($jjumlah1).'</td>
		<td align="right">'.formatrp($jjumlah2).'</td>
		<td align="right">'.formatrp($jjumlah3).'</td>
		<td align="right">'.formatrp($jjumlah4).'</td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<td colspan="8" align="center">TOTAL</td>
		<td align="right">'.formatrp($tjumlah1).'</td>
		<td align="right">'.formatrp($tjumlah2).'</td>
		<td align="right">'.formatrp($tjumlah3).'</td>
		<td align="right">'.formatrp($tjumlah4).'</td>
		<td align="right" colspan="2">&nbsp;</td>
	</tr>
</tbody>'; ?>