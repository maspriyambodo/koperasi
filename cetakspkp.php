<?php include 'h_tetap.php';$branch=$result->c_d($_GET['kcabang']);$tgl1=$result->c_d($_GET['tgl1']);$tgl2=$result->c_d($_GET['tgl2']);$pokok=$result->c_d($_GET['pokok']);$tgl1=date_sql($tgl1);$tgl2=date_sql($tgl2);
if ($pokok==1){
	$hasil = $result->query_lap("SELECT a.id,a.branch,a.nonas,a.norek,a.notran,a.tgtran,a.nomi,a.kdaktif,a.jangka,a.suku,b.nama FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.branch='$branch' AND tgtran>='$tgl1' AND tgtran<='$tgl2' AND kdaktif<2 ORDER BY notran,tgtran");
}else{
	$hasil = $result->query_lap("SELECT a.id,a.branch,a.nonas,a.norek,a.notran,a.tgtran,a.nomi,a.kdaktif,a.jangka,a.suku,b.nama FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.branch='$branch' AND tgtran>='$tgl1' AND tgtran<='$tgl2' AND kdaktif=0 ORDER BY notran,tgtran");
}
echo '<table class="table-line" width="100%"><thead><tr><th>Nomor</th><th>Branch</th><th>Norek</th><th>Nonas</th><th>Nama</th><th>Nominal</th><th>Tgl / Jangka</th><th>SB</th><th>Status</th></tr></thead><tbody>';
$jumrecord=$result->num($hasil);$no=1;
if($jumrecord!=0){
	while($row = $result->row($hasil)){ 
		echo '<tr class="even">
		<td>'.$no.'</td>
		<td>'.$row['branch'].'</td>
		<td>'.$row['norek'].'</td>
		<td>'.$row['nonas'].'</td>
		<td>'.$row['nama'].'</td>
		<td align="right">'.number_format($row['nomi']).'</td>
		<td align="center">'.$row['tgtran'].' - '.$row['jangka'].'</td>
		<td align="center">'.$row['suku'].'</td>';
		if($row['kdaktif']==0){
			echo '<td style="color: #ff0000">Belum Otorisasi</td>';
		}else{
			echo '<td style="color:#45c936">Sudah Otorisasi</td>';
		}
		echo '</tr><tr>
		<td align="center" colspan="9">
		<a class="standar" onClick="showEdit('.$row['id'].')"><img src="css/images/print.png">Aplikasi Kredit</a>
		<a class="standar" onClick="showEdit1('.$row['id'].')"><img src="css/images/print.png">Ketum Kredit</a>
		<a class="standar" onClick="showEdit2('.$row['id'].')"><img src="css/images/print.png">Surat Permohonan</a>
		<a class="standar" onClick="showEdit3('.$row['id'].')"><img src="css/images/print.png">Surat Kuasa</a>
		<a class="standar" onClick="showEdit4('.$row['id'].')"><img src="css/images/print.png">Jadwal Angsuran</a>
		<a class="standar" onClick="showEdit5('.$row['id'].')"><img src="css/images/print.png">Terima Dokumen</a>
		<a class="standar" onClick="showEdit6('.$row['id'].')"><img src="css/images/print.png">Premi Asuransi</a>
		</td></tr>';
		$no++;
	}
}else{
	echo '<tr><td align="center" colspan="12">DATA TIDAK ADA</td></tr>';
}
echo '</tbody></table>';
?>