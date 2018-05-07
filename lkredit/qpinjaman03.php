<?php $bln=$result->c_d($_GET['bln']);$thn=$result->c_d($_GET['thn']);$branch=$result->c_d($_GET['branch']);$produk=$result->c_d($_GET['kdsales']);$pilih=$result->c_d($_GET['p']);$tabel=$tabel_kredit.$bln.substr($thn,2,2);
if($branch=='0111'){
	if ($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.kdaktif=1 ORDER BY a.produk");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.produk='$produk' AND a.kdaktif=1 ORDER BY a.produk");
	}	
}else{
	if ($produk=='9'){
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.kdaktif=1 AND a.branch='$branch' ORDER BY a.produk");
	}else{
		$hasil=$result->query_lap("SELECT a.branch,a.nonas,a.sufix,a.norek,a.noreks,a.produk,a.nomi,a.jangka,a.suku,a.tgtran,a.kdkop,a.meterai,a.premi,a.jumpremi,a.jumrefund,a.jumprovisi,a.jumadm,a.jumbtl,a.simpokok,a.simwajib,a.plunas,a.blunas,a.alunas,a.dbunga,a.simpokok,a.simwajib,a.kdpin,a.kdaktif,a.kdsales,a.pokok,a.bunga,a.administrasi,a.kdangsur,a.pot_angsuran,a.jum_period,b.nama,c.nmproduk FROM $tabel a JOIN nasabah b ON a.nonas=b.nonas JOIN debit1 c ON a.produk=c.kdproduk WHERE a.produk='$produk' AND a.kdaktif=1 AND a.branch='$branch' ORDER BY a.produk");
	}
}
?>