<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NO NASABAH</th>
	<th>NAMA REKENING</th>
	<th>NOMINAL</th>
	<th>JW / SB</th>
	<th>TGL BUKA</th>
	<th>TGL BUNGA</th>
	<th>BUNGA</th>
	<th>PAJAK</th>
	<th>NET BUNGA</th>
	<th>HARI</th>
	<th>KE</th>
	<th>FLAG</th>
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
			<td colspan="7" align="center">JUMLAH</td>
			<td align="right">'.formatrp($jpokok).'</td>
			<td align="right">'.formatrp($jbunga).'</td>
			<td align="right">'.formatrp($jadm).'</td>
			<td align="right" colspan="2">&nbsp;</td>
			</tr>';
			$jpokok=0;$jbunga=0;$jadm=0;
		}
		echo '<tr><td colspan="13"><strong>'.$row['nmproduk'].'</strong></td></tr>';
	}
	echo '<tr>
	<td>'.$no.'</td>
	<td align="left">'.$row['branch'].'-'.$row['nomor_nasabah'].'-'.$row['sufix'].'</td>
	<td align="left">'.$row['nama_rekening'].'</td>
	<td align="right">'.formatrp($row['nominal']).'</td>
	<td align="right">'.$row['jangka_waktu'].' / '.$row['counter_rate'].'</td>
	<td align="right">'.date_sql($row['tanggal_buka']).'</td>
	<td align="right">'.date_sql($row['tanggal_jatuh_tempo']).'</td>
	<td align="right">'.formatrp($row['bunga_bulanan']).'</td>
	<td align="right">'.formatrp($row['pajak_bulanan']).'</td>
	<td align="right">'.formatrp($row['bunga_bersih']).'</td>
	<td align="right" width="5%">'.$row['jumlah_hari'].'</td>
	<td align="right" width="5%">'.$row['bunga_ke'].'</td>
	<td align="right">';
	if($row['flag_bayar']==1){
		echo 'DI CADANGAN';
	}else{
		echo 'SUDAH BAYAR';
	}
	echo '</td>
	</tr>';
	$jpokok=$jpokok+$row['bunga_bulanan'];
	$jbunga=$jbunga+$row['pajak_bulanan'];
	$jadm=$jadm+$row['bunga_bersih'];
	
	$tpokok=$tpokok+$row['bunga_bulanan'];
	$tbunga=$tbunga+$row['pajak_bulanan'];
	$tadm=$tadm+$row['bunga_bersih'];
	
	$vbayar=$row['produk'];
	$no++;
}
echo '<tr class="td" bgcolor="#e5e5e5">
<td colspan="7" align="center">JUMLAH</td>
<td align="right">'.formatrp($jpokok).'</td>
<td align="right">'.formatrp($jbunga).'</td>
<td align="right">'.formatrp($jadm).'</td>
<td align="right" colspan="3">&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="7" align="center">TOTAL</td>
<td align="right">'.formatrp($tpokok).'</td>
<td align="right">'.formatrp($tbunga).'</td>
<td align="right">'.formatrp($tadm).'</td>
<td align="right" colspan="3">&nbsp;</td>
</tr>
</tbody>';
?>