<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>TANGGAL BUNGA</th>
	<th>BUNGA</th>
	<th>PAJAK</th>
	<th>NET BUNGA</th>
	<th>JUMLAH HARI</th>
	<th>BUNGA KE</th>
	<th>KETERANGAN</th>
</tr>
</thead>
<tbody>';
$no=1;$vbayar="";
$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;$jjumlah2=0;$bayar=0;
$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;$tjumlah2=0;$belum=0;
while ($row=$result->row($hasil)){
	if ($vbayar!=$row['produk']){ 
		if($no>1){
			echo '<tr class="td" bgcolor="#e5e5e5">
			<td align="center" colspan="2">JUMLAH</td>
			<td align="right">'.formatrp($jpokok).'</td>
			<td align="right">'.formatrp($jbunga).'</td>
			<td align="right">'.formatrp($jadm).'</td>
			<td align="right" colspan="3">&nbsp;</td>
			</tr>';
			$jpokok=0;$jbunga=0;$jadm=0;
		}
		echo '<tr><td colspan="8"><strong>'.$row['nmproduk'].'</strong></td></tr>';
	}
	if($row['flag_bayar']==0){
		$kete='Belum Di Bayar';
		$belum=$belum+$row['bunga_bersih'];
	}else{
		$kete='Sudah Di Bayar';
		$bayar=$bayar+$row['bunga_bersih'];
	}
	echo '<tr>
	<td>'.$no.'</td>
	<td align="center" width="14%">'.date_sql($row['tanggal_jatuh_tempo']).'</td>
	<td align="right">'.formatrp($row['bunga_bulanan']).'</td>
	<td align="right">'.formatrp($row['pajak_bulanan']).'</td>
	<td align="right">'.formatrp($row['bunga_bersih']).'</td>
	<td align="right" width="8%">'.$row['jumlah_hari'].'</td>
	<td align="right" width="6%">'.$row['bunga_ke'].'</td>
	<td align="right">'.$kete.'</td>
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
<td align="center" colspan="2">JUMLAH</td>
<td align="right">'.formatrp($jpokok).'</td>
<td align="right">'.formatrp($jbunga).'</td>
<td align="right">'.formatrp($jadm).'</td>
<td align="right" colspan="3">&nbsp;</td>
</tr>
<tr>
<td align="center" colspan="8">TOTAL RINCIAN PEMBAYARAN BUNGA</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="2">TOTAL BUNGA</td>
<td align="right">: '.formatRupiah($net_bunga).'</td>
<td colspan="5">&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="2">BUNGA DIBAYAR</td>
<td align="right">: '.formatRupiah($bayar).'</td>
<td colspan="5">&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="2">BUNGA BELUM DIBAYAR</td>
<td align="right">: '.formatRupiah($belum).'</td>
<td colspan="5">&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="2">SELISIH BUNGA</td>
<td align="right">: '.formatRupiah($net_bunga-$bayar-$belum).'</td>
<td colspan="5">&nbsp;</td>
</tr>
</tr>
</tbody>';
?>