<?php
include '../auth.php';
include "../koneksi.php";
include '../function.php';
switch ($_GET['p'] ) {
	default: echo "Halaman tidak ditemukan"; break;
	case "1":
		$id=clean($_POST['id']);
		$kode=clean($_POST['kode']);
		if($kode==''){
			die('Kode Propnsi Belum Di Isi...?'.$kode);
		}
		$desc1=clean($_POST['desc1']);
		$result = $mysql->query("SELECT id,kode,desc1 FROM fc_prop WHERE id='$id'");
		if (mysqli_num_rows($result)<1){
			$result = $mysql->query("INSERT INTO fc_prop(kode,desc1,bussdate,oper) VALUE('$kode','$desc1',now(),'$userid')");
			if($result==false){			
				echo "Query Gagal :".mysqli_errno($mysql);
			}else{
				echo "Sukses";
				include '../json/jsonpropinsii.php';
			}
		}else{
			$result = $mysql->query("UPDATE fc_prop SET desc1='$desc1',bussdate=now(),oper='$userid' WHERE id='$id'");
			if($result==false){			
				echo "Query Gagal :".mysqli_errno($mysql);
			}else{
				echo "Sukses";
				include '../json/jsonpropinsii.php';
			}
		}			
		break;
	case "2":
		$id=clean($_GET['id']);
		$result=$mysql->query("DELETE FROM fc_prop WHERE id = '$id'");
		if($result==false) {
			echo "Query failed: ".mysqli_errno($mysql);
		}else{
			echo "Data Sukses Dihapus";
			include '../json/jsonpropinsi.php';
		}	
	break;
}
?>