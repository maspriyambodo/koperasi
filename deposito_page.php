<?php
echo '</head><body><table id="tableData" class="table-line"><tr><th>NO</th>
<th>NAMA</th>
<th>NONAS</th>
<th>NO BILYET</th>
<th>NOMINAL</th>
<th>TGL BUKA</th>
<th>JATUH TEMPO</th>
<th>JW</th>
<th>BUNGA</th>
<th>STATUS</th><th>AKSI</th></tr></thead><tbody>';
$no_nasabah=$result->c_d($_POST['nonas']);
$hasil=$result->query_x1("SELECT a.id,a.nomor_nasabah,a.nomor_bilyet,a.seri_bilyet,DATE_FORMAT(a.tanggal_buka,'%d-%m-%Y') AS tanggal_buka,DATE_FORMAT(a.tanggal_jatuh_tempo,'%d-%m-%Y') AS tanggal_jatuh_tempo,a.counter_rate,a.jangka_waktu,a.nominal,a.status_rekening,b.nama FROM deposito.deposits a JOIN $tabel_nasabah b ON a.nomor_nasabah=b.nonas WHERE a.nomor_nasabah='$no_nasabah'");
if($result->num($hasil)>0){
	$no=1;
	while ($row=$result->row($hasil)){
		echo '<tr>
		<td>'.$no.'</td>
		<td>'.$row['nama'].'</td>
		<td>'.$row['nomor_nasabah'].'</td>
		<td>'.$row['nomor_bilyet'].'-'.$row['seri_bilyet'].'</td>
		<td align="right">'.formatrp($row['nominal']).'</td>
		<td>'.$row['tanggal_buka'].'</td>
		<td>'.$row['tanggal_jatuh_tempo'].'</td>
		<td>'.$row['jangka_waktu']." bulan".'</td>
		<td>'.$row['counter_rate']." % ".'</td>
		<td>';
		if($row['status_rekening']==0){
			echo 'Belum Aktif';
		}elseif($row['status_rekening']==1){
			echo 'Sudah Aktif';
		}elseif($row['status_rekening']==2){
			echo 'Di Blokir';
		}elseif($row['status_rekening']==3){
			echo 'Di Jaminkan';
		}else{
			echo 'Sudah Di Tutup';
		}
		echo '</td><td>';
		if(isset($_POST['h'])){
			if($result->c_d($_POST['h'])==1){
				 echo '
				 <a class="icon-ok" onClick="AuthMethod('.$row['id'].')" title="Update Flag Bayar Bunga Deposito">Edit I</a>
				<a class="icon-ok" onClick="AuthMethoda('.$row['id'].')" title="Update Flag Belum Bayar Bunga Deposito">Edit II</a>
				<a class="icon-ok" onClick="AuthMethodd('.$row['id'].')" title="Hapus Bunga Deposito">Delete</a>
				<a class="icon-ok" onClick="AuthMethode('.$row['id'].')" title="Create Bunga Deposito">Create</a>';
			}elseif($result->c_d($_POST['h'])==2){
				echo '<a class="icon-ok" onClick="AuthMethode('.$row['id'].')" title="Update Data Deposito">Edit</a>';
			}elseif($result->c_d($_POST['h'])==3){
				echo '<a class="icon-ok" onClick="AuthMethode('.$row['id'].')">Pilih</a>';
			}elseif($result->c_d($_POST['h'])==4){
				echo '<a class="icon-ok" onClick="lptMethod('.$row['id'].')" title="Cetak Bilyet Deposito">Print</a>';
			}elseif($result->c_d($_POST['h'])==5){
				echo '
				<a class="icon-ok" onClick="AuthMethod('.$row['id'].')" title="Print Layar">Layar</a>
				<a class="icon-ok" onClick="PdfMethod('.$row['id'].')" title="Print PDF">PDF</a>';
			}
		}
		echo '</td></tr>';$no++; 
	}
}else{
	echo '<tr>
	<td align="center" colspan="8" style="color: #ff0000">Data Nomor Nasabah tidak ditemukan!</td></tr>';
}
echo '</tbody></table>
<div id="dialog" style="display: none"></div>';
?>