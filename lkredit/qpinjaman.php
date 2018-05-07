<?php $tgl1=$result->c_d($_GET['tgl1']);$tgl2=$result->c_d($_GET['tgl2']);$branch=$result->c_d($_GET['branch']);$kdkop =$result->c_d($_GET['kdkop']);$kdsales = $result->c_d($_GET['kdsales']);$pilih=$result->c_d($_GET['p']);$xt=date_angka(date_sql($tgl2));$tabel=$tabel_kredit.$xt;
if($branch=='0111'){
	if ($kdsales=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.kdaktif=1 AND a.tgtran>='$tgl1' AND a.tgtran<='$tgl2' ORDER BY a.produk");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE  a.kdsales='$kdsales' AND a.kdaktif=1 AND a.tgtran>='$tgl1' AND a.tgtran<='$tgl2' ORDER BY a.produk");
	}	
}else{
	if ($kdsales=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.kdaktif=1 AND a.tgtran>='$tgl1' AND a.tgtran<='$tgl2' AND a.branch='$branch' ORDER BY a.produk");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE  a.kdsales='$kdsales' AND a.kdaktif=1 AND a.tgtran>='$tgl1' AND a.tgtran<='$tgl2' AND a.branch='$branch' ORDER BY a.produk");
	}
}
?>