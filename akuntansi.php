<?php ob_start ("ob_gzhandler");include 'h_atas.php';include 'config/_opentran.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html XMLNS="http://www.w3.org/1999/xhtml">
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Akuntansi KSP Nabasa</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicons.ico"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/icon.css"/>
	<link rel="stylesheet" type="text/css" href="css/lookupbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/notiflat.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/themes/jquery.tablesorter.pager.css"/>
	<link rel="stylesheet" type="text/css" href="css/themes/blue/style.css"/>	
	<link rel="stylesheet" type="text/css" href="treeview/jquery.treeview.css"/>
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.11.4.custom/jquery-ui.min.css"/>
	<script type="text/javascript" src="jQuery/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jQuery/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="jQuery/jquery.tablesorter.pager.js"></script>	
	<script type="text/javascript" src="jQuery/jquery.lookupboxx.js"></script>
	<script type="text/javascript" src="jQuery/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="jQuery/jQuery.notiflat.js"></script>
	<script type="text/javascript" src="jQuery/jQuery.formatinput.js"></script>
	<script type="text/javascript" src="java/clock.js"></script>
	<script type="text/javascript" src="java/_tombolback.js"></script>	
	<script type="text/javascript" src="timerajax.js"></script>
	<script type="text/javascript" src="treeview/jquery.cookie.js"></script>
	<script type="text/javascript" src="treeview/jquery.treeview.js"></script>
	<script>
	var interval;
	$(window).load(function() {
		init();
	})
	$(document).ready(function(){
		document.getElementById("mjudul").innerHTML="System Informasi Akuntansi KSP Nabasa"
		$(function() {
			$('#innertube a').click(function() {
				$('#loading').show();
				var xjudul=$(this).attr('title');
				$.get(this.href, function(data) {
					document.getElementById("mjudul").innerHTML=xjudul
					$('#innertub').html($(data));
					$('#loading').hide();
				}, 'html');
				return false;
			});
		});
		// first example
		$("#browser").treeview();
		// second example
		$("#navigation").treeview({
			persist: "location",
			collapsed: true,
			unique: true
		});
		// third example
		$("#red").treeview({
			animated: "fast",
			collapsed: true,
			unique: true,
			persist: "cookie",
			toggle: function() {
				window.console && console.log("%o was toggled", this);
			}
		});
		// fourth example
		$("#black, #gray").treeview({
			control: "#treecontrol",
			persist: "cookie",
			cookieId: "treeview-black"
		});

	});
	function goRefresh(){
		$('#innertub').html('');
		$('#loading').hide();
		return false;
	}
	function goLogout(){
		document.location.href = "logout.php";
		return false;
	}
	function goHome(){
		document.location.href = "akuntansi.php";
		return false;
	}
	</script>
