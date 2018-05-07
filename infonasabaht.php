<tr >
	<td width="15%">Branch </td>
	<td width="35%">: <?php echo $row['branch'];?></td>
	<td width="15%">No Nasabah </td>
	<td width="35%">: <?php echo $row['nonas'];?></td>
</tr>
<tr >
	<td>Nama Sesuai KTP </td>
	<td>: <?php echo $row['nama']; ?></td>
	<td>Tempat Lahir</td>
	<td>: <?php echo $row['tgllahir'];?></td>
</tr>
<tr >
	<td>Tanggal Lahir </td>
	<td>: <?php echo $row['tgllahir']; ?></td>
	<td>No KTP </td>
	<td>: <?php echo $row['noktp']; ?></td>
</tr>
<tr >
	<td>Masa Berlaku KTP</td>
	<td>: <?php echo $row['masaktp']; ?></td>
	<td>No NPWP </td>
	<td>: <?php echo $row['npwp']; ?></td>
</tr>
<tr >
	<td>Jenis Kelamin</td>
	<td>: 
		<?php 
			if($row['jkelamin']==0){ 
				echo 'PRIA';
			}else{
				echo 'WANITA';
			}
		?>
	</td>
	<td>Agama</td>
	<td>: 
		<?php $agama=$row['agama'];include('parameter/_agama.php');echo $xagama;?>
	</td>
</tr>
<tr >
	<td>Pendidikan</td>
	<td>: <?php $pendidikan=$row['pendidikan'];include('parameter/_pendidikan.php');echo $xpendidikan;?></td>
	<td>Pekerjaan</td>
	<td>: <?php echo $row['pekerjaan1']; ?></td>
</tr>
<tr >
	<td>Status Nasabah</td>
	<td>: <?php $kstatus=$row['kstatus'];include('parameter/_ketstatus.php');echo $xkstatus;?></td>
	<td>Jml Tanggungan</td>
	<td>: <?php echo $row['tanggungan']; ?></td>
</tr>
<tr >
	<td>Nama Ibu Kandung</td>
	<td>: <?php echo $row['namaibu']; ?></td>
	<td>Telepon Rumah I</td>
	<td>: <?php echo $row['tlprumah']; ?></td>
</tr>
<tr >
	<td>Telepon Rumah II</td>
	<td>: <?php echo $row['tlpfax']; ?></td>
	<td>No Handphone I </td>
	<td>: <?php echo $row['tlphp1']; ?>
	</td>
</tr>
<tr >
	<td>No Handphone II </td>
	<td>: <?php echo $row['tlphp2']; ?>
	</td>
	<td>Alamat</td>
	<td>: <?php echo $row['alamat']; ?></td>
</tr>
<tr >
	<td>Kelurahan</td>
	<td>: <?php echo $row['lurah']; ?></td>
	<td>Kecamatan</td>
	<td>: <?php echo $row['camat']; ?></td>
</tr>
<tr>
	<td>Kabupaten</td>
	<td>: <?php
		$file='json/kabupaten.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['kota']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		} ?>
	</td>
	<td>Kode Pos</td><td>: <?php echo $row['kdpos'];?></td>
</tr>
<tr >
	<td>Propinsi </td>
	<td>: <?php
		$file='json/propinsi.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['propinsi']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		} ?>
	</td>
	<td>Negara </td>
	<td>: <?php echo $row['negara']; ?></td>
</tr>
<tr>
	<td>Status Rumah</td>
	<td>: <?php $rumah=$row['rumah'];include('parameter/_rumah.php');echo $xrumah;?></td>
	<td>Lama Menempati</td>
	<td>: <?php echo $row['lamarmh']; ?></td>
</tr>
<tr>
	<td>Nama Suami Istri </td>
	<td>: <?php echo $row['sistri']; ?></td>
	<td>Pekerjaan Suami/Istri </td>
	<td>: <?php echo $row['pekerjaan2']; ?></td>
</tr>