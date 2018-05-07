<?php 
$branch=$result->c_d($_GET['branch']);$tgl1=$result->c_d($_GET['tgl1']);$tgl2=$result->c_d($_GET['tgl2']);
if($ada==FALSE){
	if($branch=='9'){
		$hasil=$result->query_lap("SELECT SUM(a.jumlah_klaim) AS jumlah,SUM(a.plafond) AS nomi,SUM(a.saldo) AS saldo,count(*) AS orang,a.jenis_klaim,b.produk,b.kdpremi,c.nmproduk,d.nama_asuransi FROM $tabel_klaim a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk LEFT JOIN $tabel_asuransip d ON b.kdpremi=d.kode_asuransi WHERE a.tgl_klaim>='$tgl1' AND a.tgl_klaim<='$tgl2' AND a.kode_hapus=0 AND a.status_klaim>=1 AND a.kode_cair=0 GROUP BY b.produk,a.jenis_klaim,b.kdpremi ORDER BY b.produk,a.jenis_klaim,b.kdpremi");
	}else{
		$hasil=$result->query_lap("SELECT SUM(a.jumlah_klaim) AS jumlah,SUM(a.plafond) AS nomi,SUM(a.saldo) AS saldo,count(*) AS orang,a.jenis_klaim,b.produk,b.kdpremi,c.nmproduk,d.nama_asuransi FROM $tabel_klaim a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk LEFT JOIN $tabel_asuransip d ON b.kdpremi=d.kode_asuransi WHERE a.tgl_klaim>='$tgl1' AND a.tgl_klaim<='$tgl2' AND a.kode_hapus=0 AND a.status_klaim>=1 AND a.kode_cair=0 AND b.branch='$branch' GROUP BY b.produk,a.jenis_klaim,b.kdpremi ORDER BY b.produk,a.jenis_klaim,b.kdpremi");
	}
}else{
	if($branch=='9'){
		$hasil=$result->query_lap("SELECT a.norek,a.nama,a.tgl_lahir,a.tmp_lahir,a.tgl_mati,a.tmp_mati,a.sebab_mati,a.ket_mati,a.tgl_klaim,a.jenis_klaim,a.tgl_jatuh_tempo,a.plafond,a.saldo,a.jumlah_klaim,a.user_klaim,c.nmproduk,b.produk,b.kdkop,b.umur,b.jangka,b.tgtran,b.kdpremi,b.nopremi FROM $tabel_klaim a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk WHERE a.tgl_klaim>='$tgl1' AND a.tgl_klaim<='$tgl2' AND a.kode_hapus=0 AND a.status_klaim>=1 AND a.kode_cair=0 ORDER BY b.produk,a.jenis_klaim,a.norek");
	}else{
		$hasil=$result->query_lap("SELECT a.norek,a.nama,a.tgl_lahir,a.tmp_lahir,a.tgl_mati,a.tmp_mati,a.sebab_mati,a.ket_mati,a.tgl_klaim,a.jenis_klaim,a.tgl_jatuh_tempo,a.plafond,a.saldo,a.jumlah_klaim,a.user_klaim,c.nmproduk,b.produk,b.kdkop,b.umur,b.jangka,b.tgtran,b.kdpremi,b.nopremi FROM $tabel_klaim a JOIN $tabel_kredit b ON a.norek=b.norek JOIN debit1 c ON b.produk=c.kdproduk WHERE a.tgl_klaim>='$tgl1' AND a.tgl_klaim<='$tgl2' AND a.kode_hapus=0 AND a.status_klaim>=1 AND a.kode_cair=0 AND b.branch='$branch' ORDER BY b.produk,a.jenis_klaim,a.norek");
	}
}
?>