</head>
<body>
<div class="ui-widget">
	<div id="header" class="ui-widget-header">
		<div class="info">
			<?php echo "WELCOME " .$nameuser;echo " [ ".$userid." ] TANGGAL : ".$tanggal;echo "</br>";?>
			<a class="standar" onclick="goRefresh();" style="color: #1a3a3e">Home</a>
			<a class="standar" onclick="goLogout();" style="color: #1a3a3e">Logout</a>
			<a class="standar" onclick="goHome();" style="color: #1a3a3e">Refresh</a>
		</div>
		<div class="logo"><img src="logo.jpg" width="140" height="40" border="0"/></div>
		<h5><?php echo " " .$ncabang;echo " [ " .$kcabang. " ]";echo "<br />";echo " " .$alamat;?></h5>
		<div class="clear"></div>
	</div>
	<div id="kontainer">
		<div id="content_kiri">
			<div id="loading" align="center">loading...<br><img src="images/loader.gif"><br></div>
			<div id="kolomkiri_">
				<ul id="red" class="filetree">
				<h5>Munu Akuntansi</h5>
					<li><span class="folder">Menu Awal Hari</span>
						<ul id="innertube">
							<li><span class="file"><a title="Daftar Cadangan Bunga Deposito Harian" href="deposito_cadnh.php">Daftar Cadangan Bunga Harian</a></span></li>
							<li><span class="file"><a title="Posting Cadangan Bunga Deposito Harian" href="deposito_post.php">Posting Cadangan Bunga Harian</a></span></li>
						</ul>
					</li>
					<li><span class="folder">Menu Transaksi Harian</span>
						<ul id="innertube">
							<li><span class="file"><a title="Transaksi Memorial Umum" href="newmemo.php">Transaksi Memorial Umum</a></span></li>
						</ul>
					</li>
					<li><span class="folder">Menu Informasi Rekening</span>
						<ul id="innertube">
							<li><span class="file"><a title="Daftar Rekening Akuntansi" href="tabel_sandi.php">Daftar Rekening Akuntansi</a></span></li>
							<li><span class="file"><a title="History Transaksi Akuntansi" href="akninfogsl.php">History Transaksi Akuntansi</a></span></li>
							<li><span class="file"><a title="Payment Scedule Kredit" href="thistory.php">Payment Scedule Kredit</a></span></li>
						</ul>
					</li>
					<li><span class="folder">Menu Laporan Inventaris</span>
						<ul id="innertube">
							<li><span class="file"><a title="Pendataan Inventaris Baru" href="inventaris.php">Pendataan Inventaris</a></span></li>
							<li><span class="file"><a title="Koreksi Data  Inventaris" href="inventaris_05.php">Koreksi Data Inventaris</a></span></li>
							<li><span class="file"><a title="Daftar Inventaris" href="inventaris_02.php">Daftar Inventaris</a></span></li>
							<li><span class="folder">Posting Biaya Penyusutan</span>
								<ul>
									<li><span class="file"><a title="Posting Biaya Penyusutan" href="inventaris_04.php">Posting Jurnal Biaya Penyusutan</a></span></li>
									<li><span class="file"><a title="Daftar Biaya Penyusutan" href="rpt_penyusutan.php">Daftar Jurnal Biaya Penyusutan</a></span></li>
								</ul>
							</li>
							<li><span class="folder">Laporan Nominatif Inventaris</span>
								<ul>
									<li><span class="file"><a title="Proses Nominatif Inventaris" href="inventaris_06.php">Proses Nominatif Inventaris</a></span></li>
									<li><span class="file"><a title="Daftar Inventaris Bulanan" href="inventaris_07.php">Daftar Inventaris Bulanan</a></span></li>
									<li><span class="file"><a title="Nominatif Penyusutan Bulanan" href="inventaris_03.php">Nominatif Inventaris Bulanan</a></span></li>
								</ul>
							</li>							
						</ul>
					</li>					
					<li><span class="folder">Menu Laporan Deposito</span>
						<ul id="innertube">
							<li><span class="file"><a title="Daftar Deposito Jatuh Tempo" href="deposito_jtt.php">Daftar Dep. Jatuh Tempo ARO</a></span></li>
							<li><span class="file"><a title="Posting Deposito Jatuh Tempo (ARO)" href="deposito_aro.php">Proses Dep. Jatuh Tempo ARO</a></span></li>
							<li><span class="file"><a title="Laporan Pencadangan Bunga Bulanan" href="deposito_cadn.php">Daftar Cadangan Bunga Bulanan</a></span></li>
							<li><span class="file"><a title="Posting Pencadangan Bunga Bulanan" href="deposito_cadnpost.php">Proses Cad. Bunga Bulanan</a></span></li>
							<li><span class="file"><a title="Nominatif Deposito" href="deposito_nomi.php">Daftar Nominatif Deposito</a></span></li>							
						</ul>
					</li>
					<li><span class="folder">Menu Laporan Tabungan</span>
						<ul id="innertube">
							<li><span class="file"><a title="Hitung Bunga Tabungan Bulanan" href="proses_bunga00.php">Proses Bunga Tabungan</a></span></li>
							<li><span class="file"><a title="Daftar Bunga Adm Pajak Bulanan" href="rptbunga.php">Daftar Bunga Tabungan</a></span></li>
							<li><span class="file"><a title="Proses Nominatif Tabungan Bulanan" href="proses_nominatif40.php">Proses Nominatif Tabungan</a></span></li>
							<li><span class="file"><a title="Nominatif Tabungan Bulanan" href="rptnomitabub.php">Nominatif Tabungan Bulanan</a></span></li>
						</ul>
					</li>
					<li><span class="folder">Menu Laporan Keuangan</span>
						<ul id="innertube">
							<li><span class="folder">Laporan Keuangan Harian</span>
								<ul>
									<li><span class="file"><a title="Posting Transaksi Harian" href="aknposthari.php">Posting Transaksi Harian</a></span></li>
									<li><span class="file"><a title="Laporan Keuangan Harian" href="aknneracah.php">Laporan Keuangan Harian</a></span></li>
									<li><span class="file"><a title="Laporan Keuangan Lainya" href="aknneraca000.php">Laporan Keuangan Lainnya</a></span></li>
								</ul>
							</li>
							<li><span class="folder">Laporan Keuangan Bulanan</span>
								<ul>
									<li><span class="file"><a title="Posting Transaksi Bulanan" href="aknpostbln.php">Posting Transaksi Bulanan</a></span></li>
									<li><span class="file"><a title="Laporan Keuangan Bulanan" href="aknnerabln.php">Laporan Keuangan Bulanan</a></span></li>
									<li><span class="file"><a title="Laporan Keuangan Lainya" href="aknneraca00.php">Laporan Keuangan Lainnya</a></span></li>
									<li><span class="file"><a title="Laporan Keuangan Neraca Bulanan" href="aknneraca11.php">Laporan Neraca/SHU Bulanan</a></span></li>
									<li><span class="file"><a title="Lapoaran Cash Flow Bulanan" href="rpt_cashflow.php">Laporan Cash Flow Bulanan</a></span></li>
								</ul>
							</li>
							<li><span class="folder">Laporan Keuangan Tahunan</span>
								<ul id="innertube">
									<li><span class="file"><a title="Posting Transaksi Tahunan" href="aknpostthn.php">Posting Transaksi Tahunan</a></span></li>
									<li><span class="file"><a title="Laporan Keuangan Tahunan" href="aknnerathn.php">Laporan Keuangan Tahunan</a></span></li>
									<li><span class="file"><a title="Jurnal Penutup Akhir Tahun" href="aknjurnal.php">Jurnal Penutup Akhir Tahun</a></span></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><span class="folder">Menu Laporan Akhir Hari</span>
						<ul id="innertube">
							<li><span class="folder">Laporan Kas Harian</span>
								<ul>
									<li><span class="file"><a title="Laporan Kas Harian" href="rptkas.php">Laporan Mutasi Kas</a></span></li>
									<li><span class="file"><a title="Laporan Kas Besar Harian" href="rptkasbesar.php">Laporan Mutasi Kas Besar</a></span></li>
								</ul>
							</li>
							<li><span class="folder">Laporan Transaksi Harian</span>
								<ul>
									<li><span class="file"><a title="Laporan Transaksi Harian" href="rpt_memorial.php">Laporan Transaksi Harian</a></span></li>	
									<li><span class="file"><a title="Laporan Transaksi Pinjaman" href="rpt_pinjaman.php">Laporan Transaksi Pinjaman</a></span></li>
									<li><span class="file"><a title="Laporan Transaksi Pelunasan" href="rpt_pelunasan.php">Laporan Transaksi Pelunasan</a></span></li>
									<li><span class="file"><a title="Laporan Transaksi Setoran" href="rpt_setoran01.php">Laporan Transaksi Setoran</a></span></li>
									<li><span class="file"><a title="Laporan Transaksi Retur/PKP" href="rpt_retur.php">Laporan Transaksi Retur/PKP</a></span></li>
									<li><span class="file"><a title="Laporan Transaksi Memorial" href="rpt_memorial04.php">Laporan Transaksi Memorial</a></span></li>
									<li><span class="file"><a title="Laporan Jurnal Transaksi" href="rpt_jurnal04.php">Laporan Jurnal Transaksi</a></span></li>
									<li><span class="file"><a title="Laporan Premi Asuransi" href="rpt_asuransi03.php">Laporan Premi Asuransi</a></span></li>
								</ul>
							</li>
							<li><span class="folder">Laporan Nominatif Harian</span>
								<ul>
									<li><span class="file"><a title="Nominatif Kredit Harian" href="rpt_nominatif04.php">Nominatif Kredit Harian</a></span></li>
									<li><span class="file"><a title="Nominatif Tabungan Harian" href="rptnomitabu.php">Nominatif Tabungan Harian</a></span></li>
									<li><span class="file"><a title="Nominatif Deposito" href="deposito_nomi.php">Nominatif Deposito</a></span></li>
								</ul>
							</li>
						</ul>
					</li>
					<li><span class="folder">Menu Laporan Akhir Bulan</span>
						<ul id="innertube">				
							<li><span class="folder">Laporan Transaksi Bulanan</span>
								<ul>
									<li><span class="file"><a title="Lapoaran Kas Besar Bulanan" href="rpt_kasbesar.php">Laporan Kas Besar</a></span></li>
									<li><span class="file"><a title="Laporan Transaksi Bulanan" href="rpt_memorial02.php">Laporan Mutasi Transaksi</a></span></li>
									<li><span class="file"><a title="Laporan Jurnal Transaksi Bulanan" href="rpt_jurnal05.php">Laporan Jurnal Transaksi</a></span></li>
								</ul>
							</li>
							<li><span class="folder">Laporan Operasional Kredit</span>
								<ul>
									<li><span class="file"><a title="Proses Nominatif Kredit Bulanan" href="proses_nominatif00.php">Proses Nominatif Kredit</a></span></li>
									<li><span class="file"><a title="Laporan Realisasi Tagihan I" href="rpt_realisasi02.php">Lap. Rekap Realisasi Tagihan I</a></span></li>
									<li><span class="file"><a title="Laporan Realisasi Tagihan II" href="rpt_tagihan02.php">Lap. Rekap Realisasi Tagihan II</a></span></li>
									<li><span class="file"><a title="Laporan Setoran Tagihan" href="rpt_tagihan05.php">Lap. Rekap Setoran Tagihan</a></span></li>
									<li><span class="file"><a title="Laporan Penyaluran Kredit" href="rpt_pinjaman00.php">Lap. Rekap Penyaluran Kredit</a></span></li>
									<li><span class="file"><a title="Laporan Setoran Kredit" href="rpt_setoran02.php">Lap. Rekap Setoran Kredit</a></span></li>
									<li><span class="file"><a title="Laporan Pelunasan Kredit" href="rpt_pelunasan01.php">Lap. Rekap Pelunasan Kredit</a></span></li>
									<li><span class="file"><a title="Laporan Retur Kredit" href="rptrekapretur.php">Lap. Rekap Retur Kredit</a></span></li>
									<li><span class="file"><a title="Laporan Tunggakan Kredit" href="rpt_tunggakan.php">Lap. Rekap Tunggakan Kredit</a></span></li>
									<li><span class="file"><a title="Laporan 25 Debitur Terbesar" href="rpt_nominatif01.php">Lap. 25 Debitur Terbesar</a></span></li>
									<li><span class="file"><a title="Laporan Pembayaran Angsuran Kredit" href="rpt_setoran03.php">Lap. Pembayaran Angsuran</a></span></li>
									<li><span class="file"><a title="Laporan Nominatif Kredit Bulanan" href="rpt_nominatif00.php">Lap. Nominatif Kredit Bulanan</a></span></li>
									<li><span class="file"><a title="Laporan Nominatif Kredit Pilihan Bulanan" href="rpt_laporan.php">Lap. Nominatif Kredit Pilihan</a></span></li>
									<li><span class="folder">Laporan Premi Asuransi</span>
										<ul>
											<li><span class="file"><a title="Laporan Rekap Kredit Di Asuransikan" href="rpt_asuransi02.php">Lap. Kredit Di Asuransikan</a></span></li>
											<li><span class="file"><a title="Laporan Rekap Krdit Non Asuransi" href="rpt_asuransi04.php">Lap. Kredit Non Asuransi</a></span></li>
											<li><span class="file"><a title="Laporan Premi Asuransi" href="rpt_asuransi00.php">Lap. Rekap Premi Asuransi</a></span></li>
											<li><span class="file"><a title="Laporan Pengajuan/Pengapusan Outstanding" href="rpt_pengajuan.php">Lap. Daftar Pengajuan Klaim</a></span></li>
											<li><span class="file"><a title="Laporan Pencairan/Pengapusan Outstanding" href="rpt_pengajuan00.php">Lap. Daftar Pencairan Klaim I</a></span></li>
											<li><span class="file"><a title="Laporan Pencairan/Pengapusan Outstanding" href="rpt_pencairan.php">Lap. Daftar Pencairan Klaim II</a></span></li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li class="closed"><span class="folder">Closing System</span>
						<ul id="innertube">
							<li><span class="file"><a title="Closing Akhir Hari" href="proses_akhir_hari.php">Closing Akhir Hari</a></span></li>
							<li><span class="file"><a title="Closing Akhir Bulan" href="proses_akhir_bulan.php">Closing Akhir Bulan</a></span></li>
							<li><span class="file"><a title="Closing Akhir Tahun" href="proses_akhir_thn.php">Closing Akhir Tahun</a></span></li>
							<li id="innertube"><span class="file"><a title="Ganti Password" href="gantipassword.php">Ganti Password</a></span></li>
						</ul>
					</li>
					<li class="closed"><span class="folder">Ganti Password</span>
						<ul id="innertube">
							<li id="innertube"><span class="file"><a title="Ganti Password" href="gantipassword.php">Ganti Password</a></span></li>
						</ul>
					</li>
				</ul>
			</div>
			<div id="kolomkanan">
				<div id="mjudul"></div>
				<div id="innertub"></div>
			</div>
		</div>		
	</div>
	<div id="footer" class="ui-widget-header">
		<div class="clock">
			COPYRIGHT
			<?php $waktu=date("Y"); echo " 2015 - ".$waktu;?>
			KOPERASI SIMPAN PINJAM NABASA -|- [
			<span id="clock">
			<script>goforit();</script>
			</span> ]
			<?php $ip = $_SERVER['REMOTE_ADDR']; echo "[ IP. Anda <i>$ip</i> ]";?>
		</div>
	</div>
</div>
</body>
</html>