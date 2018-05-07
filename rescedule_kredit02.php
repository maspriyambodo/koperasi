<?php 
include 'h_tetap.php';
include 'Lib/ftanggal.php';
$nomi=$result->c_d(keangka($_GET['nomi']));
$pokok=$result->c_d(keangka($_GET['saldoa']));
$bunga=$result->c_d(keangka($_GET['blunas']));
$adm=$result->c_d(keangka($_GET['alunas']));
$jumlah=$result->c_d(keangka($_GET['jumlah']));
$angsuran_ke=$result->c_d($_GET['angsuran_ke']);
$jangka=$result->c_d($_GET['jangka']);
$norek=$result->c_d($_GET['norek']);
$kdkop=$result->c_d($_GET['kdkop']);
echo '<table width="100%"><thead><tr><th class="ui-widget-header">NO</th><th class="ui-widget-header">KETERANGAN</th><th class="ui-widget-header">ANG. KE</th><th class="ui-widget-header">TANGGAL</th><th class="ui-widget-header">POKOK</th><th class="ui-widget-header">BUNGA</th><th class="ui-widget-header">ADM</th><th class="ui-widget-header">JUMLAH</th><th class="ui-widget-header">SALDO</th></tr></thead><tbody>';
if($angsuran_ke>1){
	$hasil=$result->res("SELECT pokok,bunga,adm,jumlah,kdtran,tgtagihan,angsurke,kdaktif,bulan,tanggal FROM $tabel_payment WHERE norek='$norek' AND angsurke<'$angsuran_ke' ORDER BY angsurke,kdtran");
	if($result->num($hasil)==0)$result->msg_error('Data Tagihan Tidak Ada..?');
	$no=1;
	while($row = $result->row($hasil)){
		if($row['angsurke']<$angsuran_ke){
			$kdtran=$row['kdtran'];
			$tgl_pinjam=$row['tanggal'];
			if($row['kdtran']=='777'){
				$nomi=$nomi-$row['pokok'];
				echo '<tr><td align="left">'.$no.'</td>';
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
				echo '<td align="center">'.$row['angsurke'].'</td><td align="left">'.date('d-M-Y',strtotime($row['tgtagihan'])).'</td><td align="right">'.number_format($row['pokok']).'</td><td align="right">'.number_format($row['bunga']).'</td><td align="right">'.number_format($row['adm']).'</td><td align="right">'.number_format($row['jumlah']).'</td><td align="right">'.number_format($nomi).'</td></tr>';
			}else{if($kdtran==111){
				$kete='Jadwal Tagihan Angsuran';
			}elseif($kdtran==333){
				$kete='Memorial Debet';
			}else{
				$kete='Retur/pkp  Angsuran';
			}
			echo '<tr bgcolor="#13fba4"><td align="left">'.$no.'</td><td align="left">'.$kete.'</td><td align="center">'.$row['angsurke'].'</td><td align="left">'.date('d-M-Y',strtotime($row['tgtagihan'])).'</td><td align="right">'.number_format($row['pokok']).'</td><td align="right">'.number_format($row['bunga']).'</td><td align="right">'.number_format($row['adm']).'</td><td align="right">'.number_format($row['jumlah']).'</td><td align="right">'.number_format($nomi).'</td></tr>';}$no++;}}$kete='Jadwal Tagihan Angsuran';$x=1;$mtgtran=$tgl_pinjam;$ypokok=$pokok;
			for($i=$angsuran_ke;$i<=$jangka;$i++){
				//include 'tem_bunga.php';
				if($pokok>$nomi){
					$pokok=$nomi;$yypokok=$ypokok-$pokok;
					if($yypokok>0){
						$bunga=$bunga+$yypokok;
					}
				}
				$nomi=$nomi-$pokok;$jumlah=$pokok+$bunga+$adm;$no++;
				if($no % 2){$clsname="even";}else{$clsname="odd";}
				$xtgtran=date_sql($mtgtran);
				echo '<tr class="'.$clsname.'"><td align="left">'.$no.'</td><td align="left">'.$kete.'</td><td align="center">'.$i.'</td><td align="left">'.date('d-M-Y',strtotime($mtgtran)).'</td><td align="right">'.number_format($pokok).'</td><td align="right">'.number_format($bunga).'</td><td align="right">'.number_format($adm).'</td><td align="right">'.number_format($jumlah).'</td><td align="right">'.number_format($nomi).'</td></tr>';
			}
			if($nomi>0)$result->msg_error('Rescedule Tidak Bisa, Mulai Angsuran Ke Tidak Sesuai...?');
		}else{
				$tgl_pinjam=$result->c_d(date_sql($_GET['tgtran']));
				$hasil=$result->res("SELECT pokok FROM payment WHERE norek='$norek' AND kdtran=777 ORDER BY kdtran LIMIT 1");
				if($result->num($hasil)>0) $result->msg_error('Maaf... Tidak Bisa Crate Angsuran Baru');
				$kete='Jadwal Tagihan Angsuran';$no=0;$x=1;$mtgtran=$tgl_pinjam;$ypokok=$pokok;
				for($i=$angsuran_ke;$i<=$jangka;$i++){
					//include 'tem_bunga.php';
					if($pokok>$nomi){
						$pokok=$nomi;$yypokok=$ypokok-$pokok;
						if($yypokok>0){$bunga=$bunga+$yypokok;}
					}
					$nomi=$nomi-$pokok;$jumlah=$pokok+$bunga+$adm;$no++;
					if($no % 2){$clsname="even";}else{$clsname="odd";}$xtgtran=date_sql($mtgtran);
					echo '<tr class="'.$clsname.'"><td align="left">'.$no.'</td><td align="left">'.$kete.'</td><td align="center">'.$i.'</td><td align="left">'.date('d-M-Y',strtotime($mtgtran)).'</td><td align="right">'.number_format($pokok).'</td><td align="right">'.number_format($bunga).'</td><td align="right">'.number_format($adm).'</td><td align="right">'.number_format($jumlah).'</td><td align="right">'.number_format($nomi).'</td></tr>';
				}
				if($nomi>0)$result->msg_error('Rescedule Tidak Bisa, Mulai Angsuran Ke Tidak Sesuai...?');
		}
echo '</tbody></table>';
?>