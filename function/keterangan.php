<?php
function ket_jaminan($xkdskep){
	if($xkdskep==0){
		$xkdskep='SKEP PENSIUN';
	}elseif($xkdskep==1){
		$xkdskep='SK PEGAWAI AKTIF';
	}elseif($xkdskep==2){
		$xkdskep='BPKB KENDARAAN';
	}elseif($xkdskep==3){
		$xkdskep='SERTIFIKT TANAH';
	}elseif($xkdskep==4){
		$xkdskep='IJAZAH AKHIR';
	}elseif($xkdskep==5){
		$xkdskep='AKTE NIKAH';
	}else{
		$xkdskep='TAMPA JAMINAN';
	}	
	return $xkdskep;
}
function ket_tagih($xkdkop){
	if($xkdkop==1){
		$xkdkop='BULANAN';
	}elseif($xkdkop==2){
		$xkdkop='HARIAN';
	}else{
		$xkdkop='MINGGUAN';
	}
	return $xkdkop;
}
function ket_tagihh($xkdkop){
	if($xkdkop==1){
		$xkdkop='BULAN';
	}elseif($xkdkop==2){
		$xkdkop='HARI';
	}else{
		$xkdkop='MINGGU';
	}
	return $xkdkop;
}
function ket_kolek($xkolek){
	if ($xkolek==1){
		$xkolek='LANCAR';
	}elseif ($xkolek==2){
		$xkolek='PERHATIAN KHUSUS';
	}elseif ($xkolek==3){
		$xkolek='KURANG LANCAR';
	}elseif ($xkolek==4){
		$xkolek='DIRAGUKAN';
	}else{
		$xkolek='MACET';
	}
	return $xkolek;
}
function alasan_kolek($xkkolek){
	if ($xkkolek==0){
		$xkkolek='NIHIL';
	}elseif ($xkkolek==1){
		$xkkolek='MENINGGAL DUNIA';
	}elseif ($xkkolek==2){
		$xkkolek='JAMINAN TIDAK ADA/PALSU';
	}elseif ($xkkolek==3){
		$xkkolek='DOUBLE PINJAMAN BANK';
	}elseif ($xkkolek==4){
		$xkkolek='PENGURUSAN KLAIM ASURANSI';
	}elseif ($xkkolek==5){
		$xkkolek='GAJI TIDAK TERBIT/STOP';
	}elseif ($xkkolek==6){
		$xkkolek='DEBITUR NAKAL/TIDAK BAIK';
	}elseif ($xkkolek==7){
		$xkkolek='MUTASI GAJI UANG PENSIUN';
	}else{
		$xkkolek='GAJI MINUS/TURUN';
	}
	return $xkkolek;
}
function ket_ditagih($xketnas){
	if($xketnas==0){
		$xketnas='DI TAGIH';
	}else{
		$xketnas='TIDAK DITAGIH';
	}
	return $xketnas;
}
function alasan_ditagih($xkketnas){
	if ($xkketnas==0){
		$xkketnas='NIHIL';
	}elseif ($xkketnas==1){
		$xkketnas='MENINGGAL DUNIA';
	}elseif ($xkketnas==2){
		$xkketnas='JAMINAN TIDAK ADA/PALSU';
	}elseif ($xkketnas==3){
		$xkketnas='DOUBLE PINJAMAN BANK';
	}elseif ($xkketnas==4){
		$xkketnas='PENGURUSAN KLAIM ASURANSI';
	}elseif ($xkketnas==5){
		$xkketnas='GAJI TIDAK TERBIT/STOP';
	}elseif ($xkketnas==6){
		$xkketnas='DEBITUR NAKAL/TIDAK BAIK';
	}elseif ($xkketnas==7){
		$xkketnas='MUTASI GAJI UANG PENSIUN';
	}elseif ($xkketnas==7){
		$xkketnas='GAJI MINUS/TURUN';
	}else{
		$xkketnas='SETOR SENDIRI';
	}
	return $xkketnas;
}
function jenis_klaim($xjenis_klaim){
	if ($xjenis_klaim==0){
		$xjenis_klaim='PP ASURANSI';
	}elseif ($xjenis_klaim==1){
		$xjenis_klaim='PPAP CAD. UMUM PENSIUN';
	}elseif ($xjenis_klaim==2){
		$xjenis_klaim='PPAP CAD UMUM PEGAWAI';
	}elseif ($xjenis_klaim==3){
		$xjenis_klaim='PPAP CAD UMUM MICRO';
	}elseif ($xjenis_klaim==4){
		$xjenis_klaim='PPAP CAD. KHUSUS PENSIUN';
	}elseif ($xjenis_klaim==5){
		$xjenis_klaim='PPAP CAD KHUSU PEGAWAI';
	}elseif ($xjenis_klaim==6){
		$xjenis_klaim='PPAP CAD KHUSUS MICRO';
	}
	return $xjenis_klaim;
}
?>