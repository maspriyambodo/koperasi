<?php
function date_sql($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
	}
	return $date;
}
function date_angka($date){
	$exp = explode('-',$date);
	if(count($exp) == 3) {
		$date = $exp[1].''.substr($exp[2],2,2);
	}
	return $date;
}
function keangka($angka){
	$angka = str_replace('.','',$angka);
	return $angka;
}
function write_log($log){  
	$dtime=@date('[Ydm]');
	define('LOG','logfile/'.$dtime.'log.txt');
	$time = @date('[Y-d-m:H:i:s]');
	$op=$time.' || '.'Action for '.$log."\n".PHP_EOL;
	$fp = @fopen(LOG, 'a');
	$write = @fwrite($fp, $op);
	@fclose($fp);
}
function nmbulan($nmbulan){
	$namabulan = array("","Januari","Pebruari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$nmbulan=$namabulan[(int)$nmbulan];
	return $nmbulan;
}
function age($birthday){
	list($year,$month,$day) = explode("-",$birthday);
	$year_diff = date("Y") - $year;
	$month_diff = date("m") - $month;
	$day_diff = date("d") - $day;
	if ($month_diff < 0) $year_diff--;
	elseif (($month_diff==0) && ($day_diff < 0)) $year_diff--;
	return $year_diff;
}
function formatrp($nilaiUang){
	$nilaiRupiah="";
	$jumlahAngka=strlen($nilaiUang);
	while($jumlahAngka>3){
		$nilaiRupiah=".".substr($nilaiUang,-3) . $nilaiRupiah;
		$sisaNilai=strlen($nilaiUang) - 3;
		$nilaiUang=substr($nilaiUang,0,$sisaNilai);
		$jumlahAngka=strlen($nilaiUang);
	}
	$nilaiRupiah="".$nilaiUang.$nilaiRupiah;
	return $nilaiRupiah;
}
function formatRupiah($nilaiUang){
	$nilaiRupiah="";
	$jumlahAngka=strlen($nilaiUang);
	while($jumlahAngka > 3){
		$nilaiRupiah= "." . substr($nilaiUang,-3) . $nilaiRupiah;
		$sisaNilai= strlen($nilaiUang) - 3;
		$nilaiUang= substr($nilaiUang,0,$sisaNilai);
		$jumlahAngka = strlen($nilaiUang);
	}
	$nilaiRupiah= "Rp " . $nilaiUang . $nilaiRupiah . ",-";
	return $nilaiRupiah;
} 
function format_ribuan ($nilai){
	return number_format ($nilai, 0, ',', '.');
}
function tglAkhirBulan($thn,$bln){
	$bulan[1]='31';$bulan[2]='28';$bulan[3]='31';$bulan[4]='30';$bulan[5]='31';$bulan[6]='30';$bulan[7]='31';$bulan[8]='31';$bulan[9]='30';$bulan[10]='31';$bulan[11]='30';$bulan[12]='31';
	if ($thn%4==0){
		$bulan[2]='29';
	}
	return $bulan[$bln];
}
function bulat_tag($total,$yadm){
	$yadm=1000-(($total-intval($total))*1000);
	$yadm=intval($yadm+0.5);
	if ($yadm<=0 || $yadm>=1000){
		$yadm=0;
	}
	return $yadm;
}
function bulan($start, $end, $period){
	$day = 0;
	$month = 0;
	$month_array = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
	$datestart = strtotime($start);
	$dateend = strtotime($end);
	$month_start = strftime("%m", $datestart);
	$current_year = strftime("%y", $datestart);
	$diff = $dateend - $datestart;
	$date = $diff / (60 * 60 * 24);
	$day = $date;
	$awal = 1;
	while($date > 0){
		if($awal){
			$loop = $month_start - 1;
			$awal = 0;
		}else{
	
		}
	for ($i = $loop; $i < 12; $i++){
		if($current_year % 4 == 0 && $i == 1)
			$day_of_month = 29;
		else
			$day_of_month = $month_array[$i];
			$date -= $day_of_month;
			if($date <= 0){
				if($date == 0)
					$month++;
					break;
				}
				$month++;
			}
			$current_year++;
	}
	switch($period){
		case "day"   : return $day; break;
		case "month" : return $month; break;
		case "year"  : return intval($month / 12); break;
	}
}
function is_expired($expired_date) {
	list($year, $month, $day) = explode('-', $expired_date);
	$new_expired_date = sprintf('%04d%02d%02d', $year, $month, $day);
	$date_now = date("Y-m-d");
	if ($new_expired_date > $date_now) {
		return false;
	} else {
		return true;
	}
}
function hitungHari($awal,$akhir){
	$tglAwal = strtotime($awal);
	$tglAkhir = strtotime($akhir);
	$jeda = abs($tglAkhir - $tglAwal);
	return floor($jeda/(60*60*24));
}
function hitungMinggu($tgl_awal,$tgl_akhir){
	$detik = 24 * 3600;
	$tgl_awal = strtotime($tgl_awal);
	$tgl_akhir = strtotime($tgl_akhir);
	$minggu = 0;
	for ($i=$tgl_awal; $i < $tgl_akhir; $i += $detik){
		if (date("w", $i) == "0"){
			$minggu++;
		}
	}
	return $minggu;
}
function cekTanggal($tgl){
	$bln=date('m',strtotime($tgl));
	$thn=date('Y',strtotime($tgl));
	$tgl=date('d',strtotime($tgl));
	$periksa = checkdate($bln,$tgl,$thn);
	if(!$periksa){
		return false;
	}else{
		return true;
	}
}
function terbilang($satuan){ $huruf = array ("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh","sebelas"); if ($satuan < 12) return " ".$huruf[$satuan]; elseif ($satuan < 20) return terbilang($satuan - 10)." belas"; elseif ($satuan < 100) return terbilang($satuan / 10)." puluh".terbilang($satuan % 10); elseif ($satuan < 200) return "seratus".terbilang($satuan - 100); elseif ($satuan < 1000) return terbilang($satuan / 100)." ratus".terbilang($satuan % 100); elseif ($satuan < 2000) return "seribu".terbilang($satuan - 1000); elseif ($satuan < 1000000) return terbilang($satuan / 1000)." ribu".terbilang($satuan % 1000); elseif ($satuan < 1000000000) return terbilang($satuan / 1000000)." juta".terbilang($satuan % 1000000); elseif ($satuan >= 1000000000) echo "Angka yang Anda masukkan terlalu besar"; } 
function HashPassword($input){
	$salt = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM));
	$hash = hash("sha256", $salt . $input);
	$final = $salt . $hash;
	return $final;
}
?>