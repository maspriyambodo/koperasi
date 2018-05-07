<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
	<title>Login Aplikasi</title>
	<link rel="shortcut icon" type="image/x-icon" href="favicons.ico" />
	<link rel="stylesheet" type="text/css" href="css/login_style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="jQuery/jquery-1.12.3.min.js"></script>
	<script type="text/javascript" src="newindex.js"></script>
	<script type="text/javascript" src="jQuery/clock.js"></script>
	<script type="text/javascript">
		function reload() {
			//$('#captcha_c').remove();
			$("#captcha_c").attr("src", "captcha_code.php?"+(new Date()).getTime());
			return false;
		}
	</script>
</head>
<body>
	<header id="header">
		<div class="header-middle">
			<div class="container">
				<div class="row">
					<div align="center">
						System Informasi Kredit Koperasi Nabasah
					</div>
				</div>
			</div>
		</div>
	</header>
	<section id="form">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<div class="login-form">
						<div id="loading" style="display:none;margin-left:40%;margin-top:30%;vertical-align: middle;position: absolute;">Loading ...<br /><img src="Images/loader.gif" /></div>
						<h2><strong>Login Aplikasi</strong> </h2>
						<hr>
						<form action="" id="lg-form" name="lg-form" method="post">
							<input name="username" id="username" type="text" placeholder="Masukan Username"/>
							<input name="password" id="password" type="password" placeholder="Masukan Password" autocomplete="off"/>
							<input name="captcha" id="captcha" type="text" placeholder="verification code" maxlength="6" autocomplete="off"/>
							<a class="fa fa-refresh" onclick="reload();">&nbsp;</a>
							<span><img id="captcha_c" src="captcha_code.php"/></span>
							<div align="center" style="padding-top: 8px">
								<input type="submit" value="Sign In" class="icon-ok"/>
							</div>
						</form>
						<br>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer id="footer">
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div align="center">
						COPYRIGHT <?php $waktu=date("Y"); echo " 2015 - ".$waktu;?> [
						<span ID="clock">
							<script>
								goforit();
							</script>
						</span> ]
						<?php $ip = $_SERVER['REMOTE_ADDR']; echo "[ IP. Anda <i>$ip</i> ]";?>
					</div>
				</div>
			</div>
		</div>
	</footer>
</body>
</html>