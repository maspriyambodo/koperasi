<?php $xkdkop=ket_tagihh($kdkop);$xkolek=ket_kolek($kolek);$hasil=$result->query_lap("SELECT pokok,bunga,adm,jumlah,kdtran,tgtagihan,angsurke,kdaktif,tanggal,bulan FROM $tabel_payment WHERE norek='$norek' ORDER BY angsurke,kdtran");if($kdkop==1){$tglakhir=tglAkhirBulan($thnxxx,intval($blnxxx));$tgl =$thn.'-'.$bln.'-'.$tglakhir;}else{$tgl=date_sql($tanggal);}$hasilx=$result->query_y1("SELECT SUM(if(kdtran=111,pokok,0))-SUM(if(kdtran=777,pokok,0)) as pokok,SUM(if(kdtran=111,bunga,0))-SUM(if(kdtran=777,bunga,0)) as bunga,SUM(if(kdtran=111,adm,0))-SUM(if(kdtran=777,adm,0)) as adm FROM $tabel_payment WHERE tanggal<='$tgl' AND norek='$norek' GROUP BY angsurke ORDER BY angsurke");$kkp=0;$kkb=0;$kka=0;$jkk=0;$kk=0;if($result->num($hasilx)>0){while($r=$result->row($hasilx)){$jkk=$r['pokok']+$r['bunga']+$r['adm'];$kkp=$kkp+$r['pokok'];$kkb=$kkb+$r['bunga'];$kka=$kka+$r['adm'];if($jkk>0){$kk++;}}}echo '<table style="border-collapse:collapse;font-family:Arial;font-size:9pt;" width="100%" border="1" cellpadding="2px"><thead><tr><td colspan="2" >NAMA</td><td colspan="7">'.$nama.'</td></tr><tr><td colspan="2">NO REKENING</td><td colspan="7">'.$norek.' [ '.$nonas.' ]</td></tr><tr><td colspan="2">NOPEN</td><td colspan="7">'.$nopen.'</td></tr><tr><td colspan="2">NOMINAL / TG TRANSAKSI</td><td colspan="7">'.number_format($nomi).' / '.date_sql($tgtran).'</td></tr><tr><td colspan="2">JANGKA WAKTU / SUKU BUNGA</td><td colspan="7">'.$jangka.' '.$xkdkop.' / '.$suku.' %</td></tr><tr><td colspan="2">KOLEKTIBILITAS</td><td colspan="7">'.$xkolek.'</td></tr><tr class="ui-widget-header"><th>NO</th><th>KETERANGAN</th><th>ANG. KE</th><th>TANGGAL</th><th>POKOK</th><th>BUNGA</th><th>ADM</th><th>JUMLAH</th><th>SALDO</th></tr></thead><tbody>';$no=1;$jpokok=0;$jbunga=0;$jadm=0;$jangsur=0;$tpokok=0;$tbunga=0;$tadm=0;$tangsur=0;$kpokok=0;$kbunga=0;$kadm=0;$kangsur=0;$spokok=0;$sbunga=0;$sadm=0;$sangsur=0;list($year, $month, $day) = explode('-',$tgl);$t1 = sprintf('%04d%02d%02d', $year, $month, $day);while($row = $result->row($hasil)){$pokok=$row['pokok'];$bunga=$row['bunga'];$adm=$row['adm'];$kdtran=$row['kdtran'];$bulan=$row['bulan'];if($row['kdtran']=='777'){$nomi=$nomi-$row['pokok'];echo '<tr bgcolor="#f2f2f2"><td align="left">'.$no.'</td>';if($row['kdaktif']==30){echo '<td width="25%">Pembayaran Setoran Memorial</td>';}elseif($row['kdaktif']==51){echo '<td width="25%">Pay Off Angsuran Tunai</td>';}elseif($row['kdaktif']==21){echo '<td width="25%">Pambayaran Mutasi Memorial</td>';}elseif($row['kdaktif']==31){echo '<td width="25%">Pembayaran Setoran Angsuran</td>';}elseif($row['kdaktif']==50){echo '<td width="25%">Pay Off Angsuran Memorial</td>';}else{echo '<td width="25%">Pembayaran Realisasi Angsuran</td>';}echo '<td align="center" width="10%">'.$row['angsurke'].'</td><td align="left">'.date('d-M-Y',strtotime($row['tgtagihan'])).'</td><td align="right">'.formatrp($row['pokok']).'</td><td align="right">'.formatrp($row['bunga']).'</td><td align="right">'.formatrp($row['adm']).'</td><td align="right">'.formatrp($row['jumlah']).'</td><td align="right">'.formatrp($nomi).'</td></tr>';$jpokok=$jpokok+$pokok;$jbunga=$jbunga+$bunga;$jadm=$jadm+$adm;}else{list($year, $month, $day) = explode('-', $row['tanggal']);$t2=sprintf('%04d%02d%02d', $year, $month, $day);if($kdtran==111){$kete='Jadwal Tagihan Angsuran';if($t2>$t1){$tpokok=$tpokok+$pokok;$tbunga=$tbunga+$bunga;$tadm=$tadm+$adm;}}elseif($kdtran==333){$kete='Memorial Debet';}else{$kete='Retur/pkp  Angsuran';}echo '<tr bgcolor="#bcfee6"><td align="left">'.$no.'</td><td align="left" width="25%">'.$kete.'</td><td align="center" width="10%">'.$row['angsurke'].'</td><td align="left">'.date('d-M-Y',strtotime($row['tgtagihan'])).'</td><td align="right">'.formatrp($row['pokok']).'</td><td align="right">'.formatrp($row['bunga']).'</td><td align="right">'.formatrp($row['adm']).'</td><td align="right">'.formatrp($row['jumlah']).'</td><td align="right">'.formatrp($nomi).'</td></tr>';}$no++;}echo '<tr class="ui-widget-header"><td align="center" colspan="8">SALDO NOMINATIF</td><td align="right">'.formatrp($saldoa).'</td></tr><tr class="ui-state-highlight"><td colspan="4">[B] JUMLAH SUDAH DIBAYAR</td><td align="right">'.formatrp($jpokok).'</td><td align="right">'.formatrp($jbunga).'</td><td align="right">'.formatrp($jadm).'</td><td align="right">'.formatrp($jpokok+$jbunga+$jadm).'</td><td align="right">&nbsp;</td></tr><tr class="ui-state-highlight"><td colspan="4">[C] JUMLAH TUNGGAKAN [ '.formatrp($kk).' ]</td><td align="right">'.formatrp($kkp).'</td><td align="right">'.formatrp($kkb).'</td><td align="right">'.formatrp($kka).'</td><td align="right">'.formatrp($kkp+$kkb+$kka).'</td><td align="right">&nbsp;</td></tr><tr class="ui-state-highlight"><td colspan="4">[D] JUMLAH BELUM DIBAYAR</td><td align="right">'.formatrp($tpokok).'</td><td align="right">'.formatrp($tbunga).'</td><td align="right">'.formatrp($tadm).'</td><td align="right">'.formatrp($tpokok+$tbunga+$tadm).'</td><td align="right">&nbsp;</td></tr><tr class="ui-state-highlight"><td colspan="4">[B+C+D] TOTAL ANGSURAN KREDIT</td><td align="right">'.formatrp($tpokok+$kkp+$jpokok).'</td><td align="right">'.formatrp($tbunga+$kkb+$jbunga).'</td><td align="right">'.formatrp($tadm+$kka+$jadm).'</td><td align="right">'.formatrp($jpokok+$jbunga+$jadm+$kkp+$kkb+$kka+$tpokok+$tbunga+$tadm).'</td><td align="right">&nbsp;</td></tr></tbody></table>'; ?>