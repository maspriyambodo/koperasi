<?php 
if($jenis_klaim==0) {
	$desc="PENCAIRAN KLAIM ASURANSI";
}elseif($jenis_klaim==1){
	$desc="PPAP CADANGAN UMUM PENSIUN ";
}elseif($jenis_klaim==2){
	$desc="PPAP CADANGAN UMUM PEGAWAI ";
}elseif($jenis_klaim==3){
	$desc="PPAP CADANGAN UMUM MICRO ";
}elseif($jenis_klaim==4){
	$desc="PPAP CADANGAN KHUSUS PENSIUN ";
}elseif($jenis_klaim==5){
	$desc="PPAP CADANGAN KHUSUS PEGAWAI ";
}else{
	$desc="PPAP CADANGAN KHUSUS MICRO ";
}
?>