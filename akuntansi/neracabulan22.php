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
<th>'.nmbulan($bulan7).' '.$thn.'</th>
<th>'.nmbulan($bulan8).' '.$thn.'</th>
<th>'.nmbulan($bulan9).' '.$thn.'</th>
<th>'.nmbulan($bulan10).' '.$thn.'</th>
<th>'.nmbulan($bulan11).' '.$thn.'</th>
<th>'.nmbulan($bulan12).' '.$thn.'</th>
</tr>
</thead>
<tbody>';
$jpokok1=0;$jpokok2=0;$jpokok3=0;$jpokok4=0;$jpokok5=0;$jpokok6=0;$jpokok7=0;$jpokok8=0;$jpokok9=0;$jpokok10=0;$jpokok11=0;$jpokok12=0;$no=1;$vbayar="";
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
			<td align="right">'.formatrp($jpokok7).'</td>
			<td align="right">'.formatrp($jpokok8).'</td>
			<td align="right">'.formatrp($jpokok9).'</td>
			<td align="right">'.formatrp($jpokok10).'</td>
			<td align="right">'.formatrp($jpokok11).'</td>
			<td align="right">'.formatrp($jpokok12).'</td>
			</tr>';
			$jpokok1=0;$jpokok2=0;$jpokok3=0;$jpokok4=0;$jpokok5=0;$jpokok6=0;$jpokok7=0;$jpokok8=0;$jpokok9=0;$jpokok10=0;$jpokok11=0;$jpokok12=0;$no=1;
		}
	}
	$bulan1=$row[$fieldhari1];
	$bulan2=$row[$fieldhari2];
	$bulan3=$row[$fieldhari3];
	$bulan4=$row[$fieldhari4];
	$bulan5=$row[$fieldhari5];
	$bulan6=$row[$fieldhari6];
	$bulan7=$row[$fieldhari7];
	$bulan8=$row[$fieldhari8];
	$bulan9=$row[$fieldhari9];
	$bulan10=$row[$fieldhari10];
	$bulan11=$row[$fieldhari11];
	$bulan12=$row[$fieldhari12];
	if($blnx<=1){
		$bulan2=0;
		$bulan3=0;
		$bulan4=0;
		$bulan5=0;
		$bulan6=0;
		$bulan7=0;
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;		
	}elseif($blnx<=2){		
		$bulan3=0;
		$bulan4=0;
		$bulan5=0;
		$bulan6=0;
		$bulan7=0;
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=3){
		$bulan4=0;
		$bulan5=0;
		$bulan6=0;
		$bulan7=0;
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=4){
		$bulan5=0;
		$bulan6=0;
		$bulan7=0;
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=5){
		$bulan6=0;
		$bulan7=0;
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=6){
		$bulan7=0;
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=7){
		$bulan8=0;
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=8){
		$bulan9=0;
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=9){
		$bulan10=0;
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=10){
		$bulan11=0;
		$bulan12=0;
	}elseif($blnx<=11){
		$bulan12=0;
	}
	echo '<tr>
	<td align="center">'.$no.'</td>
	<td align="left">'.$row['uraian'].'</td>
	<td align="center">'.$branch.'-'.$row['sandi'].'-360'.'</td>
	<td align="right">'.formatrp($bulan1).'</td>
	<td align="right">'.formatrp($bulan2).'</td>
	<td align="right">'.formatrp($bulan3).'</td>
	<td align="right">'.formatrp($bulan4).'</td>
	<td align="right">'.formatrp($bulan5).'</td>
	<td align="right">'.formatrp($bulan6).'</td>
	<td align="right">'.formatrp($bulan7).'</td>
	<td align="right">'.formatrp($bulan8).'</td>
	<td align="right">'.formatrp($bulan9).'</td>
	<td align="right">'.formatrp($bulan10).'</td>
	<td align="right">'.formatrp($bulan11).'</td>
	<td align="right">'.formatrp($bulan12).'</td>
	</tr>';
	$jpokok1=$jpokok1+$bulan1;
	$jpokok2=$jpokok2+$bulan2;
	$jpokok3=$jpokok3+$bulan3;
	$jpokok4=$jpokok4+$bulan4;
	$jpokok5=$jpokok5+$bulan5;
	$jpokok6=$jpokok6+$bulan6;
	$jpokok7=$jpokok7+$bulan7;
	$jpokok8=$jpokok8+$bulan8;
	$jpokok9=$jpokok9+$bulan9;
	$jpokok10=$jpokok10+$bulan10;
	$jpokok11=$jpokok11+$bulan11;
	$jpokok12=$jpokok12+$bulan12;
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
<td align="right">'.number_format($jpokok7).'</td>
<td align="right">'.number_format($jpokok8).'</td>
<td align="right">'.number_format($jpokok9).'</td>
<td align="right">'.number_format($jpokok10).'</td>
<td align="right">'.number_format($jpokok11).'</td>
<td align="right">'.number_format($jpokok12).'</td>
</tr>
</tbody>';
?>