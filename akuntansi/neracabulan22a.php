<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
<th>NO</th>
<th>URAIAN</th>
<th>REKENING</th>
<th>'.nmbulan($bulan7).' '.$thn.'</th>
<th>'.nmbulan($bulan8).' '.$thn.'</th>
<th>'.nmbulan($bulan9).' '.$thn.'</th>
<th>'.nmbulan($bulan10).' '.$thn.'</th>
<th>'.nmbulan($bulan11).' '.$thn.'</th>
<th>'.nmbulan($bulan12).' '.$thn.'</th>
</tr>
</thead>
<tbody>';
$jpokok7=0;$jpokok8=0;$jpokok9=0;$jpokok10=0;$jpokok11=0;$jpokok12=0;$no=1;$vbayar="";
while ($row = $result->row($hasil)) {
	if ($vbayar!=substr($row['sandi'],0,1)){ 
		if($no>1){
			echo '<tr class="td" bgcolor="#e5e5e5">';
			if($ada==FALSE){
				echo '<td colspan="3" align="center">JUMLAH PENDAPATAN</td>';
			}else{
				echo '<td colspan="3" align="center">JUMLAH AKTIVA</td>';
			}
			echo '
			<td align="right">'.formatrp($jpokok7).'</td>
			<td align="right">'.formatrp($jpokok8).'</td>
			<td align="right">'.formatrp($jpokok9).'</td>
			<td align="right">'.formatrp($jpokok10).'</td>
			<td align="right">'.formatrp($jpokok11).'</td>
			<td align="right">'.formatrp($jpokok12).'</td>
			</tr>';
			$jpokok7=0;$jpokok8=0;$jpokok9=0;$jpokok10=0;$jpokok11=0;$jpokok12=0;$no=1;
		}
	}
	$bulan7=$row[$fieldhari7];
	$bulan8=$row[$fieldhari8];
	$bulan9=$row[$fieldhari9];
	$bulan10=$row[$fieldhari10];
	$bulan11=$row[$fieldhari11];
	$bulan12=$row[$fieldhari12];
	if($blnx<=6){
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
	<td align="center" width="5%">'.$no.'</td>
	<td align="left" width="25%">'.$row['uraian'].'</td>
	<td align="center" width="10%">'.$branch.'-'.$row['sandi'].'-360'.'</td>
	<td align="right" width="10%">'.formatrp($bulan7).'</td>
	<td align="right" width="10%">'.formatrp($bulan8).'</td>
	<td align="right" width="10%">'.formatrp($bulan9).'</td>
	<td align="right" width="10%">'.formatrp($bulan10).'</td>
	<td align="right" width="10%">'.formatrp($bulan11).'</td>
	<td align="right" width="10%">'.formatrp($bulan12).'</td>
	</tr>';
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
echo '
<td align="right">'.number_format($jpokok7).'</td>
<td align="right">'.number_format($jpokok8).'</td>
<td align="right">'.number_format($jpokok9).'</td>
<td align="right">'.number_format($jpokok10).'</td>
<td align="right">'.number_format($jpokok11).'</td>
<td align="right">'.number_format($jpokok12).'</td>
</tr>
</tbody>';
?>