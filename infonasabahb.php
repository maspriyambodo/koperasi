<tr>
	<td width="15%">Alamat</td><td width="35%">: <?php echo $row['alamatb']; ?></td>
	<td width="15%">Kelurahan</td><td width="35%">: <?php echo $row['lurahb']; ?></td>
</tr>
<tr>
	<td>Kecamatan</td><td>: <?php echo $row['camatb']; ?></td>
	<td>Kabupaten</td>
	<td>: <?php
		$file='json/kabupaten.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['kotab']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		} ?>
	</td>
</tr>
<tr>
	<td>Kode Pos</td><td>: <?php echo $row['kdpos'];?></td>
	<td>Propinsi </td>
	<td>: <?php
		$file='json/propinsi.json';
		$json_file = file_get_contents($file);
		$jfo = json_decode($json_file,TRUE);
		for ($i=0; $i<count($jfo); $i++) {
			if ($row['propinsib']==$jfo[$i]['kode']) {
				echo $jfo[$i]['kode'].' '.$jfo[$i]['desc1'];
			}
		} ?>
	</td>
</tr>