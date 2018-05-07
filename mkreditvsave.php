<?php 
include 'h_tetap.php';
$id=$result->c_d($_GET['id']);
$result->buatTabel($tabelTransaksi,'tem_transaksi');
$hasil=$result->query_cari("SELECT a.branch,a.nonas,a.norek,a.norekw,a.norekp,a.produk,a.nomi,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.norekl,a.produkl,a.plunas,a.blunas,a.alunas,a.dbunga,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.tgbatas,a.pot_angsuran,a.pot_angsuranke,a.kode_cair,a.jumlah_period,a.jum_period,a.simpokok,a.simwajib,b.nama,c.spokok,c.sbunga,c.slunas,c.sdenda,c.sadm,c.sbtl,c.sprovisi,c.spremi,c.srefund,c.smeterai,c.glfinalti FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.id='$id' AND kdaktif=0 LIMIT 1");
$row=$result->row($hasil);
$branch=$row['branch'];
$nama=$row['nama'];
$norekl=$row['norekl'];
$norek=$row['norek'];
$nonas=$row['nonas'];
$bataske=$row['tgbatas'];
$tgtran=$row['tgtran'];
$xuser=$userid;
$notran=$result->no_transaksi(0);
$spokok=$branch.$row['spokok'].'360';
$sbunga=$branch.$row['sbunga'].'360';
$slunas=$branch.$row['slunas'].'360';
$sdenda=$branch.$row['sdenda'].'360';
$sadm=$branch.$row['sadm'].'360';
$sbtl=$branch.$row['sbtl'].'360';
$sprovisi=$branch.$row['sprovisi'].'360';
$spremi=$branch.$row['spremi'].'360';
$srefund=$branch.$row['srefund'].'360';
$smeterai=$branch.$row['smeterai'].'360';
$ada=FALSE;
$noreferensi=substr($notran,0,5);
$simpanan_pokok=$row['simpokok'];
$simpanan_wajib=$row['simwajib'];
$jumlah_simpanan=$simpanan_pokok+$simpanan_wajib;
$norekp=$row['norekp'];
$norekw=$row['norekw'];
If($row['nomi']>$limitk)die("Limit Otorisasi Anda Tidak Cukup...? ");
if($row['nomi']<100000)die('Nominal Pinjaman Kurang Dari 100 Ribu...!');
$jumangsur=$row['plunas']+$row['blunas']+$row['alunas'];
$jumlunas=$jumangsur+$row['dbunga']+$row['pot_angsuran'];
$biayakredit=$row['jumadm']+$row['jumbtl']+$row['jumprovisi']+$row['meterai']+$row['jumpremi']+$row['jum_period'];
$jum_terima=$row['nomi']+$row['jumrefund']-$jumlunas-$biayakredit-$jumlah_simpanan;
if($jum_terima<=100000)die('Jumlah Diterima Kurang Dari 100 Ribu...!');
if($row['kode_cair']==0){
	$nonass='102102';$gssl_cair=$branch.'102102360';$uang_mukax='103101';$uang_muka=$branch.'103101360';
}elseif($row['kode_cair']==1){
	$nonass='213206';$gssl_cair=$branch.'213206360';$uang_mukax='103101';$uang_muka=$branch.'103101360';
}else{
	$nonass='213206';$gssl_cair=$branch.'213206360';$uang_mukax='103101';$uang_muka=$branch.'103101360';$ada=TRUE;
}
$file='json/sandi.json';$json_file = file_get_contents($file);$jfo = json_decode($json_file,TRUE);$huruf = array($row['spokok'],$row['sbunga'],$row['slunas'],$row['sdenda'],$row['sadm'],$row['sbtl'],$row['sprovisi'],$row['spremi'],$row['srefund'],$row['smeterai'],$row['glfinalti'],$nonass,$uang_mukax);$y=0;
while($y<13){
	$deb1=$huruf[$y];
	for($i=0; $i<count($jfo); $i++){
		if($deb1==$jfo[$i]['nonas']){
			$namas[$y]=$jfo[$i]['nama'];
		}
	}
	$y++;
}
if($jumlah_simpanan>0){
	if($simpanan_pokok>0){
		$spproduk='TSP';
		$hasil=$result->res("SELECT gssl FROM $tabel_produkt WHERE kdproduk='$spproduk' LIMIT 1");
		if($result->num($hasil)<1) die('Jenis Produk Simpanan Pokok Tidak Di Temukan!');
		$roww=$result->row($hasil);$gssl_simpokok=$roww['gssl'];$gssl_simpokokk=$branch.$roww['gssl'].'360';
	}
	if($simpanan_wajib>0){
		$swproduk='TSW';
		$hasil=$result->res("SELECT gssl FROM $tabel_produkt WHERE kdproduk='$swproduk' LIMIT 1");
		if($result->num($hasil)<1) die('Jenis Produk Simpanan Wajib Tidak Di Temukan!');
		$roww=$result->row($hasil);$gssl_simwajib=$roww['gssl'];$gssl_simwajibb=$branch.$roww['gssl'].'360';
	}
}
$hasil=$result->query_y1("SELECT norek FROM $tabel_kredit WHERE norek='$norek' LIMIT 1");
if($result->num($hasil)==1){
	$result->query_y1("UPDATE $tabel_kredit a JOIN $tabelKredit b ON a.norek=b.norek SET a.nocitra=b.nocitra,a.noreks=b.noreks,a.norekp=b.norekp,a.norekw=b.norekw,a.nopen=b.nopen,a.noktp=b.noktp,a.tglahir=b.tglahir,a.pekerjaan=b.pekerjaan,a.umur=b.umur,a.nmwaris=b.nmwaris,a.tglahirw=b.tglahirw,a.jenis=b.jenis,a.jenis1=b.jenis1,a.kdjiwa=b.kdjiwa,a.nokarip=b.nokarip,a.nodapem=b.nodapem,a.kdbyr=b.kdbyr,a.kkbayar=b.kkbayar,a.nmbayar=b.nmbayar,a.kdkop=b.kdkop,a.produk=b.produk,a.deb1=b.deb1,a.notran=b.notran,a.tgtran=b.tgtran,a.nomi=b.nomi,a.saldo=b.saldo,a.mutdeb=b.mutdeb,a.mutkre=b.mutkre,a.memdeb=b.memdeb,a.memkre=b.memkre,a.saldoa=b.saldoa,a.jangka=b.jangka,a.suku=b.suku,a.meterai=b.meterai,a.anuitas=b.anuitas,a.hitbunga=b.hitbunga,a.tbunga=b.tbunga,a.flunas=b.flunas,a.premi=b.premi,a.jumpremi=b.jumpremi,a.jumrefund=b.jumrefund,a.jumprovisi=b.jumprovisi,a.jumadm=b.jumadm,a.jumbtl=b.jumbtl,a.tgbatas=b.tgbatas,a.kdpremi=b.kdpremi,a.nopremi=b.nopremi,a.kolek=b.kolek,a.ketkolek=b.ketkolek,a.ketnas=b.ketnas,a.kketnas=b.kketnas,a.kdskep=b.kdskep,a.nosk=b.nosk,a.pensk=b.pensk,a.tgsk=b.tgsk,a.tgpjk=b.tgpjk,a.tgstnk=b.tgstnk,a.agunan1=b.agunan1,a.agunan2=b.agunan2,a.agunan3=b.agunan3,a.agunan4=b.agunan4,a.agunan5=b.agunan5,a.agunan6=b.agunan6,a.instansi_pensiun=b.instansi_pensiun,a.pengelola_pensiun=b.pengelola_pensiun,a.no_aso_bank=b.no_aso_bank,a.no_cif_bank=b.no_cif_bank,a.bank_transfer=b.bank_transfer,a.nama_transfer=b.nama_transfer,a.rekening_transfer=b.rekening_transfer,a.mitra_cheking=b.mitra_cheking,a.tanggal_transfer=b.tanggal_transfer,a.tgl_jatuh_tempo=b.tgl_jatuh_tempo,a.nama_pendamping=b.nama_pendamping,a.alamat_pendamping=b.alamat_pendamping,a.lurah_pendamping=b.lurah_pendamping,a.camat_pendamping=b.camat_pendamping,a.tlp_pendamping=b.tlp_pendamping,a.ktp_pendamping=b.ktp_pendamping,
	a.kdjamin=b.kdjamin,a.gaji=b.gaji,a.self1=b.self1,a.self2=b.self2,a.self3=b.self3,a.pbank=b.pbank,a.plain=b.plain,a.kdsales=b.kdsales,a.pokok=b.pokok,a.bunga=b.bunga,a.administrasi=b.administrasi,a.angsurke=b.angsurke,a.arekom=b.arekom,a.nrekom=b.nrekom,a.trekom=b.trekom,a.lrekom=b.lrekom,a.krekom=b.krekom,a.brekom=b.brekom,a.nktprekom=b.nktprekom,a.tktprekom=b.tktprekom,a.simpokok=b.simpokok,a.simwajib=b.simwajib,a.norekl=b.norekl,a.sufixl=b.sufixl,a.produkl=b.produkl,a.plunas=b.plunas,a.blunas=b.blunas,a.alunas=b.alunas,a.dbunga=b.dbunga,a.nmsid=b.nmsid,a.kdpin=b.kdpin,a.kdaktif=b.kdaktif,a.user_input=b.user_input,a.bussdate=b.bussdate,a.kdangsur=b.kdangsur,a.user_otorisasi=b.user_otorisasi,a.noreklain=b.noreklain,a.pot_angsuran=b.pot_angsuran,a.pot_angsuranke=b.pot_angsuranke,a.kode_cair=b.kode_cair,a.jumlah_period=b.jumlah_period,a.jum_period=b.jum_period,a.tgl_otorisasi=b.tgl_otorisasi WHERE a.norek='$norek'");
}else{
	$result->query_y1("INSERT INTO $tabel_kredit SELECT '',branch,nonas,sufix,norek,nocitra,norekw,noreks,norekp,nopen,noktp,tglahir,pekerjaan,umur,nmwaris,tglahirw,jenis,jenis1,kdjiwa,nokarip,nodapem,kdbyr,kkbayar,nmbayar,kdkop,produk,deb1,notran,tgtran,nomi,saldo,mutdeb,mutkre,memdeb,memkre,saldoa,jangka,suku,meterai,anuitas,hitbunga,tbunga,flunas,premi,jumpremi,jumrefund,jumprovisi,jumadm,jumbtl,tgbatas,NULL,NULL,kdpremi,nopremi,kolek,ketkolek,ketnas,kketnas,kdskep,nosk,pensk,tgsk,tgpjk,tgstnk,agunan1,agunan2,agunan3,agunan4,agunan5,agunan6,instansi_pensiun,pengelola_pensiun,no_aso_bank,no_cif_bank,bank_transfer,nama_transfer,rekening_transfer,mitra_cheking,tanggal_transfer,tgl_jatuh_tempo,nama_pendamping,alamat_pendamping,lurah_pendamping,camat_pendamping,tlp_pendamping,ktp_pendamping,
	kdgol,kdjamin,kdsektor,jkredit,skredit,kdguna,gaji,self1,self2,self3,pbank,plain,kdsales,pokok,bunga,administrasi,angsurke,arekom,nrekom,trekom,lrekom,krekom,brekom,nktprekom,tktprekom,norekl,sufixl,produkl,plunas,blunas,alunas,dbunga,simpokok,simwajib,nmsid,kdpin,kdaktif,user_input,bussdate,kdangsur,user_otorisasi,noreklain,pot_angsuran,pot_angsuranke,jumlah_period,jum_period,kode_cair,0,0,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL FROM $tabelKredit WHERE id='$id' LIMIT 1");
}
$text = "INSERT INTO $tabelTransaksi(branch,nonas,sufix,norek,nama,norekgl,nokredit,jumlah,kdtran,jtransaksi,notransaksi,keterangan,produk,tanggal,oper,bussdate,otor,kdbranch,kdkredit,noreferensi) VALUES";
$desc="PINJAMAN KREDIT ".$nama.' - '.$norek;
$text .="('".$branch."','".$row['spokok']."',360,'".$norek."','".$namas[0]."','".$spokok."',NULL,'".$row['nomi']."',338,90,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
$desc="NET DITERIMA PINJAMAN KREDIT ".$nama.' - '.$norek;
$text .="('".$branch."','".$nonass."',360,'".$norek."','".$namas[11]."','".$gssl_cair."',NULL,'".$jum_terima."',438,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
if($ada==TRUE){
	$desc="DIBAYARKAN NET KREDIT UANG MUKA ".$nama.' - '.$norek;
	$text .="('".$branch."','".$nonass."',360,'".$norek."','".$namas[11]."','".$gssl_cair."',NULL,'".$jum_terima."',338,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	$desc="DIBAYARKAN NET KREDIT ".$nama.' - '.$norek;
	$text .="('".$branch."','".$uang_mukax."',360,'".$norek."','".$namas[12]."','".$uang_muka."',NULL,'".$jum_terima."',438,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}
if($jumlunas>0){
	if($row['plunas']>0){
		$desc="PELUNASAN POKOK PINJAMAN ".$nama.' - '.$norekl;
		$text .="('".$branch."','".$row['spokok']."',360,'".$norekl."','".$namas[0]."','".$spokok."',NULL,'".$row['plunas']."',438,53,'".$notran."','".$desc."','".$row['produkl']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
	}
	if($row['blunas']>0){
		$desc="PELUNASAN BUNGA PINJAMAN ".$nama.' - '.$norekl;
		$text .="('".$branch."','".$row['slunas']."',360,'".$norekl."','".$namas[2]."','".$slunas."',NULL,'".$row['blunas']."',439,53,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
	}
	if($row['alunas']>0){
		$desc="PELUNASAN ADM PINJAMAN ".$nama.' - '.$norekl;
		$text .="('".$branch."','".$row['sadm']."',360,'".$norekl."','".$namas[4]."','".$sadm."',NULL,'".$row['alunas']."',440,53,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
	}
	if($row['dbunga']>0){
		$desc="PELUNASAN DENDA PINJAMAN ".$nama.' - '.$norekl;
		$text .="('".$branch."','".$row['sdenda']."',360,'".$norekl."','".$namas[3]."','".$sdenda."',NULL,'".$row['dbunga']."',441,53,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',40,'".$noreferensi."'),";
	}
	if($row['pot_angsuran']>0 && $row['pot_angsuranke']>0){
		if($row['pokok']>0){
			$desc="SETORAN POKOK PINJAMAN ".$row['pot_angsuranke']." Kali ".$nama.' - '.$norek;
			$text .="('".$branch."','".$row['spokok']."',360,'".$norek."','".$namas[0]."','".$spokok."',NULL,'".$row['pokok']*$row['pot_angsuranke']."',438,32,'".$notran."','".$desc."','".$row['produk']."','".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',10,'".$noreferensi."'),";
		}
		if($row['bunga']>0){
			$desc="SETORAN BUNGA PINJAMAN".$row['pot_angsuranke']." Kali ".$nama.' - '.$norek; 
			$text .="('".$branch."','".$row['sbunga']."',360,'".$norek."','".$namas[1]."','".$sbunga."',NULL,'".$row['bunga']*$row['pot_angsuranke']."',439,32,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";
		}
		if($row['administrasi']>0){
			$desc="SETORAN ADM PINJAMAN ".$row['pot_angsuranke']." Kali ".$nama.' - '.$norek;
			$text .="('".$branch."','".$row['sadm']."',360,'".$norek."','".$namas[4]."','".$sadm."',NULL,'".$row['administrasi']*$row['pot_angsuranke']."',440,32,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',30,'".$noreferensi."'),";
		}
	}
}
if($biayakredit>0){
	if($row['jumadm']>0){
		$desc="BIAYA ADMINISTRASI PINJAMAN ".$nama.' - '.$norek;
		$text .="('".$branch."','".$row['sadm']."',360,'".$norek."','".$namas[4]."','".$sadm."',NULL,'".$row['jumadm']."',443,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
	if($row['jumbtl']>0){
		$desc="POTONGAN LAINNYA PINJAMAN ".$nama.' - '.$norek;
		$text .="('".$branch."','".$row['sbtl']."',360,'".$norek."','".$namas[5]."','".$sbtl."',NULL,'".$row['jumbtl']."',444,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
	if($row['jumprovisi']>0){
		$desc="BIAYA PROVISI PINJAMAN ".$nama.' - '.$norek;
		$text .="('".$branch."','".$row['sprovisi']."',360,'".$norek."','".$namas[6]."','".$sprovisi."',NULL,'".$row['jumprovisi']."',445,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
	if($row['meterai']>0){
		$desc="BIAYA METERAI PINJAMAN ".$nama.' - '.$norek;
		$text .="('".$branch."','".$row['smeterai']."',360,'".$norek."','".$namas[9]."','".$smeterai."',NULL,'".$row['meterai']."',448,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
	if($row['jumpremi']>0){
		$desc="BIAYA PREMI PINJAMAN ".$nama.' - '.$norek;
		$text .="('".$branch."','".$row['spremi']."',360,'".$norek."','".$namas[7]."','".$spremi."',NULL,'".$row['jumpremi']."',446,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
	}
	if($row['jum_period']>0){
		$desc="SETORAN BUNGA GRACE PERIOD ".$row['jumlah_period']." Kali ".$nama.' - '.$norek; 
		$text .="('".$branch."','".$row['sbunga']."',360,'".$norek."','".$namas[1]."','".$sbunga."',NULL,'".$row['jum_period']."',439,32,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',20,'".$noreferensi."'),";	
	}
}
if($row['jumrefund']>0){
	$desc="REFUND PREMI PINJAMAN ".$nama.' - '.$norek;
	$text .="('".$branch."','".$row['srefund']."',360,'".$norek."','".$namas[7]."','".$srefund."',NULL,'".$row['jumrefund']."',347,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99),";
	$text .="('".$branch."','".$nonass."',360,''".$norek."','".$namas[11]."','".$gssl_cair."',NULL,'".$row['jumrefund']."',447,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}
if($simpanan_pokok>0){
	$desc="SIMPANAN POKOK ".$nama.' - '.$norekp;
	$descc="- SIMPANAN POKOK";
	$text .="('".$branch."','".$gssl_simpokok."',360,'".$norekp."','".$descc."','".$gssl_simpokokk."',NULL,'".$simpanan_pokok."',411,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}
if($simpanan_wajib>0){
	$desc="SIMPANAN WAJIB ".$nama.' - '.$norekw;
	$descc="- SIMPANAN WAJIB";
	$text .="('".$branch."','".$gssl_simwajib."',360,'".$norekw."','".$descc."','".$gssl_simwajibb."',NULL,'".$simpanan_wajib."',412,90,'".$notran."','".$desc."',360,'".$t."','".$userid."',now(),'".$xuser."','".$kcabang."',99,'".$noreferensi."'),";
}
$text=substr_replace($text,';',-1);
if($simpanan_pokok>0){
	$text .="UPDATE $tabel_tabungan SET memkredit=memkredit+'$simpanan_pokok',saldoakhir=saldoakhir+'$simpanan_pokok',user_update='$userid',tgl_update=now() WHERE norek='$norekp' LIMIT 1;";
}
if($simpanan_wajib>0){
	$text .="UPDATE $tabel_tabungan SET memkredit=memkredit+'$simpanan_wajib',saldoakhir=saldoakhir+'$simpanan_wajib',user_update='$userid',tgl_update=now() WHERE norek='$norekw' LIMIT 1;";
}
if($jumangsur>0){
	$hasil=$result->query_y1("SELECT branch,nonas,sufix,norek,produk,nama,angsurke,bulan,tgtagihan,kdkop,kd_tagih FROM $tabel_payment WHERE norek='$norekl' AND angsurke='$bataske' LIMIT 1",'');
	if($result->num($hasil)!=0){
		$data=$result->row($hasil);$bulan=$data['bulan'];$nama=$data['nama'];$msufix=$data['sufix'];$mnonas=$data['nonas'];$mproduk=$data['produk'];$mkdkop=$data['kdkop'];$tglb=$data['tgtagihan'];$kd_tagih=$data['kd_tagih'];
		$text .="INSERT INTO $tabel_payment(branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,bulan,oper,bussdate,kdaktif,kdkop,tanggal,kd_tagih)VALUES('$branch','$norekl','$msufix','$mnonas','$nama','$mproduk','".$row['plunas']."','".$row['blunas']."','".$row['alunas']."','$jumangsur','$t',777,'$bataske','$bulan','$userid',now(),50,'$mkdkop','$tglb','$kd_tagih');";
		$text .="INSERT INTO $temPayment SELECT '',branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,kdaktif,oper,bussdate,bulan,kdkop,tanggal,alasan_tt,solusi_tt,kd_tagih FROM $tabel_payment WHERE norek='$norekl' AND angsurke>'$bataske';";
	}
}
$text .="INSERT INTO $tabel_payment SELECT '',branch,norek,sufix,nonas,nama,produk,pokok,bunga,adm,jumlah,tgtagihan,kdtran,angsurke,kdaktif,oper,bussdate,bulan,kdkop,tanggal,alasan_tt,solusi_tt,kd_tagih FROM $temPayment WHERE norek='$norek';";
if($row['jumpremi']>0){
	$hasil=$result->query_y1("SELECT norek FROM $tabel_asuransi WHERE norek='$norek' LIMIT 1",'');
	if($result->num($hasil)>0){
		$text .="UPDATE $tabel_asuransi SET tgtran='$tgtran',mutasi_debet='".$row['jumpremi']."',saldo_akhir='".$row['jumpremi']."',jumlah_premi='".$row['jumpremi']."',user_update='$userid',bussdate=now() WHERE norek='$norek' LIMIT 1;";
	}else{
		$text .="INSERT INTO $tabel_asuransi(branch,nonas,norek,tgtran,mutasi_debet,saldo_akhir,jumlah_premi,user_update,bussdate)VALUES('$branch','$nonas','$norek','$tgtran','".$row['jumpremi']."','".$row['jumpremi']."','".$row['jumpremi']."','$userid',now());";
	}
}
if($row['plunas']>0) $text .="UPDATE $tabel_kredit SET memkre=memkre+".$row['plunas'].",saldoa=(saldo+mutdeb+memdeb)-(mutkre+memkre),bussdate=now() WHERE norek='$norekl' LIMIT 1;";
$text .="UPDATE $tabelKredit SET kdaktif=1,user_otorisasi='$userid',tgl_otorisasi=now() WHERE id='$id' LIMIT 1;";
$text .="UPDATE $tabel_kredit SET kdaktif=1,user_otorisasi='$userid',tgl_otorisasi=now() WHERE norek='$norek' LIMIT 1;";
$text .="DELETE FROM $temPayment WHERE norek='$norek';";
$text .="DELETE FROM $tabel_payment WHERE norek='$norekl' AND angsurke>'$bataske'";
$result->multi_y($text);
$catat="Sukses Otorisasi Pinjaman Kredit Rekening : ".$norek;
echo $catat;$result->close();
include 'around.php';
?>