<?php
$branch=$result->c_d($_GET['branch']);
$produk = $result->c_d($_GET['produk']);
$bln=$result->c_d($_GET['bln']);
$thn=$result->c_d($_GET['thn']);
$pilih=$result->c_d($_GET['p']);
$tabel =$tabel_nominatif.$bln.$thn;
if($branch=='0111'){
	if($produk=='9'){
		$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.kdkop,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,a.tgtran,a.jangka,a.suku,a.kolek,a.produk,b.kdsales,c.nama as namas,d.nmproduk,e.lurah,e.pekerjaan1,f.nmkb,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_nasabah e ON a.nonas=e.nonas JOIN wkb f ON a.kdbyr=f.kd ORDER BY a.norek");
	}else{
		$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.kdkop,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,a.tgtran,a.jangka,a.suku,a.kolek,a.produk,b.kdsales,c.nama as namas,d.nmproduk,e.lurah,e.pekerjaan1,f.nmkb,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_nasabah e ON a.nonas=e.nonas JOIN wkb f ON a.kdbyr=f.kd WHERE a.produk='$produk' ORDER BY a.norek");
	}
}else{
	if($produk=='9'){
		$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.kdkop,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,a.tgtran,a.jangka,a.suku,a.kolek,a.produk,b.kdsales,c.nama as namas,d.nmproduk,e.lurah,e.pekerjaan1,f.nmkb,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_nasabah e ON a.nonas=e.nonas JOIN wkb f ON a.kdbyr=f.kd WHERE a.branch='$branch' ORDER BY a.norek");
	}else{
		$result->query_x1("CREATE TEMPORARY TABLE $userid SELECT a.kdkop,a.kdbyr,a.kkbayar,a.nmbayar,a.nomi,a.tgtran,a.jangka,a.suku,a.kolek,a.produk,b.kdsales,c.nama as namas,d.nmproduk,e.lurah,e.pekerjaan1,f.nmkb,a.saldo,a.mutdeb,a.mutkre,a.memdeb,a.memkre,a.saldoa FROM $tabel a JOIN $tabel_kredit b ON a.norek=b.norek JOIN sales c ON b.kdsales=c.idsales JOIN debit1 d ON a.produk=d.kdproduk JOIN $tabel_nasabah e ON a.nonas=e.nonas JOIN wkb f ON a.kdbyr=f.kd WHERE a.branch='$branch' AND a.produk='$produk' ORDER BY a.norek");
	}
}
?>