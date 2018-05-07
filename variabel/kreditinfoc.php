<?php
echo '<table width="100%">
<tr><td colspan="4" align="center" class="ui-state-highlight"><strong>DATA AHLI WARIS DEBITUR</strong></td></tr>
<tr>
	<td>Nama</td><td>: '.$row['nmwaris'].'</td>
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
<tr><td colspan="4" align="center" class="ui-state-highlight"><strong>DATA PENDAMPING DEBITUR</strong></td></tr>
<tr>
	<td>Nama</td><td>: '.$row['nama_pendamping'].'</td>
	<td>No KTP</td><td>: '.$row['ktp_pendamping'].'</td>
</tr>
	<td>Alamat</td><td>: '.$row['alamat_pendamping'].'</td>
	<td>Kelurahan</td><td>: '.$row['lurah_pendamping'].'</td>
</tr>
<tr>
	<td>Kecamatan</td><td>: '.$row['camat_pendamping'].'</td>
	<td>No Telepon Pendamping</td><td>: '.$row['tlp_pendamping'].'</td>
</tr>
<tr><td colspan="4" align="center" class="ui-state-highlight"><strong>DATA BANK DAN TRANSFER DEBITUR</strong></td></tr>
<tr>
   <td>Referensi SO</td><td>: '.$row['no_aso_bank'].'</td>
   <td>Rekening Bank Lain</td><td>: '.$row['nocitra'].'</td>
</tr>
<tr>
   <td>No CIF Bank</td><td>: '.$row['no_cif_bank'].'</td>
   <td>Nama Cheking Nasabah</td><td>: ';
	$file='json/sales.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if ($row['mitra_cheking']==$jfo[$i]['idsales']) {
			echo $jfo[$i]['nama'];
		}
	}
	echo '</td>
</tr>
<tr>
   <td>Nama Bank Transfer</td><td>: '.$row['bank_transfer'].'</td>
   <td>Nama Rekening Transfer</td><td>: '.$row['nama_transfer'].'</td>
</tr>
<tr>
   <td>No Rekening Transfer</td><td>: '.$row['rekening_transfer'].'</td>
   <td>Tanggal Transfer</td><td>: '.$row['tanggal_transfer'].'</td>
</tr>
<tr><td colspan="4" align="center" class="ui-state-highlight"><strong>DATA PELAPORAN BI</strong></td></tr>
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
</table>';
?>