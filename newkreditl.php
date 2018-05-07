<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript" src="java/hanya_angka.js"></script>
<script type="text/javascript" src="java/_newkredit.js"></script>
<script type="text/javascript">
	var url ="newkredit.php";
	var urls ='newkredits.php?p=1';
	$("#lookup_kota").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookup_kota").lookupbox({
		title: 'Daftar Kabupaten',
		url	 : 'lookup/lookup_kota.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=brekom]').val(data.kode);
			$('#nmkota').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
	function showPayment(id) {
		$.ajax({
			url : 'thistorydd.php',
			type: "GET",
			data: 'id='+id,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){ 
				$('#dialogg').html(data); 
				$('#loading').hide();
				$("#dialogg").dialog({
					title :"View Details",
					height: 500,
					width : 900,
					modal : true,
					buttons:{
						close: function (){
							$(this).dialog('close');
						}  
					}
				});
			}
		});
	}
</script>
<?php $provisi=0;$btl=0;$adm=0;$meterai=0;$plafon=0;$premi=0;$jumbersih=0;$jumprovisi=0;$jumbtl=0;$jumadm=0;$jumpremi=0;$jumpotong=0;$jumrefund=0;$pokok=0;$bunga=0;$madm=0;$jumangsur=0;$blunas=0;$bungakk=0;$alunas=0;$jumlunas=0;$jkredit="0";$skredit="09";$kdjamin="852";$kdgol='8745';$kdguna='89';$kdsektor='9990';$tenor_premi=0;$kdangsur=1;$angsurke=0;$pot_angsuran=0;$jum_kdangsur=0;$kode_cair=0;$jumlah_period=0;$jum_period=0;$simpanan_pokok=0;$simpanan_wajib=0;$no_aso_bank='';$no_cif_bank='';$bank_transfer='';$nama_transfer='';$rekening_transfer='';$mitra_cheking='';$tanggal_transfer='';$nama_pendamping='';$alamat_pendamping='';$lurah_pendamping='';$camat_pendamping='';$tlp_pendamping='';$ktp_pendamping='';$result->buatTabel($tabelKredit,'tem_kredit');$tgbatas=0;switch ($result->c_d($_GET['p'])) {default :echo "Halaman tidak ditemukan";break;case "1":echo '<div class="ui-widget-content">';$id=$result->c_d($_GET['id']);$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.nocitra,a.noreks,a.nopen,a.noktp,a.tglahir,a.pekerjaan,a.umur,a.nmwaris,a.tglahirw,a.jenis,a.jenis1,a.kdjiwa,a.nokarip,a.nodapem,a.kdbyr,a.kkbayar,a.nmbayar,a.kdkop,a.produk,a.deb1,a.tgtran,a.nomi,a.saldo,a.saldoa,a.jangka,a.angsurke,a.suku,a.anuitas,a.tbunga,a.tgklaim,a.kdpremi,a.kdskep,a.nosk,a.pensk,a.tgsk,a.tgpjk,a.tgstnk,a.agunan1,a.agunan2,a.agunan3,a.agunan4,a.agunan5,a.agunan6,a.instansi_pensiun,a.pengelola_pensiun,a.no_aso_bank,a.no_cif_bank,a.bank_transfer,a.nama_transfer,a.rekening_transfer,a.mitra_cheking,a.tanggal_transfer,a.gaji,a.self1,a.self2,a.self3,a.pbank,a.plain,a.kdsales,a.arekom,a.nrekom,a.trekom,a.lrekom,a.krekom,a.brekom,a.nktprekom,a.tktprekom,a.nmsid,a.pokok,a.bunga,a.administrasi,a.ketnas,a.kolek,a.tgl_cair,a.status_klaim,a.kode_cair,a.nama_pendamping,a.alamat_pendamping,a.lurah_pendamping,a.camat_pendamping,a.tlp_pendamping,a.ktp_pendamping,b.nama,b.alamat,b.lurah,b.camat,b.kota,b.kdpos,b.masaktp,b.tgllahir FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id' LIMIT 1");$row=$result->row($hasil);$alamat=$row['alamat'];$lurah=$row['lurah'];$camat=$row['camat'];$kota=$row['kota'];$nama=$row['nama'];$masaktp=date_sql($row['masaktp']);$kdpos=$row['kdpos'];include 'variabel/var_kredit.php';$kdpin=0;$no_aso_bank=$row['no_aso_bank'];$no_cif_bank=$row['no_cif_bank'];$bank_transfer=$row['bank_transfer'];$nama_transfer=$row['nama_transfer'];$rekening_transfer=$row['rekening_transfer'];$mitra_cheking=$row['mitra_cheking'];$angsurke=$row['angsurke'];$tglahir=date_sql($row['tgllahir']);$nama_pendamping=$row['nama_pendamping'];$alamat_pendamping=$row['alamat_pendamping'];$lurah_pendamping=$row['lurah_pendamping'];$camat_pendamping=$row['camat_pendamping'];$tlp_pendamping=$row['tlp_pendamping'];$ktp_pendamping=$row['ktp_pendamping'];$kode_cair=$row['kode_cair'];$branch=$row['branch'];include 'config/cek_tagihan.php';if($angsurke<1){$angsurke=$jangka;}$tgbatas=$angsurke;if($kdkop==1){$noreks=$kcabang.'213204360';}else{$noreks=$kcabang.'213205360';}if($status_klaim==1){$result->msg_error('Debitur Dalam Pengajuan/Penghapusan OBD, Tanggal '.$tgklaim);}if($kode_cair==1){$result->msg_error('Debitur Sudah Pencairan/Penghapusan OBD Tanggal '.$tgl_cair);}$hasil=$result->query_x1("SELECT SUM(status_klaim) AS klaim1,SUM(kode_cair) AS klaim2 FROM $tabel_kredit WHERE nonas='$nonas'");if($result->num($hasil)>0){$row = $result->row($hasil);if($row['klaim1']>0){$result->msg_error('Debitur Dalam Pengajuan/Penghapusan');}
		if($row['klaim2']>0){
			//$result->msg_error('Debitur Sudah Pencairan/Penghapusan');
		}
	}$hasil=$result->query_x1("SELECT SUM(IF(kdaktif=0,nomi,0)) AS belum FROM $tabelKredit WHERE nonas='$nonas'");if($result->num($hasil)>0){$row = $result->row($hasil);if($row['belum']>0){$result->msg_error('Sudah Ada Pinjaman Belum Di Otorisasi...?');}}$jumlah_tagihan=$xpokok+$xbunga+$xadm;$no_paymet=$norek;$kali_sisa=intval($jangka/3);$ybunga=0;$sisa_angsuran=$jangka-$angsurke;if($sisa_angsuran<=$kali_sisa){$ybunga=$xbunga;if($sisa_angsuran<=0){$ybunga=0;}}else{$kali_sisa=intval($jangka/2);if($sisa_angsuran<=$kali_sisa){$ybunga=$xbunga*2;}else{$ybunga=$xbunga*3;}}include '_pelunasanxx.php';$blunas=$jbunga+$ybunga;$alunas=$jadm;if($kk>0){$bungakk=intval(($jumlah_tagihan*$tbunga)/100)*$kk;}$saldoa=$saldox;$jumlunas=$saldoa+$blunas+$alunas+$bungakk;include 'newkreditff.php';echo '</div>';break;case "2":echo '<div class="ui-widget-content">';$result->buatTabel($tabelKredit,'tem_kredit');$nonas=$result->c_d($_GET['nonas']);$kdskep=$result->c_d($_GET['kdskep']);$kdkop=$result->c_d($_GET['kdkop']);$branch=$kcabang;$id='';$hasil=$result->query_lap("SELECT nonas,nama,alamat,lurah,camat,kdpos,kota,pekerjaan1,tgllahir,noktp,masaktp,status_cif FROM $tabel_nasabah WHERE nonas='$nonas' LIMIT 1");$row = $result->row($hasil);$nama=$row['nama'];$alamat=$row['alamat'];$lurah=$row['lurah'];$camat=$row['camat'];$kdpos=$row['kdpos'];$kota=$row['kota'];$pekerjaan=$row['pekerjaan1'];$tglahir=date_sql($row['tgllahir']);$noktp=$row['noktp'];$masaktp=date_sql($row['masaktp']);$nopen="";$kdjiwa="";$nocitra='';$nmwaris="";$tglahirw="";$arekom="";$trekom="";$nrekom="";$jenis="0000";$jenis1="";$nodapem="";$nokarip="";$deb1="KONSUMTIF";$gaji=0;$self1=0;$pbank=0;$plain=0;$self2=0;$self3=0;$sufix='';$norek='';$umur=0;$kkbayar='';$kdbyr='';$nmbayar='';$tgtran='';$ketnas=0;$nomi=0;$jangka=0;$suku=0;$tbunga=0;$saldoa=0;$nosk='';$pensk='';$tgsk='';$agunan1='';$agunan2='';$agunan3='';$agunan4='';$agunan5='';$agunan6='';$tgstnk='';$tgpjk='';$kdsales='';$produk='';$kdpremi='0';$nmsid=$nama;$jumrefund=0;$lrekom='';$krekom='';$brekom='';$nktprekom='';$produkl='';$norekl='';$id='';$norek='';$xpokok=0;$xbunga=0;$xadm=0;$kolek=1;$saldox=0;$kdpin=1;$instansi_pensiun='';$pengelola_pensiun=0;$sufixl='';$hasil=$result->query_x1("SELECT SUM(IF(kdaktif=0,nomi,0)) AS belum,SUM(IF(kdaktif=1,nomi,0)) AS baru,kdkop FROM $tabelKredit WHERE nonas='$nonas'");if($result->num($hasil)>0){$row = $result->row($hasil);if($row['belum']>0){$result->msg_error('Sudah Ada Pinjaman Belum Di Otorisasi...?');}}if($kdkop==1){$noreks=$kcabang.'213204360';}else{$noreks=$kcabang.'213205360';}include 'newkreditff.php';echo '</div>';break;case "3":echo '<div class="ui-widget-content">';$id=$result->c_d($_GET['id']);$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.sufix,a.norek,a.nocitra,a.noreks,a.nopen,a.noktp,a.tglahir,a.pekerjaan,a.umur,a.nmwaris,a.tglahirw,a.jenis,a.jenis1,a.kdjiwa,a.nokarip,a.nodapem,a.kdbyr,a.kkbayar,a.nmbayar,a.kdkop,a.produk,a.deb1,a.tgtran,a.nomi,a.saldo,a.saldoa,a.jangka,a.suku,a.angsurke,a.anuitas,a.tbunga,a.tgklaim,a.kdpremi,a.kdskep,a.nosk,a.pensk,a.tgsk,a.tgpjk,a.tgstnk,a.agunan1,a.agunan2,a.agunan3,a.agunan4,a.agunan5,a.agunan6,a.instansi_pensiun,a.pengelola_pensiun,a.no_aso_bank,a.no_cif_bank,a.bank_transfer,a.nama_transfer,a.rekening_transfer,a.mitra_cheking,a.tanggal_transfer,a.gaji,a.self1,a.self2,a.self3,a.pbank,a.plain,a.kdsales,a.arekom,a.nrekom,a.trekom,a.lrekom,a.krekom,a.brekom,a.nktprekom,a.nmsid,a.pokok,a.bunga,a.administrasi,a.ketnas,a.kolek,a.tgl_cair,a.status_klaim,a.kode_cair,a.nama_pendamping,a.alamat_pendamping,a.lurah_pendamping,a.camat_pendamping,a.tlp_pendamping,a.ktp_pendamping,b.nama,b.alamat,b.lurah,b.camat,b.kota,b.kdpos,b.masaktp,b.tgllahir FROM $tabel_kredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id' LIMIT 1");$row=$result->row($hasil);$alamat=$row['alamat'];$lurah=$row['lurah'];$camat=$row['camat'];$kota=$row['kota'];$nama= $row['nama'];$masaktp=date_sql($row['masaktp']);$kdpos=$row['kdpos'];include 'variabel/var_kredit.php';$kdpin=3;$no_aso_bank=$row['no_aso_bank'];$no_cif_bank=$row['no_cif_bank'];$bank_transfer=$row['bank_transfer'];$nama_transfer=$row['nama_transfer'];$rekening_transfer=$row['rekening_transfer'];$mitra_cheking=$row['mitra_cheking'];$tglahir=date_sql($row['tgllahir']);$nama_pendamping=$row['nama_pendamping'];$alamat_pendamping=$row['alamat_pendamping'];$lurah_pendamping=$row['lurah_pendamping'];$camat_pendamping=$row['camat_pendamping'];$tlp_pendamping=$row['tlp_pendamping'];$ktp_pendamping=$row['ktp_pendamping'];$produkl='';$sufixl='';$norekl='';$kode_cair=$row['kode_cair'];$branch=$row['branch'];if($kdkop==1){$noreks=$kcabang.'213204360';}else{$noreks=$kcabang.'213205360';}if($status_klaim==1){$result->msg_error('Debitur Dalam Pengajuan/Penghapusan OBD, Tanggal '.$tgklaim);}if($kode_cair==1){$result->msg_error('Debitur Sudah Pencairan/Penghapusan OBD Tanggal '.$tgl_cair);}$hasil=$result->query_x1("SELECT SUM(status_klaim) AS klaim1,SUM(kode_cair) AS klaim2 FROM $tabel_kredit WHERE nonas='$nonas'");if($result->num($hasil)>0){$row = $result->row($hasil);if($row['klaim1']>0){$result->msg_error('Debitur Dalam Pengajuan/Penghapusan');}
		if($row['klaim2']>0){
			
		}}$hasil=$result->query_x1("SELECT SUM(IF(kdaktif=0,nomi,0)) AS belum,SUM(IF(kdaktif=1,nomi,0)) AS baru,kdkop FROM $tabelKredit WHERE nonas='$nonas'");if($result->num($hasil)>0){$row = $result->row($hasil);if($row['belum']>0){$result->msg_error('Sudah Ada Pinjaman Belum Di Otorisasi...?');}}$saldoa=0;$blunas=0;$alunas=0;$bungakk=0;$jumlunas=0;include 'newkreditff.php';echo '</div>';break;case "4":$id=$result->c_d($_GET['id']);include 'newkreditb.php';break;} ?>