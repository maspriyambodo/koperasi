<?php
include '../auth.php';
include "../koneksi.php";
include '../function.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
		$id=clean($_POST['id']);
		$branch=clean($_POST['branch']);
		$useridx=clean($_POST['useridx']);
		if($useridx==''){
			echo 'Kolom User ID Masih Kosong'; exit();
		}
		$bloterid=clean($_POST['bloterid']);
		$saldo_awal=keangka(clean($_POST['saldo_awal']));
		$mutasi_debet=keangka(clean($_POST['mutasi_debet']));
		$mutasi_kredit=keangka(clean($_POST['mutasi_kredit']));
		$saldo_akhir=keangka(clean($_POST['saldo_akhir']));
		$valid=clean($_POST['valid']);
		$date_expire=date_sql(clean($_POST['date_expire']));
		$result=$mysql->query("SELECT userid FROM tbl_bloter WHERE userid='$useridx' LIMIT 1");
		if (mysqli_num_rows($result)<1){
			$result=$mysql->query("INSERT INTO tbl_bloter(branch,userid,bloterid,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir,valid,date_open,date_expire,bussdate) VALUES ('$branch','$useridx','$bloterid','$saldo_awal','$mutasi_debet','$mutasi_kredit','$saldo_akhir','$valid',now(),'$date_expire',now())");
			if($result==false){
				echo "Query Gagal :".mysqli_errno($mysql);
			}else{
				echo "Sukses";
			}
		}else{
			if($id==''){
				die('User ID Sudah Mempunyai ID Bloter');
			}
			$text= "UPDATE tbl_bloter SET branch='$branch',userid='$useridx',saldo_awal='$saldo_awal',mutasi_debet='$mutasi_debet',mutasi_kredit='$mutasi_kredit',bussdate=now(),saldo_akhir='$saldo_awal'+'$mutasi_debet'-'$mutasi_kredit',date_expire='$date_expire' WHERE id='$id' LIMIT 1";
			$result = $mysql->query($text);
			if($result==false){
				echo "Query Gagal :".mysqli_errno($mysql);
			}else{
				echo "Sukses";
			}
		}
		break;
	case "2":
		$id=clean($_GET['id']);
		$result = $mysql->query("SELECT id,saldo_akhir FROM tbl_bloter WHERE id='$id' LIMIT 1");
		if (mysqli_num_rows($result)==1){
			$row= $result->fetch_array(MYSQLI_BOTH);
			$saldo_akhir=$row['saldo_akhir'];
			if($saldo_akhir>0){
				echo 'Nilai Saldo Akhir Harus Kosong...!!!';exit();
			}
		}
		$result=$mysql->query("DELETE FROM tbl_bloter WHERE id = '$id' LIMIT 1");
		if($result==false) {
			echo "Query failed: ".mysqli_errno($mysql);
		}else{
			echo "Sukses";
		}
	break;
}?>