<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NO NASABAH</th>
	<th>NAMA REKENING</th>
	<th>TANGGAl BUKA</th>
	<th>JATUH TEMPO</th>
	<th>NOMINAL</th>
	<th>JW / SB</th>
	<th>NET BUNGA</th>
	<th>TARIK BUNGA</th>
	<th>BELUM TARIK</th>
	<th>HARI</th>
	<th>NAMA SALES</th>
</tr>
</thead>
<tbody>';
$no=1;$vbayar="";
$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;$jjumlah2=0;
$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;$tjumlah2=0;
while ($row=$result->row($hasil)){
	if ($vbayar!=$row['produk']){ 
		if($no>1){
			echo '<tr class="td" bgcolor="#e5e5e5">
			<td colspan="5" align="center">JUMLAH</td>
			<td align="right">'.formatrp($jdenda).'</td>
			<td align="right"></td>
			<td align="right">'.formatrp($jpokok).'</td>
			<td align="right">'.formatrp($jbunga).'</td>
			<td align="right">'.formatrp($jadm).'</td>
			<td align="right" colspan="2">&nbsp;</td>
			</tr>';
			$jpokok=0;$jbunga=0;$jadm=0;
		}
		echo '<tr><td colspan="12"><strong>'.$row['nmproduk'].'</strong></td></tr>';
	}
	echo '<tr>
	<td>'.$no.'</td>
	<td align="left">'.$row['branch'].'-'.$row['nomor_nasabah'].'-'.$row['sufix'].'</td>
	<td align="left">'.$row['nama_rekening'].'</td>
	<td align="right">'.date_sql($row['tanggal_buka']).'</td>
	<td align="right">'.date_sql($row['tanggal_jatuh_tempo']).'</td>
	<td align="right">'.formatrp($row['nominal']).'</td>
	<td align="right">'.$row['jangka_waktu'].' / '.$row['counter_rate'].'</td>
	<td align="right">'.formatrp($row['net_bunga']).'</td>
	<td align="right">'.formatrp($row['total_tarik']).'</td>
	<td align="right">'.formatrp($row['belum_bayar']).'</td>
	<td align="right" width="6%">'.$row['jumlah_hari'].'</td>
	<td align="right">'.$row['namas'].'</td>
	</tr>';
	$jpokok +=$row['net_bunga'];
	$jbunga +=$row['total_tarik'];
	$jadm +=$row['belum_bayar'];
	$jdenda +=$row['nominal'];
	$tpokok +=$row['net_bunga'];
	$tbunga +=$row['total_tarik'];
	$tadm +=$row['belum_bayar'];
	$tdenda +=$row['nominal'];
	
	$vbayar=$row['produk'];
	$no++;
}
echo '<tr class="td" bgcolor="#e5e5e5">
<td colspan="5" align="center">JUMLAH</td>
<td align="right">'.formatrp($jdenda).'</td>
<td align="right"></td>
<td align="right">'.formatrp($jpokok).'</td>
<td align="right">'.formatrp($jbunga).'</td>
<td align="right">'.formatrp($jadm).'</td>
<td align="right" colspan="2">&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="5" align="center">TOTAL</td>
<td align="right">'.formatrp($jdenda).'</td>
<td align="right"></td>
<td align="right">'.formatrp($tpokok).'</td>
<td align="right">'.formatrp($tbunga).'</td>
<td align="right">'.formatrp($tadm).'</td>
<td align="right" colspan="2">&nbsp;</td>
</tr>
</tbody>';
?>