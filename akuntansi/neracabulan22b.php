<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
<th>NO</th>
<th>URAIAN</th>
<th>REKENING</th>
<th>'.nmbulan($bulan1).' '.$thn.'</th>
<th>'.nmbulan($bulan2).' '.$thn.'</th>
<th>'.nmbulan($bulan3).' '.$thn.'</th>
<th>'.nmbulan($bulan4).' '.$thn.'</th>
<th>'.nmbulan($bulan5).' '.$thn.'</th>
<th>'.nmbulan($bulan6).' '.$thn.'</th>
</tr>
</thead>
<tbody>';
$jpokok1=0;$jpokok2=0;$jpokok3=0;$jpokok4=0;$jpokok5=0;$jpokok6=0;$no=1;$vbayar="";
while ($row = $result->row($hasil)) {
	if ($vbayar!=substr($row['sandi'],0,1)){ 
		if($no>1){
			echo '<tr class="td" bgcolor="#e5e5e5">';
			if($ada==FALSE){
				echo '<td colspan="3" align="center">JUMLAH PENDAPATAN</td>';
			}else{
				echo '<td colspan="3" align="center">JUMLAH AKTIVA</td>';
			}
			echo '<td align="right">'.formatrp($jpokok1).'</td>
			<td align="right">'.formatrp($jpokok2).'</td>
			<td align="right">'.formatrp($jpokok3).'</td>
			<td align="right">'.formatrp($jpokok4).'</td>
			<td align="right">'.formatrp($jpokok5).'</td>
			<td align="right">'.formatrp($jpokok6).'</td>
			</tr>';
			$jpokok1=0;$jpokok2=0;$jpokok3=0;$jpokok4=0;$jpokok5=0;$jpokok6=0;$no=1;
		}
	}
	$bulan1=$row[$fieldhari1];
	$bulan2=$row[$fieldhari2];
	$bulan3=$row[$fieldhari3];
	$bulan4=$row[$fieldhari4];
	$bulan5=$row[$fieldhari5];
	$bulan6=$row[$fieldhari6];
	if($blnx<=2){
		$bulan3=0;
		$bulan4=0;
		$bulan5=0;
		$bulan6=0;
	}elseif($blnx<=3){
		$bulan4=0;
		$bulan5=0;
		$bulan6=0;
	}elseif($blnx<=4){
		$bulan5=0;
		$bulan6=0;
	}elseif($blnx<=5){
		$bulan6=0;
	}
	echo '<tr>
	<td align="center" width="5%">'.$no.'</td>
	<td align="left" width="25%">'.$row['uraian'].'</td>
	<td align="center" width="10%">'.$branch.'-'.$row['sandi'].'-360'.'</td>
	<td align="right" width="10%">'.formatrp($bulan1).'</td>
	<td align="right" width="10%">'.formatrp($bulan2).'</td>
	<td align="right" width="10%">'.formatrp($bulan3).'</td>
	<td align="right" width="10%">'.formatrp($bulan4).'</td>
	<td align="right" width="10%">'.formatrp($bulan5).'</td>
	<td align="right" width="10%">'.formatrp($bulan6).'</td>
	</tr>';
	$jpokok1=$jpokok1+$bulan1;
	$jpokok2=$jpokok2+$bulan2;
	$jpokok3=$jpokok3+$bulan3;
	$jpokok4=$jpokok4+$bulan4;
	$jpokok5=$jpokok5+$bulan5;
	$jpokok6=$jpokok6+$bulan6;
	$vbayar=substr($row['sandi'],0,1);
	$no++;
}
echo '<tr class="td" bgcolor="#e5e5e5">';
if($ada==FALSE){
	echo '<td colspan="3" align="center">JUMLAH BIAYA</td>';
}else{
	echo '<td colspan="3" align="center">JUMLAH PASIVA</td>';
}
echo '<td align="right">'.number_format($jpokok1).'</td>
<td align="right">'.number_format($jpokok2).'</td>
<td align="right">'.number_format($jpokok3).'</td>
<td align="right">'.number_format($jpokok4).'</td>
<td align="right">'.number_format($jpokok5).'</td>
<td align="right">'.number_format($jpokok6).'</td>
</tr>
</tbody>';
?>