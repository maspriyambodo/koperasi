<?php 
$norek=$result->c_d($_POST['nonas']);
$hasil=$result->query_x1("SELECT id,norek,tgtagihan,kdtran,pokok,bunga,adm,jumlah,angsurke,kdaktif FROM $tabel_payment WHERE norek='$norek' ORDER BY angsurke,kdtran");
echo '<table id="tableData" class="table-line"><thead><tr><th class="ui-widget-header" >NO</th><th class="ui-widget-header">KETERANGAN</th><th class="ui-widget-header">ANG. KE</th><th class="ui-widget-header">TANGGAL</th><th class="ui-widget-header">POKOK</th><th class="ui-widget-header">BUNGA</th><th class="ui-widget-header">ADM</th><th class="ui-widget-header">JUMLAH</th><th class="ui-widget-header">SALDO</th><th class="ui-widget-header">PROSES</th></tr></thead><tbody>';$no=1;
if($result->num($hasil)!=0){
	while($row= $result->row($hasil)){ 
		if($row['kdtran']=='777'){  
			$nomi=$nomi-$row['pokok'];
			echo '<tr>
			<td align="left">'.$no.'</td>';
			if($row['kdaktif']==30){
				echo '<td>Setoran Angsuran Memorial</td>';
			}elseif($row['kdaktif']==51){
				echo '<td>Pelunasan  Angsuran Tunai</td>';
			}elseif($row['kdaktif']==21){
				echo '<td>Memorial Kredit</td>';
			}elseif($row['kdaktif']==31){
				echo '<td>Setoran Angsuran Tunai</td>';
			}elseif($row['kdaktif']==50){
				echo '<td>Pelunasan  Angsuran Memorial</td>';
			}else{
				echo '<td>Realisasi Angsuran</td>';
			}
			echo'<td align="center">'.$row['angsurke'].'</td>
			<td align="left">'.date('d-M-Y',strtotime($row['tgtagihan'])).'</td>
			<td align="right">'.number_format($row['pokok']).'</td>
			<td align="right">'.number_format($row['bunga']).'</td>
			<td align="right">'.number_format($row['adm']).'</td>
			<td align="right">'.number_format($row['jumlah']).'</td>
			<td align="right">'.number_format($nomi).'</td>
			<td align="center"><a title="Retur Tagihan Kredit" class="icon-remove" onClick="showEdit('.$row['id'].')">Retur</a></td></tr>';
			$no++;
		}
	}
}else{
	echo '<tr><td align="center" colspan="10" style="color: #ff0000">Data Tagihan Tidak Ada!!!</td></tr>';
}
echo '</tbody></table>';
?>