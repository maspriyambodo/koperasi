<?php include 'h_tetap.php';include 'Lib/ftanggal.php';$result->buatTabel($temPayment,'payment');$nonas = $result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$sufix=$result->c_d($_POST['sufix']);if(empty($sufix) || $sufix==''){$sufix=300;}else{$hasil=$result->query_y1("SELECT sufix FROM $tabel_kredit WHERE nonas='$nonas'");$count=$result->num($hasil);$sufixx=$count;$sufixx=substr('00'.$sufixx,-2);$sufix='3'.$sufixx;}$hasil=$result->query_y1("SELECT id,norek FROM $tabelKredit WHERE nonas='$nonas' AND kdaktif=0 LIMIT 1");if($result->num($hasil)!=0)die("Sudah Ada Pinjaman Yang Belum Di Otorisasi");$hasil=$result->query_y1("SELECT norek FROM $tabelKredit WHERE branch='$branch'");$count=$result->num($hasil);$notran=$count;$notran++;$d=date('d',strtotime($t));$b=date('m',strtotime($t));$y=date('Y',strtotime($t));$r=substr("000"."".$notran,-3);$norek =$branch.$d.$b.substr($y,-2).$r;$notran=$d.$b.substr($y,-2).'-'.$r;$produk = $result->c_d($_POST['produk']);$hasil=$result->query_y1("SELECT hbunga,bdenda,bpremi,htagih,flunas FROM $tabel_produk WHERE kdproduk='$produk' LIMIT 1");if($result->num($hasil)==0)die('Produk Pinjaman Kredit Tidak Terdaftar !');$row=$result->row($hasil);$hbunga=$row['hbunga'];$tbunga=$row['bdenda'];$premi=$row['bpremi'];$kdkop=$row['htagih'];$flunas=$row['flunas'];$plunas=$result->c_d(keangka($_POST['saldoa']));$blunas=$result->c_d(keangka($_POST['blunas']));$alunas=$result->c_d(keangka($_POST['alunas']));$dbunga=$result->c_d(keangka($_POST['bungakk']));$id=$result->c_d($_POST['id']);$nama=$result->c_d($_POST['nama']);$kode_cair=$result->c_d($_POST['kode_cair']);$nomi=$result->c_d(keangka($_POST['nomi']));$jangka=$result->c_d($_POST['jangka']);$suku=$result->c_d($_POST['suku']);$kdpin=$result->c_d($_POST['kdpin']);$kdbyr=$result->c_d($_POST['kdbyr']);$pokok=$result->c_d(keangka($_POST['pokok']));$bunga=$result->c_d(keangka($_POST['bunga']));$madm=$result->c_d(keangka($_POST['madm']));$kdangsur=$result->c_d($_POST['kdangsur']);$pot_angsuran=$result->c_d(keangka($_POST['pot_angsuran']));$jum_kdangsur=$result->c_d(keangka($_POST['jum_kdangsur']));$kkbayar=$result->c_d($_POST['kkbayar']);$jumlah_period=$result->c_d($_POST['jumlah_period']);$jum_period=keangka($result->c_d($_POST['jum_period']));$simpanan_pokok=$result->c_d($_POST['simpanan_pokok']);$simpanan_wajib=$result->c_d($_POST['simpanan_wajib']);$jumlah_simpanan=$simpanan_pokok+$simpanan_wajib;$nmbayar="";$hasil=$result->query_y1("SELECT nmkb FROM kkb WHERE kd='$kkbayar' LIMIT 1");if($result->num($hasil)==0)die('Kantor Bayar Belum Terdaftar !');$row= $result->row($hasil);$nmbayar=$row['nmkb'];if($pot_angsuran>0 && $jum_kdangsur>0){	$jum_pokok=$pokok*$jum_kdangsur;}else{$jum_pokok=0;}$kode_premi=$result->c_d($_POST['kdpremi']);$tenor_premi=$result->c_d($_POST['tenor_premi']);if($kode_premi!=9){$no_premi= $kdpin.$produk.$kode_premi.'-'.$notran;}else{$no_premi='NULL';}$kode_buka=0;$kode_pajak=1;$spnorek='';$swnorek='';if($simpanan_pokok>0){$spproduk='TSP';$hasil=$result->res("SELECT id,gssl FROM $tabel_produkt WHERE kdproduk='$spproduk' LIMIT 1");if($result->num($hasil)<1) die('Jenis Produk Simpanan Pokok Tidak Di Temukan!');$row=$result->row($hasil);$no_produk=$row['id'];$no_produk=substr("00".$no_produk,-2);$hasil=$result->res("SELECT norek FROM $tabel_tabungan WHERE nonas='$nonas' AND produk='$spproduk' LIMIT 1");if($result->num($hasil)>1){$row=$result->row($hasil);$spnorek=$row['norek'];}else{$hasil=$result->res("SELECT MAX(sufix) AS sufix FROM $tabel_tabungan WHERE nonas='$nonas'");$row=$result->row($hasil);$spsufix=$row['sufix'];if($spsufix==''){$spsufix=100;}else{$spsufix++;}$hasil=$result->res("SELECT SUBSTR(MAX(norek),-6) AS norek FROM $tabel_tabungan WHERE branch='$branch'");$row=$result->row($hasil);$spnorek=$row['norek'];if($row['norek']==''){$spnorek=1;$spnorek=substr("0000000".$spnorek,-7);$spnorek=$branch.$no_produk.$spnorek;}else{$spnorek++;$spnorek=substr("0000000".$spnorek,-7);$spnorek=$branch.$no_produk.$spnorek;}$result->query_y1("INSERT INTO $tabel_tabungan(branch,nonas,sufix,norek,tgbuka,produk,user_input,tgl_input,user_update,tgl_update,bussdate,buka_rekening)VALUES('$branch','$nonas','$spsufix','$spnorek','$t','$spproduk','$userid',now(),'$userid',now(),now(),'$kode_buka')");}}if($simpanan_wajib>0){$swproduk='TSW';$hasil=$result->res("SELECT id,gssl FROM $tabel_produkt WHERE kdproduk='$swproduk' LIMIT 1");if($result->num($hasil)<1) die('Jenis Produk Simpanan Wajib Tidak Di Temukan!');$row=$result->row($hasil);$no_produk=$row['id'];$no_produk=substr("00".$no_produk,-2);$hasil=$result->res("SELECT norek FROM $tabel_tabungan WHERE nonas='$nonas' AND produk='$swproduk' LIMIT 1");if($result->num($hasil)>1){$row=$result->row($hasil);$swnorek=$row['norek'];}else{$hasil=$result->res("SELECT MAX(sufix) AS sufix FROM $tabel_tabungan WHERE nonas='$nonas'");$row=$result->row($hasil);$swsufix=$row['sufix'];if($swsufix==''){$swsufix=100;}else{$swsufix++;}$hasil=$result->res("SELECT SUBSTR(MAX(norek),-6) AS norek FROM $tabel_tabungan WHERE branch='$branch'");$row=$result->row($hasil);$swnorek=$row['norek'];if($row['norek']==''){$swnorek=1;$swnorek=substr("0000000".$swnorek,-7);$swnorek=$branch.$no_produk.$swnorek;}else{$swnorek++;$swnorek=substr("0000000".$swnorek,-7);$swnorek=$branch.$no_produk.$swnorek;}$result->query_y1("INSERT INTO $tabel_tabungan(branch,nonas,sufix,norek,tgbuka,produk,user_input,tgl_input,user_update,tgl_update,bussdate,buka_rekening)VALUES('$branch','$nonas','$swsufix','$swnorek','$t','$swproduk','$userid',now(),'$userid',now(),now(),'$kode_buka')");}}$text ="INSERT INTO $tabelKredit(branch,nonas,noreks,norekp,norekw,nocitra,noktp,pekerjaan,tglahir,nopen,nmwaris,tglahirw,jenis,jenis1,kdjiwa,nokarip,nodapem,gaji,deb1,kdskep,kdgol,kdguna,kdsektor,kdjamin,jkredit,skredit,self1,self2,self3,pbank,plain,umur,arekom,nrekom,trekom,lrekom,krekom,brekom,nktprekom,simpokok,simwajib,sufix,norek,kdbyr,kkbayar,nmbayar,kdkop,produk,hitbunga,tbunga,nosk,pensk,tgsk,agunan1,agunan2,agunan3,agunan4,agunan5,agunan6,instansi_pensiun,pengelola_pensiun,no_aso_bank,no_cif_bank,bank_transfer,nama_transfer,rekening_transfer,mitra_cheking,tanggal_transfer,nama_pendamping,alamat_pendamping,lurah_pendamping,camat_pendamping,tlp_pendamping,ktp_pendamping,tgstnk,tgpjk,kdsales,pokok,bunga,administrasi,notran,tgtran,premi,nomi,meterai,jumpremi,jumrefund,jumprovisi,jumadm,jumbtl,jangka,suku,memdeb,memkre,saldoa,kolek,norekl,sufixl,plunas,blunas,alunas,dbunga,user_input,bussdate,kdpin,nmsid,ketnas,flunas,kdaktif,produkl,kdangsur,angsurke,tgbatas,pot_angsuran,pot_angsuranke,kdpremi,nopremi,kode_cair,jumlah_period,jum_period) VALUES('$branch','$nonas','".$result->c_d($_POST['noreks'])."','$spnorek','$swnorek','".$result->c_d($_POST['nocitra'])."','".$result->c_d($_POST['noktp'])."','".$result->c_d($_POST['pekerjaan'])."','".date_sql($result->c_d($_POST['tglahir']))."','".$result->c_d($_POST['nopen'])."','".$result->c_d($_POST['nmwaris'])."','".date_sql($result->c_d($_POST['tglahirw']))."','".$result->c_d($_POST['jenis'])."','".$result->c_d($_POST['jenis1'])."','".$result->c_d($_POST['kdjiwa'])."','".$result->c_d($_POST['nokarip'])."','".$result->c_d($_POST['nodapem'])."','".$result->c_d(keangka($_POST['gaji']))."','".$result->c_d($_POST['deb1'])."','".$result->c_d($_POST['kdskep'])."','".$result->c_d($_POST['kdgol'])."','".$result->c_d($_POST['kdguna'])."','".$result->c_d($_POST['kdsektor'])."','".$result->c_d($_POST['kdjamin'])."','".$result->c_d($_POST['jkredit'])."','".$result->c_d($_POST['skredit'])."','".$result->c_d(keangka($_POST['self1']))."','".$result->c_d(keangka($_POST['self2']))."','".$result->c_d(keangka($_POST['self3']))."','".$result->c_d(keangka($_POST['pbank']))."','".$result->c_d(keangka($_POST['plain']))."','".$result->c_d(keangka($_POST['umur']))."','".$result->c_d($_POST['arekom'])."','".$result->c_d($_POST['nrekom'])."','".$result->c_d($_POST['trekom'])."','".$result->c_d($_POST['lrekom'])."','".$result->c_d($_POST['krekom'])."','".$result->c_d($_POST['brekom'])."','".$result->c_d($_POST['nktprekom'])."','".$result->c_d(keangka($_POST['simpanan_pokok']))."','".$result->c_d(keangka($_POST['simpanan_wajib']))."','$sufix','$norek','$kdbyr','$kkbayar','$nmbayar','$kdkop','$produk','$hbunga','$tbunga','".$result->c_d($_POST['nosk'])."','".$result->c_d($_POST['pensk'])."','".date_sql($result->c_d($_POST['tgsk']))."','".$result->c_d($_POST['agunan1'])."','".$result->c_d($_POST['agunan2'])."','".$result->c_d($_POST['agunan3'])."','".$result->c_d($_POST['agunan4'])."','".$result->c_d($_POST['agunan5'])."','".$result->c_d($_POST['agunan6'])."','".$result->c_d($_POST['instansi_pensiun'])."','".$result->c_d($_POST['pengelola_pensiun'])."','".$result->c_d($_POST['no_aso_bank'])."','".$result->c_d($_POST['no_cif_bank'])."','".$result->c_d($_POST['bank_transfer'])."','".$result->c_d($_POST['nama_transfer'])."','".$result->c_d($_POST['rekening_transfer'])."','".$result->c_d($_POST['mitra_cheking'])."','".date_sql($result->c_d($_POST['tanggal_transfer']))."','".$result->c_d($_POST['nama_pendamping'])."','".$result->c_d($_POST['alamat_pendamping'])."','".$result->c_d($_POST['lurah_pendamping'])."','".$result->c_d($_POST['camat_pendamping'])."','".$result->c_d($_POST['tlp_pendamping'])."','".$result->c_d($_POST['ktp_pendamping'])."','".date_sql($result->c_d($_POST['tgstnk']))."','".date_sql($result->c_d($_POST['tgpjk']))."','".$result->c_d($_POST['kdsales'])."','$pokok','$bunga','$madm','$notran','$t','$tenor_premi','$nomi','".$result->c_d(keangka($_POST['meterai']))."','".$result->c_d(keangka($_POST['jumpremi']))."','".$result->c_d(keangka($_POST['jumrefund']))."','".$result->c_d(keangka($_POST['jumprovisi']))."','".$result->c_d(keangka($_POST['jumadm']))."','".$result->c_d(keangka($_POST['jumbtl']))."','$jangka','$suku','$nomi','$jum_pokok','$nomi'-'$jum_pokok',1,'".$result->c_d($_POST['norekl'])."','".$result->c_d($_POST['sufixl'])."','$plunas','$blunas','$alunas','$dbunga','$userid',now(),'$kdpin','".$result->c_d($_POST['nmsid'])."',0,'$flunas',0,'".$result->c_d($_POST['produkl'])."','$kdangsur',0,'".$result->c_d($_POST['tgbatas'])."','$pot_angsuran','$jum_kdangsur','$kode_premi','$no_premi','$kode_cair','$jumlah_period','$jum_period');";$text .="INSERT INTO $temPayment(branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdkop,kdaktif,tanggal,kd_tagih) VALUES";$no=0;$x=1;$xy=0;$mtgtran=$t;$ypokok=$pokok;$xnomi=$nomi;$akum_pot=$jum_kdangsur+$jumlah_period;if($produk=='KMP'){$jangka=$jangka+$jumlah_period;}for($i=1;$i<=$jangka;$i++){if($kdkop==1){$dy=date('d',strtotime($mtgtran));$bl=date('m',strtotime($mtgtran));$th=date('Y',strtotime($mtgtran));$date=new DateTime();$date->setDate($th,$bl,$dy);addMonths($date,$x);$mtgtran=$date->format('Y-m-d');$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));}elseif($kdkop==2){$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));$hari=date('w',strtotime($mtgtran));if($hari==0){$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));}$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));}else{$mtgtran=date('Y-m-d',strtotime($mtgtran."+7 day"));$hari=date('w',strtotime($mtgtran));if($hari==0){$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));}$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));}$xy++;if($produk!='KMP'){$no++;if($pokok>$nomi){$pokok=$nomi;$yypokok=$ypokok-$pokok;if($yypokok>0){$bunga=$bunga+$yypokok;}}$nomi=$nomi-$pokok;$jumangsur=$pokok+$bunga+$madm;}else{if($xy<=$jumlah_period){$no=0;$nomi=$xnomi;}else{$no++;if($pokok>$nomi){$pokok=$nomi;$yypokok=$ypokok-$pokok;if($yypokok>0){$bunga=$bunga+$yypokok;}}$nomi=$nomi-$pokok;$jumangsur=$pokok+$bunga+$madm;}}if($produk!='KMP'){if($kdangsur==0){if($no<=$jum_kdangsur){$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',1),";$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$t."',777,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',0),";}else{$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";}}else{$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";}}else{if($kdangsur==0){if($xy<=$jumlah_period){$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."',0,0,0,0,'".$mtgtran."',777,0,'".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',1),";}else{if($xy<=$akum_pot){$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',1),";$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$t."',777,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',0),";}else{$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";}}}else{if($xy<=$jumlah_period){$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."',0,0,0,0,'".$mtgtran."',777,0,'".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',1),";}else{$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";}}}}$text =substr_replace($text,';',-1);$text .="UPDATE $tabelKredit SET tgl_jatuh_tempo='$mtgtran' WHERE norek='$norek' LIMIT 1";$result->multi_y($text);$catat="Sukses Menambah Data Kredit Rekening : ".$norek;echo $catat;$result->close();include 'around.php'; ?>