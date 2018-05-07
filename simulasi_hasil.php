<?php include 'h_tetap.php';include 'Lib/ftanggal.php';$jum_kdangsur=0;$nomi=$result->c_d(keangka($_POST['nomi']));$jangka=$result->c_d($_POST['jangka']);$saldoa=$result->c_d(keangka($_POST['saldoa']));$blunas=$result->c_d(keangka($_POST['blunas']));$bungakk=$result->c_d(keangka($_POST['bungakk']));$alunas=$result->c_d(keangka($_POST['alunas']));$gaji=$result->c_d(keangka($_POST['gaji']));if($gaji<10000) die('Jumlah pendapatan tidak memenuhi syarat');$produk=$result->c_d($_POST['produk']);$kdangsur=$result->c_d($_POST['kdangsur']);$jum_kdangsur=$result->c_d($_POST['jum_kdangsur']);$suku=$result->c_d($_POST['suku']);$kdpremi=$result->c_d($_POST['kdpremi']);$tenor_premi=0;$jumlah_period=$result->c_d($_POST['jumlah_period']);$jumbtl=$result->c_d(keangka($_POST['jumbtl']));$simpanan_pokok=$result->c_d(keangka($_POST['simpanan_pokok']));$simpanan_wajib=$result->c_d(keangka($_POST['simpanan_wajib']));$nama=$result->c_d($_POST['nama']);$jumrefund=0;$tgllahir=$result->c_d($_POST['thn_lahir']).'-'.$result->c_d($_POST['bln_lahir']).'-'.$result->c_d($_POST['tgl_lahir']);$tgtran=$result->c_d($_POST['thn_pinjam']).'-'.$result->c_d($_POST['bln_pinjam']).'-'.$result->c_d($_POST['tgl_pinjam']);$umur=age($tgllahir);if($kdpremi!=9){$hasil=$result->res("SELECT a.tenor_premi,a.jangka_waktu,a.umur,b.kode_asuransi,b.status_asuransi FROM tbl_premi a JOIN tbl_asuransi b on a.kode_asuransi=b.kode_asuransi WHERE b.kode_asuransi='$kdpremi' AND b.status_asuransi=1 AND a.jangka_waktu='$jangka' AND a.umur='$umur' LIMIT 1");if(!$hasil){die ($result->xpdata(""));}if($result->num($hasil)!=0){$row = $result->row($hasil);$tenor_premi=$row['tenor_premi'];}else{die("Kode Asuransi : ".$kdpremi." Umur : ".$umur." Tahun [Nama Asuransi Belum Terdaftar!]");}}$hasil=$result->res("SELECT badm,bprovisi,bpremi,bmeterai,mplafon,bumur,htagih FROM debit1 WHERE kdproduk='$produk' LIMIT 1");if(!$hasil){die($result->xpdata(""));}if($result->num($hasil)!=0){$row = $result->row($hasil);$kdkop=$row['htagih'];if($kdkop==1){if($jangka<1 || $jangka>36){	die("Jangka Waktu Tidak Sesuai [ Minimum 2 Bln Dan Max=36 Bln ]");}}elseif($kdkop==2){if($jangka!=30 && $jangka!=60 && $jangka!=90 && $jangka!=120){die("Jangka Waktu Tidak Sesuai [ Minimum 30 Hari Dan Max=90 Hari ]");}}elseif($kdkop==3){if($jangka!=4 && $jangka!=8 && $jangka!=12 && $jangka!=16){die("Jangka Waktu Tidak Sesuai [ Minimum 4 Minggu Dan Max=16 Minggu ]");}}else{die("Skim Tagihan Belum Terdaftar ".$kdkop);}$adm=$row['badm'];$provi=$row['bprovisi'];$meterai=$row['bmeterai'];$mplafon=$row['mplafon'];$bumur=$row['bumur'];if($umur>$bumur){die('Umur : '.$umur.'  Tahun, Maximum Umur : '.$bumur.' Tahun, Transaksi Batal');}$jumlunas = intval($blunas + $bungakk + $saldoa + $alunas);$mpremi = intval(($nomi * $tenor_premi) / 100 + 0.5);$mprovi = intval(($nomi * $provi) / 100 + 0.5);$mmadm = intval(($nomi * $adm) / 100 + 0.5);$jumbiaya = intval($mpremi + $mprovi + $mmadm + $meterai);if($produk=='KMP'){$mjangka=$jangka;$pokok = intval(ceil($nomi/$mjangka));}else{$pokok = intval(ceil($nomi/$jangka));}if($kdkop==2){$mjangka=intval($jangka/30);$bunga=intval(($nomi*$suku)/100+0.5);$bunga=intval(($bunga*$mjangka)/$jangka);}elseif($kdkop==3){$mjangka=intval($jangka/4);$bunga=intval(($nomi*$suku)/100+0.5);$bunga=intval(($bunga*$mjangka)/$jangka);}else{$bunga = intval(($nomi*$suku) / 100 + 0.5);}$madm=0;$total = intval($pokok + $bunga) / 1000;$madm = bulat_tag($total,$madm);$jumangsur = intval($pokok + $bunga + $madm);$max=intval(($jumangsur/$gaji)*100);if($max>$mplafon){die("Melebihi Plafond : ".$max.' % Transaksi Batal');}$jumbersih = intval($nomi - $jumbiaya - $jumlunas);$xjumangsur=0;$jum_period=0;if($produk=='KMP'){$jum_admx=intval(($madm*$jumlah_period));$jum_periodx=intval(($bunga*$jumlah_period));$jum_period=intval(($jum_periodx+$jum_admx));}if($kdangsur==0){$xjumangsur=intval($jumangsur*$jum_kdangsur);}$jumbiaya=$jumbiaya+$jum_period+$xjumangsur;$jumbersih =intval($nomi-$jumbiaya-$jumlunas-$jumbtl-$simpanan_pokok-$simpanan_wajib);if($jumbersih<1){die("Jumlah Diterima  : Rp. ".$jumbersih.'  Transaksi Batal');}}else{die('Kode Produk Belum Terdaftar!');}?>
<table width="100%" style="font-size: 9pt">
	<tr><th colspan="4" class="ui-state-highlight">DATA PINJAMAN || <?php echo $result->produk_kredit($produk).' || UMUR '.$umur.' Tahun || Nama : '.$nama;?></th></tr>
	<tr>
		<td align="right" width="20%">Plafon Pinjaman :</td>
		<td width="30%"><input style="text-align:right" name="nomi" type="text" id="nomi" value="<?php echo formatrp($nomi);?>" readonly/></td>
		<td align="right" width="20%">Biaya Administrasi :</td>
		<td width="30%"><input style="text-align:right" name="jumadm" type="text" id="jumadm" maxlength="15" value="<?php echo formatrp($mmadm); ?>"/></td>
	</tr>
	<tr>
		<td align="right">Suku Bunga :</td>
		<td><input style="text-align:right" name="bunga" type="text" id="bunga" value="<?php echo $suku;?>" readonly/> %</td>
		<td align="right">Biaya Provisi :</td>
		<td><input style="text-align:right" name="jumprovisi" type="text" id="jumprovisi" maxlength="15" value="<?php echo formatrp($mprovi); ?>"/></td>
	</tr>
	<tr>
		<td align="right">Jangka Waktu :</td>
		<td><input style="text-align:right" name="jangka" type="text" id="jangka" value="<?php echo $jangka;?>"readonly/>Bulan</td>
		<td align="right">Biaya Asuransi :</td>
		<td><input style="text-align:right" name="jumpremi" type="text" id="jumpremi" maxlength="15" value="<?php echo formatrp($mpremi);?>"/></td>
	</tr>
	<tr>
		<td align="right">Potongan Lainnya :</td>
		<td><input style="text-align:right" name="jumbtl" type="text" id="jumbtl" maxlength="15" value="<?php echo formatrp($jumbtl); ?>"/></td>
		<td align="right">Biaya Meterai :</td>
		<td><input style="text-align:right" name="meterai" type="text" id="meterai" maxlength="15" value="<?php echo formatrp($meterai); ?>"/></td>
	</tr>
	<tr>
		<td align="right">Jumlah Grace Period :</td>
		<td><input style="text-align:right" name="jum_period" type="text" id="jumperiod" maxlength="15" value="<?php echo formatrp($jum_period); ?>"/></td>
		<td align="right">Angsuran Pertama :</td>
		<td><input style="text-align:right" name="xjumangsur" type="text" id="xjumangsur" maxlength="15" value="<?php echo formatrp($xjumangsur); ?>"/></td>
	</tr>
	<tr>
		<td align="right">Refund Asuransi :</td>
		<td><input style="text-align:right" name="jumrefund" type="text" id="jumrefund" maxlength="15" value="<?php echo formatrp($jumrefund); ?>"/></td>
		<td align="right"><strong>JUMLAH POTONGAN :</strong></td>
		<td><input style="text-align:right;background-color: #6dc0be;" name="jumpotong" type="text" id="jumpotong" value="<?php echo formatrp($jumbiaya); ?>" readonly/></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
		<td align="right"><strong>JUMLAH DITERIMA :</strong></td>
		<td><input style="text-align:right;background-color: #6dc0be;" name="jumbersih" type="text" id="jumbersih" value="<?php echo formatrp($jumbersih); ?>" readonly/></td>
	</tr>
	<tr><th colspan="4" class="ui-state-highlight">SISA GAJI : <?php echo formatrp($gaji-$jumangsur).' [ IIR '.number_format((($jumangsur/$gaji)*100),2).' % ]'; ?></th></tr>
