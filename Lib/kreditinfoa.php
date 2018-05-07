<?php
echo '<table width="100%">
<tr>
	<td width="20%">No Nasabah</td>
	<td width="30%">: '.$row['branch'].'-'.$row['nonas'].'-'.$row['sufix'].'</td>
	<td width="20%">Nama</td>
	<td width="30%">: '.$row['nama'].'</td>
</tr>
<tr>
	<td>Alamat</td>
	<td colspan="3">: '.$row['alamat'].' KEL '.$row['lurah'].' KEC '.$row['camat'].'</td>
</tr>
<tr>
	<td>No KTP</td><td>: '.$row['noktp'].'</td>
	<td>Masa Berlaku KTP</td><td>: '.date_sql($row['masaktp']).'</td>
</tr>
<tr>
	<td>Tgl Lahir</td><td>: '.date_sql($row['tglahir']). ' [ '.$row['umur'].' Tahun ]'.'</td>
	<td>Nama Rekomendasi</td><td>: '.$row['nrekom'].'</td>
</tr>
<tr>
	<td>Kota</td>
	<td>: '.$row['kota'].' [ ';
	$file='json/kabupaten.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if ($row['kota']==$jfo[$i]['kode']) {
			echo $jfo[$i]['desc1'];
		}
	}
	echo ' ]</td>
	<td>Kode Pos</td>
	<td>: '.$row['kdpos'].'</td>
	
</tr>
<tr>
	<td>Kode Jiwa</td><td>: '.$row['kdjiwa'].'</td>
	<td>Nopen</td><td>: '.$row['nopen'].'</td>
</tr>
<tr>
	<td>Kode Pensiun</td>
	<td>: '.$row['jenis'].' [ ';
	$file='json/jpensiun.json';
	$json_file = file_get_contents($file);
	$jfo = json_decode($json_file,TRUE);
	for ($i=0; $i<count($jfo); $i++) {
		if ($row['jenis']==$jfo[$i]['kdpen']) {
			echo $jfo[$i]['ketpen'];
		}
	}
	echo ' ]</td>
	<td>Jenis Pensiun</td><td>: '.$row['jenis1'].'</td>
</tr>
<tr>
	<td>No Dapem</td><td>: '.$row['nodapem'].'</td>
	<td>No Karip</td><td>: '.$row['nokarip'].'</td>
</tr>
<tr>
	<td>Pekerjaan</td><td>: '.$row['pekerjaan'].'</td>
	<td>Rekening Bank Lain</td><td>: '.$row['nocitra'].'</td>
</tr>
<tr>
	<td>Instansi Pensiun</td><td>: '.$row['instansi_pensiun'].'</td>
	<td>Pengelola Pensiun</td><td>: ';
	$huruf = array("PT TASPEN","PT ASABRI","LAINNYA");$i = 0;
	while($i<3){
		if($row['pengelola_pensiun'] == $i) echo $huruf[$i];
		$i++;
	}
	echo '</td>
</tr>
<tr>
	<td>Rekening Simpanan Pokok</td><td>: '.$row['norekp'].'</td>
	<td>Rekening Simpanan Wajib</td><td>: '.$row['norekw'].'</td>
</tr>
<tr>
	<td>Pendapatan Gaji</td><td>: '.formatRupiah($row['gaji']).'</td>
	<td>Pendapatan Lainnya</td><td>: '.formatRupiah($row['self1']).'</td>
</tr>
<tr>
	<td>Pinjaman Bank</td><td>: '.formatRupiah($row['pbank']).'</td>
	<td>Pinjaman Lainnya</td><td>: '.formatRupiah($row['plain']).'</td>
</tr>
<tr><td colspan="4" align="center"><strong>JENIS JAMINAN : '.$xkdskep.'</strong></td></tr>';
if($kdskep==0){
	echo '<tr>
		<td>Nomor Skep Pensiun</td>
		<td>: '.$row['nosk'].'</td>
		<td>Penerbit Skep Pensiun</td>
		<td>: '.$row['pensk'].'</td>
	</tr>
	<tr>
		<td>Tanggal Skep Pensiun </td>
		<td>: '.$row['tgsk'].'</td>
		<td colspan="2">&nbsp;</td>
	</tr>';
}elseif($kdskep==1){
	echo '<tr>
		<td>Nomor Skep Pegawai</td>
		<td>: '.$row['nosk'].'</td>
		<td>Penerbit Skep Pegawai</td>
		<td>: '.$row['pensk'].'</td>
	</tr>
	<tr>
		<td>Tanggal Skep Peagawai </td>
		<td>: '.$row['tgsk'].'</td>
		<td colspan="2">&nbsp;</td>
	</tr>';
}elseif($kdskep==2){
	echo '<tr>
		<td>Nomor BPKB</td>
		<td>: '.$row['nosk'].'</td>
		<td>Pembuat BPKP</td>
		<td>: '.$row['pensk'].'</td>
	</tr>
	<tr>
		<td>Tanggal BPKP</td>
		<td>: '.$row['tgsk'].'</td>
		<td>DB / Tahun Pembuatan</td>
		<td>: '.$row['agunan1'].'</td>
	</tr>
	<tr>
		<td>Nomor Rangka</td>
		<td>: '.$row['agunan2'].'</td>
		<td>Nomor Mesin</td>
		<td>: '.$row['agunan3'].'</td>
	</tr>
	<tr>
		<td>Type / Model</td>
		<td>: '.$row['agunan4'].'</td>
		<td>NO STNK</td>
		<td>: '.$row['agunan5'].'</td>
	</tr>
	<tr>
		<td>Tgl Berlaku STNK</td>
		<td>: '.$row['tgstnk'].'</td>
		<td>Tgl Berakhir Pajak</td>
		<td>: '.$row['tgpjk'].'</td>
	</tr>';
}elseif($kdskep==3){
	echo '<tr>
		<td>Nomor Sertifikat</td>
		<td>: '.$row['nosk'].'</td>
		<td>Pembuat Sertifikat</td>
		<td>: '.$row['pensk'].'</td>
	</tr>
	<tr>
		<td>Tanggal Sertifikat</td>
		<td>: '.$row['tgsk'].'</td>
		<td>Nama Notaris</td>
		<td>: '.$row['agunan1'].'</td>
	</tr>
	<tr>
		<td>Alamat Notaris</td>
		<td>: '.$row['agunan2'].'</td>
		<td>Luas Tanah/Bangunan</td>
		<td>: '.$row['agunan3'].'</td>
	</tr>
	<tr>
		<td>Pemilik</td>
		<td>: '.$row['agunan4'].'</td>
		<td>Alamat</td>
		<td>: 	'.$row['agunan5'].'</td>
	</tr>';
}elseif($kdskep==4){
	echo '<tr>
		<td>No Ijazah</td>
		<td>: '.$row['nosk'].'</td>
		<td>Pembuat Ijazah</td>
		<td>: '.$row['pensk'].'</td>
	</tr><tr>
		<td>Tanggal Ijazah</td>
		<td>: '.$row['tgsk'].'</td>
		<td colspan="2">&nbsp;</td>
	</tr>';
}elseif($kdskep==5){
	echo '<tr>
		<td>No Akte Nikah</td>
		<td>: '.$row['nosk'].'</td>
		<td>Pembuat Akte Nikah</td>
		<td>: '.$row['pensk'].'</td>
	</tr><tr>
		<td>Tanggal Pernikahan</td>
		<td>: '.$row['tgsk'].'</td>
		<td colspan="2">&nbsp;</td>
	</tr>';
}elseif($kdskep==6){

}
echo '</table>';
?>