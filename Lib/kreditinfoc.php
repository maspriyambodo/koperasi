<?php
echo '<table width="100%">
<tr><td colspan="4" align="center"><strong>DATA AHLI WARIS</strong></td></tr>
<tr>
	<td>Nama Ahli Waris</td><td>: '.$row['nmwaris'].'</td>
	<td>Tgl Lahir </td><td>: '.$row['tglahirw'].'</td>
</tr>
	<td>Alamat</td><td>: '.$row['arekom'].'</td>
	<td>Kelurahan</td><td>: '.$row['lrekom'].'</td>
</tr>
<tr>
	<td>Kecamatan</td><td>: '.$row['krekom'].'</td>
	<td>Kabupaten</td><td>: ';
	$file='json/kabupaten.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if ($row['brekom']==$jfo[$i]['kode']) {
			echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
		}
	}
	echo '</td>
</tr>
<tr>
	<td>No Telepon</td><td>: '.$row['trekom'].'</td>
	<td>No KTP</td><td>: '.$row['nktprekom'].'</td>
</tr>
<tr>
	<td>Masa Berlaku</td><td>: '.$row['tktprekom'].'</td>
	<td colspan="2">&nbsp;</td>
</tr>
<tr>
	<td colspan="4" align="center"><strong>DATA LAPORAN B</strong>I</td>
</tr>
<tr><td>Golongan Penjamin</td><td>: ';
	$file='json/debit21.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if($jfo[$i]['grp']==4){
			if ($row['kdjamin']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		}
	}
	echo '</td>
	<td>Sifat Kredit</td><td>: ';
	$file='json/debit21.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if($jfo[$i]['grp']==5){
			if ($row['skredit']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		}
	}
	echo '</td>
</tr>
<tr><td>Jenis Penggunaan</td><td>: ';
	$file='json/debit21.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if($jfo[$i]['grp']==1){
			if ($row['kdguna']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		}
	}
	echo '</td>
	<td>Golongan Debitur</td><td>: ';
	$file='json/debit21.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if($jfo[$i]['grp']==2){
			if ($row['kdgol']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		}
	}
	echo '</td>
</tr>
<tr><td>Sektor Ekonomi</td><td>: ';
	$file='json/debit21.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if($jfo[$i]['grp']==3){
			if ($row['kdsektor']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		}
	}
	echo '</td>
	<td>Jenis Kredit</td><td>: ';
	if($row['jkredit']==0){ 
		echo 'DENGAN PERJANJIAN KREDIT';
	}elseif($row['jkredit']==1){ 
		echo 'TAMPA PERJANJIAN KREDIT';
	}else{ 
		echo 'KOSONG';
	}
	echo '</td>
</tr>
<tr><td>Tujuan Penggunaan Dana</td><td>: '.$row['deb1'].'</td>
	<td></td><td>&nbsp;</td>
</tr>
</table>';
?>