</table> <?php $norek=$result->c_d($_POST['norek']);$branch=$kcabang;$nonas=$result->c_d($_POST['nonas']);$sufix=$result->c_d($_POST['sufix']); echo '
<div id="myDiv">
<table width="100%" style="font-size: 9pt">
	<thead >
		<tr><th colspan="8">JADWAL ANGSURAN</th></tr>
		<tr>
			<th class="ui-widget-header">KETERANGAN</th>
			<th class="ui-widget-header">ANG. KE</th>
			<th class="ui-widget-header">TANGGAL</th>
			<th class="ui-widget-header">POKOK</th>
			<th class="ui-widget-header">BUNGA</th>
			<th class="ui-widget-header">ADM</th>
			<th class="ui-widget-header">JUMLAH</th>
			<th class="ui-widget-header">SALDO</th>
		</tr>
	</thead>
	<tbody>';
	$result->res("DELETE FROM tes_payment");$text ="INSERT INTO tes_payment(branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdkop,kdaktif,tanggal,kd_tagih) VALUES";$kete='Jadwal Tagihan Angsuran';$kets='Pembayaran Tagihan Angsuran';$no=0;$x=1;$xy=0;$mtgtran=$tgtran;$ypokok=$pokok;$xnomi=$nomi;$akum_pot=$jum_kdangsur+$jumlah_period;if($produk=='KMP'){$jangka=$jangka+$jumlah_period;}for($i=1;$i<=$jangka;$i++){if($kdkop==1){$dy=date('d',strtotime($mtgtran));$bl=date('m',strtotime($mtgtran));$th=date('Y',strtotime($mtgtran));$date=new DateTime();$date->setDate($th,$bl,$dy);addMonths($date,$x);$mtgtran=$date->format('Y-m-d');$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));}elseif($kdkop==2){$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));$hari=date('w',strtotime($mtgtran));if($hari==0){$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));}$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));}else{$mtgtran=date('Y-m-d',strtotime($mtgtran."+7 day"));$hari=date('w',strtotime($mtgtran));if($hari==0){$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));}$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));}$xy++;
	if($produk!='KMP'){
		$no++;
		if($pokok>$nomi){$pokok=$nomi;$yypokok=$ypokok-$pokok;if($yypokok>0){$bunga=$bunga+$yypokok;}}$nomi=$nomi-$pokok;$jumangsur=$pokok+$bunga+$madm;
	}else{
		if($xy<=$jumlah_period){
			$no=0;
			$nomi=$xnomi;
		}else{
			$no++;
			if($pokok>$nomi){$pokok=$nomi;$yypokok=$ypokok-$pokok;if($yypokok>0){$bunga=$bunga+$yypokok;}}$nomi=$nomi-$pokok;$jumangsur=$pokok+$bunga+$madm;
		}
	}
	if($no % 2){$clsname="even";}else{$clsname="odd";}
	if($produk!='KMP'){
		if($kdangsur==0){
			if($no<=$jum_kdangsur){ echo '
				<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td align="left">'.$kete.'</td>
					<td align="center">'.$no.'</td>
					<td align="left">'.$mtgtran.'</td>
					<td align="right">'.formatRupiah($pokok).'</td>
					<td align="right">'.formatRupiah($bunga).'</td>
					<td align="right">'.formatRupiah($madm).'</td>
					<td align="right">'.formatRupiah($jumangsur).'</td>
					<td align="right">'.formatRupiah($nomi).'</td>
				</tr>';
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',1),";echo '
				<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td align="left">'.$kets.'</td>
					<td align="center">'.$no.'</td>
					<td align="left">'.$t.'</td>
					<td align="right">'.formatRupiah($pokok).'</td>
					<td align="right">'.formatRupiah($bunga).'</td>
					<td align="right">'.formatRupiah($madm).'</td>
					<td align="right">'.formatRupiah($jumangsur).'</td>
					<td align="right">'.formatRupiah($nomi).'</td>
				</tr>';
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$t."',777,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',0),";
			}else{ echo '
				<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td align="left">'.$kete.'</td>
					<td align="center">'.$no.'</td>
					<td align="left">'.$mtgtran.'</td>
					<td align="right">'.formatRupiah($pokok).'</td>
					<td align="right">'.formatRupiah($bunga).'</td>
					<td align="right">'.formatRupiah($madm).'</td>
					<td align="right">'.formatRupiah($jumangsur).'</td>
					<td align="right">'.formatRupiah($nomi).'</td>
				</tr>';
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
			}
		}else{ echo '
			<tr class="'; if(isset($clsname)) echo $clsname.'">
				<td align="left">'.$kete.'</td>
				<td align="center">'.$no.'</td>
				<td align="left">'.$mtgtran.'</td>
				<td align="right">'.formatRupiah($pokok).'</td>
				<td align="right">'.formatRupiah($bunga).'</td>
				<td align="right">'.formatRupiah($madm).'</td>
				<td align="right">'.formatRupiah($jumangsur).'</td>
				<td align="right">'.formatRupiah($nomi).'</td>
			</tr>';
			$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
		}
	}else{
		if($kdangsur==0){
			if($xy<=$jumlah_period){ echo '
				<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td align="left">'.$kete.'</td>
					<td align="center">'.$no.'</td>
					<td align="left">'.$mtgtran.'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah($nomi).'</td>
				</tr>';				
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."',0,0,0,0,'".$mtgtran."',777,0,'".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',1),";				
			}else{
				if($xy<=$akum_pot){ echo '
					<tr class="'; if(isset($clsname)) echo $clsname.'">
						<td align="left">'.$kete.'</td>
						<td align="center">'.$no.'</td>
						<td align="left">'.$mtgtran.'</td>
						<td align="right">'.formatRupiah($pokok).'</td>
						<td align="right">'.formatRupiah($bunga).'</td>
						<td align="right">'.formatRupiah($madm).'</td>
						<td align="right">'.formatRupiah($jumangsur).'</td>
						<td align="right">'.formatRupiah($nomi).'</td>
					</tr>';
					$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',1),"; echo '
					<tr class="'; if(isset($clsname)) echo $clsname.'">
						<td align="left">'.$kets.'</td>
						<td align="center">'.$no.'</td>
						<td align="left">'.$t.'</td>
						<td align="right">'.formatRupiah($pokok).'</td>
						<td align="right">'.formatRupiah($bunga).'</td>
						<td align="right">'.formatRupiah($madm).'</td>
						<td align="right">'.formatRupiah($jumangsur).'</td>
						<td align="right">'.formatRupiah($nomi).'</td>
					</tr>';
					$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$t."',777,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',0),";
				}else{ echo '
					<tr class="'; if(isset($clsname)) echo $clsname.'">
						<td align="left">'.$kete.'</td>
						<td align="center">'.$no.'</td>
						<td align="left">'.$mtgtran.'</td>
						<td align="right">'.formatRupiah($pokok).'</td>
						<td align="right">'.formatRupiah($bunga).'</td>
						<td align="right">'.formatRupiah($madm).'</td>
						<td align="right">'.formatRupiah($jumangsur).'</td>
						<td align="right">'.formatRupiah($nomi).'</td>
					</tr>';
					$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
				}
			}
		}else{
			if($xy<=$jumlah_period){ echo '
				<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td align="left">'.$kets.'</td>
					<td align="center">'.$no.'</td>
					<td align="left">'.$mtgtran.'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah(0).'</td>
					<td align="right">'.formatRupiah($nomi).'</td>
				</tr>';
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."',0,0,0,0,'".$mtgtran."',777,0,'".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',1),";
			}else{ echo '
				<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td align="left">'.$kete.'</td>
					<td align="center">'.$no.'</td>
					<td align="left">'.$mtgtran.'</td>
					<td align="right">'.formatRupiah($pokok).'</td>
					<td align="right">'.formatRupiah($bunga).'</td>
					<td align="right">'.formatRupiah($madm).'</td>
					<td align="right">'.formatRupiah($jumangsur).'</td>
					<td align="right">'.formatRupiah($nomi).'</td>
				</tr>';
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
			}
		}
	}
} 
$text=substr_replace($text,'',-1);
$result->multi_y($text);
echo '
	</tbody>
</table>
</div>'; ?>