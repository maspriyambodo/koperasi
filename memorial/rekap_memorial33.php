<?php
echo '<thead>
<tr class="td" bgcolor="#e5e5e5">
<th rowspan="2">NO</th>
<th rowspan="2">NOREK</th>
<th rowspan="2">NAMA</th>
<th colspan="2">MUTASI KAS</th>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<th>DEBET</th>
<th>KREDIT</th>
</tr>
</thead>
<tbody>';
$no=1;$vbayar="";
$jjumlah1=0;$jjumlah2=0;$jjumlah3=0;$jjumlah4=0;
$tjumlah1=0;$tjumlah2=0;$tjumlah3=0;$tjumlah4=0;
while ($row=$result->row($hasil)){ 
	if(($row['debetkas']+$row['kreditkas'])>0){
	echo '<tr>
	<td>'.$no.'</td>
	<td>'.$row['norekgl'].'</td>
	<td width="35%">'.$row['nama'].'</td>
	<td align="right">'.formatrp($row['debetkas']).'</td>
	<td align="right">'.formatrp($row['kreditkas']).'</td>
	</tr>';
	$jjumlah1=$jjumlah1+$row['debetkas'];
	$jjumlah2=$jjumlah2+$row['kreditkas'];
	$no++;	
	}
}
echo '<tr class="td" bgcolor="#e5e5e5">
<td colspan="3" align="center">JUMLAH :</td>
<td align="right">'.formatrp($jjumlah1).'</td>
<td align="right">'.formatrp($jjumlah2).'</td>
</tr>
</tbody>';