<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>KETERANGAN</th>
	<th>NAMA SALES</th>
	<th>NOMINAL</th>
	<th>NET BUNGA</th>
	<th>TARIK BUNGA</th>
	<th>BELUM TARIK</th>
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
			<td colspan="3" align="center">JUMLAH</td>
			<td align="right">'.formatrp($jjumlah1).'</td>
			<td align="right">'.formatrp($jpokok).'</td>
			<td align="right">'.formatrp($jbunga).'</td>
			<td align="right">'.formatrp($jadm).'</td>
			</tr>';
			$jpokok=0;$jbunga=0;$jadm=0;$jjumlah1=0;
		}
		echo '<tr><td colspan="7"><strong>'.$row['nmproduk'].'</strong></td></tr>';
	}
	echo '<tr>
	<td>'.$no.'</td>
	<td align="left"> JANGKA WAKTU '.$row['jangka_waktu'].' BULAN / SUKU BUNGA '.$row['counter_rate'].' %</td>
	<td align="left" width="20%">'.$row['namas'].'</td>
	<td align="right">'.formatrp($row['nominal']).'</td>
	<td align="right">'.formatrp($row['net_bunga']).'</td>
	<td align="right">'.formatrp($row['total_tarik']).'</td>
	<td align="right">'.formatrp($row['belum_bayar']).'</td>
	</tr>';
	$jjumlah1=$jjumlah1+$row['nominal'];
	$jpokok=$jpokok+$row['net_bunga'];
	$jbunga=$jbunga+$row['total_tarik'];
	$jadm=$jadm+$row['belum_bayar'];
	
	$tjumlah1=$tjumlah1+$row['nominal'];
	$tpokok=$tpokok+$row['net_bunga'];
	$tbunga=$tbunga+$row['total_tarik'];
	$tadm=$tadm+$row['belum_bayar'];
	
	$vbayar=$row['produk'];
	$no++;
}
echo '<tr class="td" bgcolor="#e5e5e5">
<td colspan="3" align="center">JUMLAH</td>
<td align="right">'.formatrp($jjumlah1).'</td>
<td align="right">'.formatrp($jpokok).'</td>
<td align="right">'.formatrp($jbunga).'</td>
<td align="right">'.formatrp($jadm).'</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="3" align="center">TOTAL</td>
<td align="right">'.formatrp($tjumlah1).'</td>
<td align="right">'.formatrp($tpokok).'</td>
<td align="right">'.formatrp($tbunga).'</td>
<td align="right">'.formatrp($tadm).'</td>
</tr>
</tbody>';
?>