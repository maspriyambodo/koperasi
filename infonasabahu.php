<tr >
	<td width="17%">Nama Usaha Satu </td><td width="33%">: <?php echo $row['usaha1']; ?></td>
	<td width="17%">Nama Usaha Dua </td><td width="33%">: <?php echo $row['usaha2']; ?></td>
</tr>
<tr >
	<td>NPWP Usaha</td>
	<td>: <?php echo $row['npwpu']; ?></td>
	<td>Bidang Usaha</td>
	<td>: <?php
		if($row['bidang']==0){ 
			echo 'PERDAGANGAN';
		}elseif($row['bidang']==1){
			echo 'INDUSTRI';
		}elseif($row['bidang']==2){
			echo 'JASA USAHA';
		}elseif($row['bidang']==3){
			echo 'JASA SOSIAL';
		}elseif($row['bidang']==4){
			echo 'PEMERINTAH';
		}
		?>
	</td>
</tr>
<tr >
	<td>No Telepon I</td>
	<td>: <?php echo $row['tlphpu'];?></td>
	<td>No Telepon II</td>
	<td>: <?php echo $row['tlpfaxu'];?></td>
</tr>
<tr >
	<td>Alamat </td>
	<td>: <?php echo $row['alamatu'];?></td>
	<td>Kelurahan</td>
	<td>: <?php echo $row['lurahu'];?></td>
</tr>
<tr >
	<td>Kecamatan</td>
	<td>: <?php echo $row['camatu'];?></td>
	<td>Kabupaten</td>
	<td>: <?php
		$file='json/kabupaten.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['kotau']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		} ?>
	</td>
</tr>
<tr >
	<td>Kode Pos</td><td>: <?php echo $row['kdpos'];?></td>
	<td>Propinsi </td>
	<td>: <?php
		$file='json/propinsi.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['propinsiu']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		} ?>
	</td>
</tr>
<tr >
	<td>Pendapatan Bersih</td>
	<td>: <?php
		if($row['hasilb']==0){ 
			echo '<= 1 JUTA';
		}elseif($row['hasilb']==1){
			echo '>1 JUTA - 5 JUTA';
		}elseif($row['hasilb']==2){
			echo '>5 JUTA - 10 JUTA';
		}elseif($row['hasilb']==3){
			echo '>10 JUTA - 25 JUTA';
		}elseif($row['hasilb']==4){
			echo '>25 JUTA';
		}
		?>
		</td>
	<td>Penghasilan  Kotor </td>
	<td>: <?php
		if($row['hasilk']==0){ 
			echo '<= 25 JUTA';
		}elseif($row['hasilk']==1){
			echo '>25 JUTA - 50 JUTA';
		}elseif($row['hasilk']==2){
			echo '>50 JUTA - 100 JUTA';
		}elseif($row['hasilk']==3){
			echo '>100 JUTA - 500 JUTA';
		}elseif($row['hasilk']==4){
			echo '>500 JUTA';
		}
		?>
		</td>
</tr>
<tr >
	<td>Sumber Pendapatan Lain</td>
	<td>: <?php
		if($row['sumberl']==0){ 
			echo '<= 5 JUTA';
		}elseif($row['sumberl']==1){
			echo '>5 JUTA - 10 JUTA';
		}elseif($row['sumberl']==2){
			echo '>10 JUTA - 25 JUTA';
		}elseif($row['sumberl']==3){
			echo '>25 JUTA - 100 JUTA';
		}elseif($row['sumberl']==4){
			echo '>100 JUTA';
		}
		?>
		</td>
	<td>Tujuan Pembukaan Rek </td>
	<td>: <?php
		if($row['tujuanrek']==0){ 
			echo 'KREDIT';
		}elseif($row['tujuanrek']==1){
			echo 'GAJI';
		}elseif($row['tujuanrek']==2){
			echo 'TABUNGAN';
		}elseif($row['tujuanrek']==3){
			echo 'TRANSAKSI PRIBADI LAINNYA';
		}elseif($row['tujuanrek']==4){
			echo 'LAINNYA';
		}
		?>
	</td>
</tr>