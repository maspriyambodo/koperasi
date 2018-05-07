<?php 
include 'h_tetap.php';include 'lib/ftanggal.php';
$result->buatTabel($temPayment,'payment');
$nonas=$result->c_d($_POST['nonas']);
$branch=$result->c_d($_POST['branch']);
$sufix=$result->c_d($_POST['sufix']);
$produk=$result->c_d($_POST['produk']);
$norek=$result->c_d($_POST['norek']);
$hasil=$result->query_y1("SELECT id,norek FROM $tabelKredit WHERE nonas='$nonas' AND kdaktif=0 LIMIT 1");
if($result->num($hasil)!=0)die("Sudah Ada Pinjaman Yang Belum Di Otorisasi");
$hasil=$result->query_y1("SELECT hbunga,bdenda,bpremi,htagih,flunas FROM debit1 WHERE kdproduk='$produk' LIMIT 1");
if($result->num($hasil)==0)die('Produk Pinjaman Kredit Tidak Terdaftar !');
$row=$result->row($hasil);$hbunga=$row['hbunga'];$tbunga=$row['bdenda'];
$premi=$row['bpremi'];$kdkop=$row['htagih'];
$flunas=$row['flunas'];$id=$result->c_d($_POST['id']);
$nama=$result->c_d($_POST['nama']);
$nomi=$result->c_d(keangka($_POST['nomi']));
$jangka=$result->c_d($_POST['jangka']);
$notran=$result->c_d($_POST['notran']);
$norekp=$result->c_d($_POST['norekp']);
$norekw=$result->c_d($_POST['norekw']);
$suku=$result->c_d($_POST['suku']);
$kdpin=$result->c_d($_POST['kdpin']);
$kdangsur=$result->c_d($_POST['kdangsur']);
$pot_angsuran=$result->c_d(keangka($_POST['pot_angsuran']));
$jum_kdangsur=$result->c_d(keangka($_POST['jum_kdangsur']));
$kode_premi=$result->c_d($_POST['kdpremi']);
$jumlah_period=$result->c_d($_POST['jumlah_period']);
$jum_period=keangka($result->c_d($_POST['jum_period']));
$pokok=$result->c_d(keangka($_POST['pokok']));
$bunga=$result->c_d(keangka($_POST['bunga']));
$madm=$result->c_d(keangka($_POST['madm']));
$kkbayar=$result->c_d($_POST['kkbayar']);
$simpanan_pokok=$result->c_d(keangka($_POST['simpanan_pokok']));
$simpanan_wajib=$result->c_d(keangka($_POST['simpanan_wajib']));$kode_buka=0;
if($simpanan_pokok>0){
	$spproduk='TSP';
	$hasil=$result->res("SELECT norek FROM $tabel_tabungan WHERE norek='$norekp' LIMIT 1");
	if($result->num($hasil)<1){
		$hasil=$result->res("SELECT id,gssl FROM $tabel_produkt WHERE kdproduk='$spproduk' LIMIT 1");
		if($result->num($hasil)<1) die('Jenis Produk Simpanan Pokok Tidak Di Temukan!');
		$row=$result->row($hasil);$no_produk=$row['id'];$no_produk=substr("00".$no_produk,-2);
		$hasil=$result->res("SELECT MAX(sufix) AS sufix FROM $tabel_tabungan WHERE nonas='$nonas'");
		$row=$result->row($hasil);$spsufix=$row['sufix'];
		if($spsufix==''){
			$spsufix=100;
		}else{
			$spsufix++;
		}
		$hasil=$result->res("SELECT SUBSTR(MAX(norek),-6) AS norek FROM $tabel_tabungan WHERE branch='$branch'");
		$row=$result->row($hasil);
		$norekp=$row['norek'];
		if($row['norek']==''){
			$norekp=1;$norekp=substr("0000000".$norekp,-7);
			$norekp=$branch.$no_produk.$norekp;
		}else{
			$norekp++;$norekp=substr("0000000".$norekp,-7);
			$norekp=$branch.$no_produk.$norekp;
		}
		$result->query_y1("INSERT INTO $tabel_tabungan(branch,nonas,sufix,norek,tgbuka,produk,user_input,tgl_input,user_update,tgl_update,bussdate,buka_rekening)VALUES('$branch','$nonas','$spsufix','$norekp','$t','$spproduk','$userid',now(),'$userid',now(),now(),'$kode_buka')");
		
	}
}
if($simpanan_wajib>0){
	$swproduk='TSW';
	$hasil=$result->res("SELECT norek FROM $tabel_tabungan WHERE norek='$norekw' LIMIT 1");
	if($result->num($hasil)<1){
		$hasil=$result->res("SELECT id,gssl FROM $tabel_produkt WHERE kdproduk='$swproduk' LIMIT 1");
		if($result->num($hasil)<1) die('Jenis Produk Simpanan Wajib Tidak Di Temukan!');
		$row=$result->row($hasil);$no_produk=$row['id'];$no_produk=substr("00".$no_produk,-2);
		$hasil=$result->res("SELECT MAX(sufix) AS sufix FROM $tabel_tabungan WHERE nonas='$nonas'");
		$row=$result->row($hasil);$swsufix=$row['sufix'];
		if($swsufix==''){
			$swsufix=100;
		}else{
			$swsufix++;
		}
		$hasil=$result->query_y1("SELECT SUBSTR(MAX(norek),-6) AS norek FROM $tabel_tabungan WHERE branch='$branch'");
		$row=$result->row($hasil);
		$norekw=$row['norek'];
		if($row['norek']==''){
			$norekw=1;$norekw=substr("0000000".$norekw,-7);
			$norekw=$branch.$no_produk.$norekw;
		}else{
			$norekw++;$norekw=substr("0000000".$norekw,-7);
			$norekw=$branch.$no_produk.$norekw;
		}
		$result->query_y1("INSERT INTO $tabel_tabungan(branch,nonas,sufix,norek,tgbuka,produk,user_input,tgl_input,user_update,tgl_update,bussdate,buka_rekening)VALUES('$branch','$nonas','$swsufix','$norekw','$t','$swproduk','$userid',now(),'$userid',now(),now(),'$kode_buka')");
		
	}
}
$hasil=$result->res("SELECT nmkb FROM $tabel_kkb WHERE kd='$kkbayar' LIMIT 1");
if($result->num($hasil)==0)die('Kantor Bayar Belum Terdaftar !');
$row= $result->row($hasil);
$nmbayar=$row['nmkb'];
$result->query_y1("DELETE FROM $temPayment WHERE norek='$norek'");
if($pot_angsuran>0 && $jum_kdangsur>0){
	$jum_pokok=$pokok*$jum_kdangsur;
}else{
	$jum_pokok=0;
}
if($kode_premi!=9){
	$no_premi= $kdpin.$produk.$kode_premi.'-'.$notran;
}else{
	$no_premi='NULL';
}
$text ="UPDATE $tabelKredit SET noreks='".$result->c_d($_POST['noreks'])."',
nocitra='".$result->c_d($_POST['nocitra'])."',
norekp='$norekp',norekw='$norekw',
noktp='".$result->c_d($_POST['noktp'])."',
pekerjaan='".$result->c_d($_POST['pekerjaan'])."',
tglahir='".date_sql($result->c_d($_POST['tglahir']))."',
nopen='".$result->c_d($_POST['nopen'])."',
nmwaris='".$result->c_d($_POST['nmwaris'])."',
tglahirw='".date_sql($result->c_d($_POST['tglahirw']))."',
jenis='".$result->c_d($_POST['jenis'])."',
jenis1='".$result->c_d($_POST['jenis1'])."',
kdjiwa='".$result->c_d($_POST['kdjiwa'])."',
nokarip='".$result->c_d($_POST['nokarip'])."',
nodapem='".$result->c_d($_POST['nodapem'])."',
gaji='".$result->c_d(keangka($_POST['gaji']))."',
deb1='".$result->c_d($_POST['deb1'])."',
kdskep='".$result->c_d($_POST['kdskep'])."',
kdgol='".$result->c_d($_POST['kdgol'])."',
kdguna='".$result->c_d($_POST['kdguna'])."',
kdsektor='".$result->c_d($_POST['kdsektor'])."',
kdjamin='".$result->c_d($_POST['kdjamin'])."',
jkredit='".$result->c_d($_POST['kdgol'])."',
skredit='".$result->c_d($_POST['kdgol'])."',
self1='".$result->c_d(keangka($_POST['gaji']))."',self2='".$result->c_d(keangka($_POST['self2']))."',self3='".$result->c_d(keangka($_POST['self3']))."',pbank='".$result->c_d(keangka($_POST['pbank']))."',plain='".$result->c_d(keangka($_POST['plain']))."',umur='".$result->c_d($_POST['umur'])."',arekom='".$result->c_d($_POST['arekom'])."',nrekom='".$result->c_d($_POST['nrekom'])."',trekom='".$result->c_d($_POST['trekom'])."',lrekom='".$result->c_d($_POST['lrekom'])."',krekom='".$result->c_d($_POST['krekom'])."',brekom='".$result->c_d($_POST['brekom'])."',nktprekom='".$result->c_d($_POST['nktprekom'])."',simpokok='".$result->c_d(keangka($_POST['simpanan_pokok']))."',simwajib='".$result->c_d(keangka($_POST['simpanan_wajib']))."',kdbyr='".$result->c_d($_POST['kdbyr'])."',kkbayar='$kkbayar',nmbayar='$nmbayar',kdkop='$kdkop',produk='$produk',hitbunga='$hbunga',tbunga='$tbunga',nosk='".$result->c_d($_POST['nosk'])."',pensk='".$result->c_d($_POST['pensk'])."',tgsk='".date_sql($result->c_d($_POST['tgsk']))."',agunan1='".$result->c_d($_POST['agunan1'])."',agunan2='".$result->c_d($_POST['agunan2'])."',agunan3='".$result->c_d($_POST['agunan3'])."',agunan4='".$result->c_d($_POST['agunan4'])."',
agunan5='".$result->c_d($_POST['agunan5'])."',
agunan6='".$result->c_d($_POST['agunan6'])."',
instansi_pensiun='".$result->c_d($_POST['instansi_pensiun'])."',
pengelola_pensiun='".$result->c_d($_POST['pengelola_pensiun'])."',
no_aso_bank='".$result->c_d($_POST['no_aso_bank'])."',
no_cif_bank='".$result->c_d($_POST['no_cif_bank'])."',
bank_transfer='".$result->c_d($_POST['bank_transfer'])."',
nama_transfer='".$result->c_d($_POST['nama_transfer'])."',
rekening_transfer='".$result->c_d($_POST['rekening_transfer'])."',
mitra_cheking='".$result->c_d($_POST['mitra_cheking'])."',
tanggal_transfer='".date_sql($result->c_d($_POST['tanggal_transfer']))."',
nama_pendamping='".$result->c_d($_POST['nama_pendamping'])."',
alamat_pendamping='".$result->c_d($_POST['alamat_pendamping'])."',
lurah_pendamping='".$result->c_d($_POST['lurah_pendamping'])."',
camat_pendamping='".$result->c_d($_POST['camat_pendamping'])."',
tlp_pendamping='".$result->c_d($_POST['tlp_pendamping'])."',
ktp_pendamping='".$result->c_d($_POST['ktp_pendamping'])."',
tgstnk='".date_sql($result->c_d($_POST['tgstnk']))."',
tgpjk='".date_sql($result->c_d($_POST['tgstnk']))."',
kdsales='".$result->c_d($_POST['kdsales'])."',
pokok='$pokok',bunga='$bunga',administrasi='$madm',
premi='".$result->c_d($_POST['tenor_premi'])."',nomi='$nomi',
meterai='".$result->c_d(keangka($_POST['meterai']))."',
jumpremi='".$result->c_d(keangka($_POST['jumpremi']))."',
jumrefund='".$result->c_d(keangka($_POST['jumrefund']))."',
jumprovisi='".$result->c_d(keangka($_POST['jumprovisi']))."',
jumadm='".$result->c_d(keangka($_POST['jumadm']))."',
jumbtl='".$result->c_d(keangka($_POST['jumbtl']))."',
jangka='$jangka',suku='$suku',mutdeb=0,mutkre=0,memdeb='$nomi',memkre='$jum_pokok',saldoa='$nomi'-'$jum_pokok',
plunas='".$result->c_d(keangka($_POST['saldoa']))."',
blunas='".$result->c_d(keangka($_POST['blunas']))."',
alunas='".$result->c_d(keangka($_POST['alunas']))."',
dbunga='".$result->c_d(keangka($_POST['bungakk']))."',
user_input='$userid',bussdate=now(),
nmsid='".$result->c_d($_POST['nmsid'])."',
ketnas=0,flunas='$flunas',kdaktif=0,kdangsur='$kdangsur',
tgbatas='".$result->c_d($_POST['tgbatas'])."',
pot_angsuran='$pot_angsuran',pot_angsuranke='$jum_kdangsur',kdpremi='$kode_premi',nopremi='$no_premi',
kode_cair='".$result->c_d($_POST['kode_cair'])."',jumlah_period='$jumlah_period',jum_period='$jum_period' WHERE id='$id' LIMIT 1;";
$text .= "INSERT INTO $temPayment(branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdkop,kdaktif,tanggal,kd_tagih) VALUES";
$no=0;$x=1;$xy=0;$mtgtran=$t;$ypokok=$pokok;$xnomi=$nomi;
$akum_pot=$jum_kdangsur+$jumlah_period;
if($produk=='KMP'){
	$jangka=$jangka+$jumlah_period;
}
for($i=1;$i<=$jangka;$i++){
	if($kdkop==1){
		$dy=date('d',strtotime($mtgtran));
		$bl=date('m',strtotime($mtgtran));
		$th=date('Y',strtotime($mtgtran));
		$date=new DateTime();
		$date->setDate($th,$bl,$dy);
		addMonths($date,$x);
		$mtgtran=$date->format('Y-m-d');
		$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));
	}elseif($kdkop==2){
		$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));
		$hari=date('w',strtotime($mtgtran));
		if($hari==0){
			$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));
		}
		$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));
	}else{
		$mtgtran=date('Y-m-d',strtotime($mtgtran."+7 day"));
		$hari=date('w',strtotime($mtgtran));
		if($hari==0){
			$mtgtran=date('Y-m-d',strtotime($mtgtran."+1 day"));
		}
		$bulan=date('Y',strtotime($mtgtran)).date('m',strtotime($mtgtran));
	}
	$xy++;
	if($produk!='KMP'){
		$no++;
		if($pokok>$nomi){
			$pokok=$nomi;$yypokok=$ypokok-$pokok;
			if($yypokok>0){
				$bunga=$bunga+$yypokok;
			}
		}
		$nomi=$nomi-$pokok;
		$jumangsur=$pokok+$bunga+$madm;
	}else{
		if($xy<=$jumlah_period){
			$no=0;
			$nomi=$xnomi;
		}else{
			$no++;
			if($pokok>$nomi){
				$pokok=$nomi;$yypokok=$ypokok-$pokok;
				if($yypokok>0){
					$bunga=$bunga+$yypokok;
				}
			}
			$nomi=$nomi-$pokok;
			$jumangsur=$pokok+$bunga+$madm;
		}
	}
	if($produk!='KMP'){
		if($kdangsur==0){
			if($no<=$jum_kdangsur){
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',1),";
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$t."',777,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',0),";
			}else{
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
			}
		}else{
			$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
		}
	}else{
		if($kdangsur==0){
			if($xy<=$jumlah_period){
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."',0,0,0,0,'".$mtgtran."',777,0,'".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',1),";				
			}else{
				if($xy<=$akum_pot){
					$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',1),";
					$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$t."',777,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',0),";
				}else{
					$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
				}
			}
		}else{
			if($xy<=$jumlah_period){
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."',0,0,0,0,'".$mtgtran."',777,0,'".$bulan."','".$userid."',now(),'".$kdkop."',30,'".$mtgtran."',1),";
			}else{
				$text .="('".$branch."','".$norek."','".$sufix."','".$nonas."','".$nama."','".$produk."','".$pokok."','".$bunga."','".$madm."','".$jumangsur."','".$mtgtran."',111,'".$no."','".$bulan."','".$userid."',now(),'".$kdkop."','','".$mtgtran."',0),";
			}
		}
	}	
}
$text=substr_replace($text,';',-1);
$text =substr_replace($text,';',-1);
$text .="UPDATE $tabelKredit SET tgl_jatuh_tempo='$mtgtran' WHERE norek='$norek' LIMIT 1";
$result->multi_y($text);
$catat="Sukses Merubah Data Kredit Rekening : ".$norek;
echo $catat;$result->close();
include 'around.php';
?>