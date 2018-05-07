<?php 
echo '<table>
<tr>
	<td colspan="2" >NAMA</td>
	<td colspan="5">: '.$row['nama'].'</td>
</tr>
<tr>
	<td colspan="2">NO REKENING</td>
	<td colspan="5">: '.$norek.' [ '.$row['nonas'].' ]'.'</td>
</tr>
<tr>
	<td colspan="2">NOMINAL / TG TRANSAKSI</td>
	<td colspan="5">: '.formatRupiah($nomi)." / ".date_sql($row['tgtran']).'</td>
</tr>
<tr>
	<td colspan="2">JANGKA WAKTU / SUKU BUNGA </td>
	<td colspan="5">: '.$row['jangka'].' '.$xxkdkop." / ".$row['suku'].' %</td>
</tr>
</table><table class="tabel-line" width="100%">
<thead><tr class="odd"><th>NO</th><th>KETERANGAN</th><th>TANGGAL</th><th>POKOK</th><th>BUNGA</th><th>ADM</th><th>JUMLAH</th><th>SALDO</th><th>KE</th></tr></thead><tbody>';
$hasil=$result->query_lap("SELECT norek,angsurke,tgtagihan,pokok,kdtran,bulan,kdkop,bunga,adm,jumlah FROM $temPayment WHERE norek='$norek' ORDER BY angsurke");
$no=1;$jpokok=0;$jbunga=0;$jadmin=0;$jangsur=0;
while($data = $result->row($hasil)){ 
	$pokok=$data['pokok'];
	$bunga=$data['bunga'];
	$adm=$data['adm'];
	$kdtran=$data['kdtran']; 
	$bulan=$data['bulan']; 
	$jumangsur=$pokok+$bunga+$adm;
	if($no % 2){
		$clsname="even";
	}else{
		$clsname="odd";
	}
	if($data['kdtran']=='777'){
		echo '<tr class="'.$clsname.'">
		<td align="left">'.$no.'</td>
		<td align="left">Bayar Angsuran Kredit</td>
		<td align="left">'.date('d-M-Y',strtotime($data['tgtagihan'])).'</td>
		<td align="right">'.number_format($data['pokok']).'</td>
		<td align="right">'.number_format($data['bunga']).'</td>
		<td align="right">'.number_format($data['adm']).'</td>
		<td align="right">'.number_format($jumangsur).'</td>
		<td align="right">'.number_format($nomi).'</td>
		<td align="center">'.$data['angsurke'].'</td>
		</tr>';
	}else{ 
		$nomi=$nomi-$data['pokok'];
		echo '<tr class="'.$clsname.'">
		<td align="left">'.$no.'</td>
		<td align="left">'.'Jadwal Angsuran Kredit'.'</td>
		<td align="left">'.date('d-M-Y',strtotime($data['tgtagihan'])).'</td>
		<td align="right">'.number_format($data['pokok']).'</td>
		<td align="right">'.number_format($data['bunga']).'</td>
		<td align="right">'.number_format($data['adm']).'</td>
		<td align="right">'.number_format($jumangsur).'</td>
		<td align="right">'.number_format($nomi).'</td>
		<td align="center">'.$data['angsurke'].'</td>
		</tr>';
	}
	$no++;
}
echo '</tbody></table>';
?>