<?php
	if($kode_inventaris==0){
		$xkode_inventaris='NON KATEGORI';
	}elseif($kode_inventaris==1){
		$xkode_inventaris='PERALATAN KANTOR';
	}elseif($kode_inventaris==2){
		$xkode_inventaris='PERALATAN MEUBEL';
	}elseif($kode_inventaris==3){
		$xkode_inventaris='PERALATAN KOMPUTER';
	}elseif($kode_inventaris==4){
		$xkode_inventaris='GEDUNG KANTOR';
	}elseif($kode_inventaris==5){
		$xkode_inventaris='PERALATAN ELEKTRONIK';
	}else{
		$xkode_inventaris='LAINNYA';
	}
?>