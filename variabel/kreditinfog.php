<?php
echo '<table width="100%">';
if($row['status_klaim']==1){
	echo '<tr>
		<td>Tanggal Meninggal</td><td>: '.date_sql($row['tgmati']).'</td>
		<td>Tanggal Pengajuan</td><td>: '.date_sql($row['tgklaim']).'</td>
	</tr>
		<td>Status Pengajuan</td>
		<td>: PROSES PENGJUAN PENGHAPUSAN</td>
		<td>Jumlah Pengajuan</td>
		<td>: '.formatRupiah($row['jumlah_klaim']).'</td>
	</tr>
	</tr>
		<td>Jenis Pengajuan</td>
		<td colspan="3">: '.$xjenis_klaim.'</td>
		<td>Status Tagihan</td>
		<td>: '.$xketnas.'</td>
	</tr>';	
}elseif($row['status_klaim']==2){
	echo '<tr>
		<td>Tanggal Meninggal</td><td>: '.date_sql($row['tgmati']).'</td>
		<td>Tanggal Pengajuan</td><td>: '.date_sql($row['tgklaim']).'</td>
	</tr>
		<td>Status Pengajuan</td>
		<td>: SUDAH PENCAIRAN PENGHAPUSAN</td>
		<td>Jumlah Pengajuan</td>
		<td>: '.formatRupiah($row['jumlah_klaim']).'</td>
	</tr>
	<tr>
		<td>Tanggal Pencairan</td>
		<td>: '.date_sql($row['tgl_cair']).'</td>
		<td>Jumlah Pencairan</td>
		<td>: '.formatRupiah($row['jumlah_cair']).'</td>
	</tr>
	<tr>
		<td>Jenis Pengajuan</td>
		<td>: '.$xjenis_klaim.'</td>
		<td>Status Tagihan</td>
		<td>: '.$xketnas.'</td>
	</tr>';	
}else{
	echo '<tr>
		<td>Status Tagihan</td>
		<td>: '.$xketnas.'</td>
		<td>Ket. Status Tagihan</td>
		<td>: '.$xkketnas.'</td>
	</tr>';		
}
echo '<tr> 
	<td width="20%">Kolektibilitas </td>
	<td width="30%">: '.$xkolek.'</td>
	<td width="20%">Alasan Kolektibilitas</td>
	<td width="30%">: '.$xkkolek.'</td>
</tr>
<tr>
	<td class="ui-state-highlight">Saldo Awal</td>
	<td class="ui-state-highlight">: '.formatRupiah($row['saldo']).'</td>
	<td>&nbsp;</td>
	<td>&nbsp;</td>
</tr>
<tr>
	<td>Mutasi Debet Kas</td>
	<td>: '.formatRupiah($row['mutdeb']).'</td>
	<td>Mutasi Debet Memo</td>
	<td>: '.formatRupiah($row['memdeb']).'</td>
</tr>
<tr>
	<td>Mutasi Kredit Kas</td><td>: '.formatRupiah($row['mutkre']).'</td>
	<td>Mutasi Kredit Memo</td><td>: '.formatRupiah($row['memkre']).'</td>
</tr>
<tr> 
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td class="ui-state-highlight">Saldo Akhir</td>
	<td class="ui-state-highlight">: '.formatRupiah($row['saldoa']).'</td>
</tr>
<tr> 	
	<td>&nbsp;</td>
	<td>&nbsp;</td>
	<td>Saldo Payment</td>
	<td>: '.formatRupiah($loansaldo).'</td>
</tr>
</table>';
?>