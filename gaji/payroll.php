<?php
ob_start ("ob_gzhandler");
include '../auth.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html XMLNS="http://www.w3.org/1999/xhtml">
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
	<title>PAYROLL</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicons.ico" />
	<link rel="stylesheet" type="text/css" href="../css/style.css"/>
	<link rel="stylesheet" type="text/css" href="../css/icon.css"/>
	<link rel="stylesheet" type="text/css" href="../css/lookupbox.css" />
	<link rel="stylesheet" type="text/css" href="../treeview/jquery.treeview.css" />
	<link rel="stylesheet" type="text/css" href="../jquery-ui-1.11.4.custom/jquery-ui.min.css">
	<script type="text/javascript" src="../java/global.js"></script>
	<script type="text/javascript" src="../jQuery/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="../jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="../jQuery/jquery.lookupbox.js"></script>
	<script type="text/javascript" src="../jQuery/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="../timerajax.js"></script>
	<script type="text/javascript" src="../jQuery/clock.js"></script>
	<script type="text/javascript" src="../jQuery/notiflat.js"></script>
	<script type="text/javascript" src="../treeview/jquery.cookie.js"></script>
	<script type="text/javascript" src="../treeview/jquery.treeview.js"></script>
	<script>
	var interval;
	$(window).load(function() {
		init();
	})
	$(document).ready(function(){
		document.getElementById("mjudul").innerHTML="System Informasi Payroll";
		$(function() {
			$('#innertube a').click(function() {
				$('#loading').show();
				var xjudul=$(this).attr('title');
				$.get(this.href, function(data) {
					document.getElementById("mjudul").innerHTML=xjudul;
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
		document.location.href = "../logout.php";
		return false;
	}
	function goHome(){
		document.location.href = "../gaji/payroll.php";
		return false;
	}
</script>
</head>
<body>
<div id="header" class="ui-widget-header">
	<div class="info">
		<?php echo "WELCOME " .$nameuser;echo " [ ".$userid." ] TANGGAL : ".$tanggal;echo "</br>";?>
		<a class="standar" onclick="goRefresh();" style="color: #1a3a3e">Home</a>
		<a class="standar" onclick="goLogout();" style="color: #1a3a3e">Logout</a>
		<a class="standar" onclick="goHome();" style="color: #1a3a3e">Refresh</a>
	</div>
	<div class="logo">
		<img src="../logo.jpg" width="140" height="40" border="0"/>
	</div>
	<h5><?php echo " " .$ncabang;echo " [ " .$kcabang. " ]";echo "<br />";echo " " .$alamat;?></h5>
	<div class="clear"></div>
</div>
<div id="kontainer">
	<div id="content_kiri">
		<div id="loading" align="center">loading...<br><img src="../images/loader.gif"><br></div>
		<div id="kolomkiri_">
			<ul id="red" class="filetree">
				<h5>Munu PAYROLL</h5>
				<li><span class="file"><a href="../gaji/payroll.php">Home</a></span></li>
				<li><span class="folder">Setup Parameter</span>
					<ul id="innertube">
						<li><span class="file"><a title="Parameter PTKP" href="../gaji/tabel_ptkp.php">Parameter PTKP</a></span></li>
						<li><span class="file"><a title="Parameter Direktorat" href="../gaji/tabel_direktorat.php">Parameter Direktorat</a></span></li>
						<li><span class="file"><a title="Parameter Wilayah" href="../gaji/tabel_wilayah.php">Parameter Wilayah</a></span></li>
						<li><span class="file"><a title="Parameter Area" href="../gaji/tabel_lokasi.php">Parameter Area</a></span></li>
						<li><span class="file"><a title="Parameter Jabatan" href="../gaji/tabel_jabatan.php">Parameter Jabatan</a></span></li>
						<li><span class="file"><a title="Parameter Grade" href="../gaji/tabel_grade.php">Parameter Grade</a></span></li>
					</ul>
				</li>
				<li><span class="folder">Pendataan Data Karyawan</span>
					<ul id="innertube">
						<li><span class="file"><a title="Pendataan Data Karyawan" href="../gaji/new_karyawan.php">Pendataan Data Karyawan</a></span></li>
						<li><span class="file"><a title="Koreksi Data Karyawan" href="../gaji/new_karyawanu.php">Koreksi Data Karyawan</a></span></li>
						<li><span class="file"><a title="Pendataan Absensi Karyawan" href="../gaji/new_absensi.php">Pendataan Absensi</a></span></li>
						<li><span class="file"><a title="Pendataan Riwayat Pekerjaan" href="../gaji/riwayat_kerja.php">Pendataan Riwayat Pekerjaan</a></span></li>
						<li><span class="file"><a title="Pendataan Riwayat Jabatan" href="../gaji/riwayat_jabatan.php">Pendataan Riwayat Jabatan</a></span></li>
						<li><span class="file"><a title="Pendataan Data Keluarga" href="../gaji/riwayat_keluarga.php">Pendataan Data Keluarga</a></span></li>
						<li><span class="file"><a title="Pengajuan Resign Pekerjaan" href="../gaji/riwayat_resign.php">Pengajuan Resign Pekerjaan</a></span></li>
						<li><span class="file"><a title="Pendataan Penilaian Kerja" href="../gaji/riwayat_predikat.php">Pendataan Penilaian Kerja</a></span></li>
					</ul>
				</li>
				<li><span class="folder">Proses Gaji Karyawan</span>
					<ul id="innertube">
						<li><span class="file"><a title="Nominatif Kredit Harian" href="rpt_nominatif02.php">Nominatif Kredit Harian</a></span></li>
						<li><span class="file"><a title="Nominatif Tidak Ditagih" href="rpt_nominatif03.php">Nominatif Tidak Ditagih</a></span></li>
						<li><span class="file"><a title="Nominatif Tabungan Harian" href="rptnomitabu.php">Nominatif Tabungan Harian</a></span></li>
						<li><span class="file"><a title="Nominatif Asuransi Harian" href="rpt_asuransi02.php">Nominatif Asuransi Harian</a></span></li>
						<li><span class="file"><a title="Nominatif Inventaris Harian" href="inventaris_07.php">Nominatif Inventaris Harian</a></span></li>
					</ul>
				</li>					
				<li><span class="folder">Laporan Gaji Karyawan</span>
					<ul id="innertube">
						<li><span class="folder">Menu Proses Nominatif</span>
							<ul>
								<li><span class="file"><a title="Proses Nominatif Kredit Bulanan" href="prsnominatiff.php">Proses Nominatif Kredit</a></span></li>
								<li><span class="file"><a title="Proses Nominatif Inventaris" href="inventaris_06.php">Proses Nominatif Inventaris</a></span></li>
								<li><span class="file"><a title="Proses Nominatif Tabungan Bulanan" href="pnomiba.php">Proses Nominatif Tabungan</a></span></li>
							</ul>
						</li>
						<li><span class="file"><a title="Nominatif Kredit Bulanan" href="rpt_nominatif00.php">Nominatif Kredit Bulanan</a></span></li>
						<li><span class="file"><a title="Nominatif Tidak Ditagih Bulanan" href="rpt_nominatif01.php">Nominatif Tidak Ditagih Bulanan</a></span></li>
						<li><span class="file"><a title="Laporan Rekap Nominatif Kredit " href="rpt_laporan.php">Laporan Rekap Nominatif</a></span></li>
						<li><span class="file"><a title="Nominatif Premi Asuransi Bulanan" href="rpt_asuransi01.php">Nominatif Premi Asuransi Bulanan</a></span></li>
						<li><span class="file"><a title="Nominatif Tabungan Bulanan" href="rptnomitabub.php">Nominatif Tabungan Bulanan</a></span></li>
						<li><span class="file"><a title="Nominatif Inventaris Bulanan" href="inventaris_03.php">Nominatif Inventaris Bulanan</a></span></li>
					</ul>
				</li>					
				<li><span class="folder">Menu Utility</span>
					<ul id="innertube">
						<li><span class="file"><a title="Posting Transaksi Tahunan" href="aknpostthn.php">Posting Transaksi Tahunan</a></span></li>
						<li><span class="file"><a title="Laporan Keuangan Tahunan" href="aknnerathn.php">Laporan Keuangan Tahunan</a></span></li>
						<li><span class="file"><a title="Jurnal Penutup Akhir Tahun" href="aknjurnal.php">Jurnal Penutup Akhir Tahun</a></span></li>
					</ul>
				</li>
				<li class="closed"><span class="file"><a href="logout.php">Logout</a></span></li>
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
			<script>
				goforit();
			</script>
		</span> ]
		<?php $ip = $_SERVER['REMOTE_ADDR']; echo "[ IP. Anda <i>$ip</i> ]";?>
	</div>
</div>
</body>
</html>