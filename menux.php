<?php ob_start ("ob_gzhandler");
include 'h_atas.php';
require_once('treenasabah.php');
include 'config/_opentran.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html XMLNS="http://www.w3.org/1999/xhtml">
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title>Menu Utama</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicons.ico"/>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<link rel="stylesheet" type="text/css" href="css/icon.css"/>
	<link rel="stylesheet" type="text/css" href="css/lookupbox.css"/>
	<link rel="stylesheet" type="text/css" href="css/notiflat.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/themes/jquery.tablesorter.pager.css"/>
	<link rel="stylesheet" type="text/css" href="css/themes/blue/style.css"/>
	<link rel="stylesheet" type="text/css" href="jquery-ui-1.11.4.custom/jquery-ui.min.css"/>
	<script type="text/javascript" src="jQuery/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
	<script type="text/javascript" src="jQuery/jquery.tablesorter.js"></script>
	<script type="text/javascript" src="jQuery/jquery.tablesorter.pager.js"></script>
	<script type="text/javascript" src="jQuery/jquery.lookupbox.js"></script>
	<script type="text/javascript" src="jQuery/jquery.maskedinput.js"></script>
	<script type="text/javascript" src="jQuery/jQuery.notiflat.js"></script>
	<script type="text/javascript" src="jQuery/jQuery.formatinput.js"></script>
	<script type="text/javascript" src="java/clock.js"></script>
	<script type="text/javascript" src="java/_tombolback.js"></script>
	<script type="text/javascript" src="timerajax.js"></script>
	<script type="text/javascript" src="menuhome.js"></script>
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
		<div id="loading" align="center">loading...<br><img src="images/loader.gif"><br></div>
		<div id="kolomkiri">
			<div id="accordion" class="ui-accordion ui-accordion-content"><?php 
				if($hmenu==4){ ?>
					<h3>Setup Parameter</h3><div><span <?php echo $tx8; ?></span></div>
					<h3>Utility</h3><div><span <?php echo $tx0; ?></span></div><?php 
				}elseif($hmenu==5){ ?>
					<h3>Menu Data Nasabah</h3><div><span <?php echo $tx; ?></span></div>
					<h3>Menu Tabungan</h3><div><span <?php echo $tx5; ?></span></div>
					<h3>Menu Informasi</h3><div><span <?php echo $tx10; ?></span></div>
					<h3>Menu Kredit</h3><div><span <?php echo $tx12; ?></span></div>
					<h3>Menu Tagihan Reguler</h3><div><span <?php echo $tx9; ?></span></div>
					<h3>Menu Tagihan Susulan</h3><div><span <?php echo $tx14; ?></span></div>
					<h3>Menu Tagihan Micro</h3><div><span <?php echo $tx2; ?></span></div>
					<h3>Menu Laporan Harian</h3><div><span <?php echo $tx7; ?></span></div>
					<h3>Menu Laporan Bulanan</h3><div><span <?php echo $tx3;?></span></div>
					<h3>Menu Laporan Akuntansi</h3><div><span <?php echo $tx11; ?></span></div>
					<?php if($level==2){ ?>
						<h3>Utility</h3><div><span <?php echo $tx0; ?></span></div><?php
					}
				}else{ ?>
					<h3>Menu Data Nasabah</h3><div><span <?php echo $tx; ?></span></div>
					<h3>Menu Informasi</h3><div><span <?php echo $tx10; ?></span></div>
					<?php if($hmenu==1){ ?>
						<h3>Menu Transaksi</h3><div><span <?php echo $tx1; ?></span></div>
						<h3>Menu Tabungan</h3><div><span <?php echo $tx5; ?></span></div>
						<h3>Menu Laporan Harian</h3><div><span <?php echo $tx7; ?></span></div><?php
					}
					if($hmenu==2){ ?>
						<h3>Menu Transaksi</h3><div><span <?php echo $tx1; ?></span></div>
						<h3>Menu Laporan Harian</h3><div><span <?php echo $tx7; ?></span></div><?php
					}
					if($hmenu==3){ ?>
						<h3>Menu Deposito</h3><div><span <?php echo $tx13; ?></span></div>
						<h3>Menu Laporan Harian</h3><div><span <?php echo $tx7; ?></span></div>
						<h3>Menu Laporan Bulanan</h3><div><span <?php echo $tx3;?></span></div><?php
					}
					if($hmenu==0){ ?>
						<h3>Menu Kredit</h3><div><span <?php echo $tx12; ?></span></div>
						<h3>Menu Transaksi</h3><div><span <?php echo $tx1; ?></span></div>
						<h3>Menu Tagihan Reguler</h3><div><span <?php echo $tx9; ?></span></div>
						<h3>Menu Tagihan Susulan</h3><div><span <?php echo $tx14; ?></span></div>
						<h3>Menu Tagihan Micro</h3><div><span <?php echo $tx2; ?></span></div>
						<h3>Menu Laporan Harian</h3><div><span <?php echo $tx7; ?></span></div>
						<h3>Menu Laporan Bulanan</h3><div><span <?php echo $tx3;?></span></div>
						<?php
					}
				}?>
				<h3>Ganti Password</h3><div><span <?php echo $tx4; ?></span></div>
			</div>
		</div>
		<div id="kolomkanan">
			<div id="mjudul">	</div>
			<div id="innertub"></div>
		</div>
	</div>
	<div id="footer" class="ui-widget-header">
		<div class="clock">
			COPYRIGHT
			<?php $waktu=date("Y"); echo " 2015 - ".$waktu;?>
			KOPERASI SIMPAN PINJAM NABASA -|- [
			<span id="clock">
			<script> goforit();</script>
			</span> ]
			<?php $ip = $_SERVER['REMOTE_ADDR']; echo "[ IP. Anda <i>$ip</i> ]";?>
		</div>
	</div>
</div>
</body>
</html>