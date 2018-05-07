<?php
session_start();
require 'class/MySQL.php';
$username =$result->c_d($_POST['username']);
$password =$result->c_d($_POST['password']);
$iptocheck=$result->c_d($_SERVER['REMOTE_ADDR']);
$captchavalidation=FALSE;$userid=$username;

$hasil=$result->res("SELECT a.id,a.branch,a.cabang,a.nama,a.userid,a.pass,a.status,a.akses,a.hmenu,a.plafon,a.plafonk,a.nik,a.loginatmp,a.aktif_satu,b.alamat FROM tbluser a JOIN tblkantor b ON a.branch=b.kode WHERE userid='$username' LIMIT 1");
if($result->num($hasil)>0){
	$data=$result->row($hasil);
	if($username!='ADMIN'){
		$hasil=$result->res("SELECT ipchek,logincount FROM ipvalidasi WHERE ipchek='$iptocheck' LIMIT 1");
		if($result->num($hasil)>1){
			$row=$result->row($hasil);
			$useridattemp= $row['logincount'];
			$useridattemp=intval($useridattemp);
			if($useridattemp>3){
				die('Login Dengan IP Adress Sudah : '.$useridattemp.' Kali Salah, IP Adress Telah Di Blokir');
			}
		}
	}
	if(isset($_SESSION['captcha_code']) && $_SESSION['captcha_code'] == $_POST['captcha']){
		$captchavalidation=TRUE;
		$tabel ="ipcapcha";
		$where = array('userid' => $username);
		$hasil=$result->delete($tabel,$where,1);
	}else{
		$capchaattemp=1;
		$hasil=$result->res("SELECT userid,logincount FROM ipcapcha WHERE userid='$username' LIMIT 1");
		$now=date('Y-m-d H:i:s');
		if($result->num($hasil)<1){
		    $data = array(
		        'ipchek' => $iptocheck,
		        'logincount' => $capchaattemp,
		        'timein' => $now,
		        'userid' => $username
		    );
		    $result->query_y1("INSERT INTO ipcapcha(ipchek,logincount,timein,userid)VALUES('$iptocheck','$capchaattemp',now(),'$username')");
		    //$lastID = $result->insert('ipcapcha', $data);
		}else{
			$row=$result->row($hasil);
			$capchaattemp= $row['logincount'];
			$capchaattemp=intval($capchaattemp);
			if($capchaattemp>5){
				die('Security Code Anda Salah Sebanyak : '.$capchaattemp.' User ID Telah Di Blokir');
			}else{
				$capchaattemp++;
				$result->query_y1("UPDATE ipcapcha SET logincount='$capchaattemp' WHERE userid= '$username' LIMIT 1");
			}
		}
		die('Security Code Anda Salah..? Atemp : '.$capchaattemp.' Kali');
	}
	$passatemp= $data['loginatmp'];
	$correctpassword = $data['pass'];
	$salt = substr($correctpassword, 0, 64);
	$correcthash = substr($correctpassword, 64, 64);
	$userhash = hash("sha256", $salt . $password);
	if (($userhash == $correcthash) && ($captchavalidation==TRUE) && ($data['userid']==$username )) {
		if($data['status']==1){
			die('User ID Yang Di Masukan Sedang Online...!');
		}elseif($data['status']==0){
			die('User ID Yang Di Masukan Telah Non Aktif ...!');
		}
		$hasil=$result->res("SELECT tanggal FROM tanggal ORDER BY tanggal DESC  LIMIT 1");
		if($result->num($hasil)<1) die('Tanggal Belum Ada');
		$row=$result->row($hasil);
		session_regenerate_id();
		$_SESSION['SESS_KODE_CABANG'] = $data['branch'];
		$_SESSION['SESS_NAMA_CABANG']= $data['cabang'];
		$_SESSION['SESS_NAMA_USER']= $nmuser = $data['nama'];
		$_SESSION['SESS_USER'] = $data['userid'];
		$_SESSION['SESS_STATUS'] = $data['status'];
		$_SESSION['SESS_LEVEL_USER'] = $data['akses'];
		$_SESSION['SESS_LEVEL_MENU']= $data['hmenu'];
		$_SESSION['SESS_LIMITD'] = $data['plafon'];
		$_SESSION['SESS_LIMITK'] = $data['plafonk'];
		$_SESSION['SESS_NIK'] = $data['nik'];
		$_SESSION['SESS_ALAMAT'] =$data['alamat'];
		$_SESSION['AKTIF_SATU'] =$data['aktif_satu'];
		$_SESSION['SESS_TGL_HARI'] = date_sql($row['tanggal']);
		$_SESSION['SESS_TGL_AKTIF']= "01-11-2015";
		$_SESSION['isLoggedIn'] = true;
		$_SESSION['timeOut'] = 1200;
		$_SESSION['loggedAt']= time();
		session_write_close();
		$result->query_y1("UPDATE tbluser SET status=1,loginatmp=0,lastaktif=now(),faddr='$iptocheck',jmllogin=jmllogin+1 WHERE userid= '$username' LIMIT 1");
		$tanggal=date_sql($row['tanggal']);
		$catat='Masuk Ke Menu Aplikasi';
		include 'around.php';
		echo $data['hmenu'];
	}else{
		if($passatemp>3){
			die('Password Anda Salah...! Atemp : '.$passatemp.' Kali User Telah Disable');
		}else{
			$passatemp++;
			$result->query_y1("UPDATE tbluser SET loginatmp='$passatemp' WHERE userid= '$username' LIMIT 1");
			die('Password Anda Salah...! Atemp : '.$passatemp.' Kali');
		}
	}
}else {
	$useridattemp=1;
	$hasil=$result->res("SELECT ipchek,logincount FROM ipvalidasi WHERE ipchek='$iptocheck' LIMIT 1");
	if($result->num($hasil)<1){
		$result->query_y1("INSERT INTO ipvalidasi(ipchek,logincount,timein) VALUES('$iptocheck','$useridattemp',now())");
	}else{
		$row=$result->row($hasil);
		$useridattemp= $row['logincount'];
		$useridattemp=intval($useridattemp);
		if($useridattemp>3){
			die('User ID Tidak Terdaftar...? Atemp : '.$useridattemp.' IP Adress Telah Di Blokir');
		}else{
			$useridattemp++;
			$result->query_y1("UPDATE ipvalidasi SET logincount='$useridattemp' WHERE ipchek= '$iptocheck' LIMIT 1");
		}
	}
	die('User ID Tidak Terdaftar...? Atemp : '.$useridattemp.' Kali');
}
function date_sql($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}
function write_log($log){  
	$dtime=@date('[Ydm]');
	define('LOG','logfile/'.$dtime.'log.txt');
	 $time = @date('[Y-d-m:H:i:s]');
	 $op=$time.' '.'Action for '.$log."\n".PHP_EOL;
	 $fp = @fopen(LOG, 'a');
	 $write = @fwrite($fp, $op);
	 @fclose($fp);
}
?>
