<?php
echo '<thead><tr style="border: 1" bgcolor="#e5e5e5"><th rowspan="2">NO</th><th rowspan="2">REKENING</th><th rowspan="2">URAIAN</th><th rowspan="2">TANGGAL</th><th colspan="2">MUTASI KAS</th><th colspan="2">MUTASI MEMORIAL</th><th rowspan="2">SALDO AKHIR</th></tr><tr class="td" bgcolor="#e5e5e5"><th>DEBET</th><th>KREDIT</th><th>DEBET</th><th>KREDIT</th></tr></thead><tbody><tr><td align="left" colspan="8">SALDO AWAL</td><td align="right">'.formatrp($saldo).'</td></tr>';
$jpokok=0;$no=1;$vbayar="";$tpokok=0;$jumlah1=0;$kdebet=0;$kkredit=0;$mdebet=0;$mkredit=0;
while ($row = $result->row($hasil)){
	echo '<tr><td>'.$no.'</td>
	<td>'.$row['norekgl'].'</td>
	<td>'.$row['keterangan'].'</td>
	<td align="right">'.$row['tanggal'].'</td>
	<td align="right">'.formatrp($row['debetkas']).'</td>
	<td align="right">'.formatrp($row['kreditkas']).'</td>
	<td align="right">'.formatrp($row['debetmemo']).'</td>
	<td align="right">'.formatrp($row['kreditmemo']).'</td>
	<td align="right">';
	if($kode=='D'){
		$saldo=($saldo+$row['debetkas']+$row['debetmemo'])-($row['kreditkas']+$row['kreditmemo']);
	}else{
		$saldo=($saldo+$row['kreditkas']+$row['kreditmemo'])-($row['debetkas']+$row['debetmemo']);
	}
	echo formatrp($saldo);
	echo '</td></tr>';
	$kdebet=$kdebet+$row['debetkas'];
	$kkredit=$kkredit+$row['kreditkas'];
	$mdebet=$mdebet+$row['debetmemo'];
	$mkredit=$mkredit+$row['kreditmemo'];
	$no++;
}
 echo '<tr class="td" bgcolor="#e5e5e5">
<td colspan="4" align="center">JUMLAH </td>
<td align="right">'.formatrp($kdebet),'</td>
<td align="right">'.formatrp($kkredit).'</td>
<td align="right">'.formatrp($mdebet).'</td>
<td align="right">'.formatrp($mkredit).'</td>
<td align="right">&nbsp;</td>
</tr></tbody>';