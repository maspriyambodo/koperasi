<?php include 'h_atas.php';$bln=$result->c_d($_POST['bln']);$thn=$result->c_d($_POST['thn']);$tabel = $tabel_tagihan.$bln.substr($thn,2,2).'s';$bulanx =$bln.'-'.$thn;$bulan =$bln.$thn;$bln--;if($bln<1){$bln=12; $thn--;$bln=substr("00"."".$bln,-2);}else{$bln=substr("00"."".$bln,-2);}$tabelx =$tabel_tagihan.$bln.substr($thn,2,2).'b';$tabely =$tabel_tagihan.$bln.substr($thn,2,2).'s';$hasil = $result->res("SELECT bulan FROM $tabel WHERE bulan='$bulan' AND kdtran!=111 LIMIT 1");if($hasil){if($result->num($hasil)!=0)$result->msg_error('Proses Tagihan Susulan Tidak Bisa Di Ulang..?');}$hasil = $result->res("DROP TABLE IF EXISTS $tabel");$hasil = $result->res("CREATE TABLE $tabel LIKE nabasa.tem_susulan");$hasil = $result->res("INSERT INTO $tabel SELECT '',a.id AS id_tagihan,a.branch,a.norek,a.sufix,a.nonas,a.nama,a.produk,a.pokok,a.bunga,a.adm,a.jumlah,a.tgtagihan,111 AS kdtran,a.angsurke,a.kdaktif,a.oper,a.bussdate,a.bulan,a.kdkop,a.tanggal,0 AS alasan_tt,'' AS solusi_tt,0 AS kd_tagih FROM $tabelx a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.alasan_tt=9 AND b.kdkop=1 AND b.saldoa>0 AND b.ketnas!=1 GROUP BY a.norek,a.angsurke ORDER BY a.norek,a.angsurke");if($hasil){$hasil=$result->res("INSERT INTO $tabel SELECT '',a.id AS id_tagihan,a.branch,a.norek,a.sufix,a.nonas,a.nama,a.produk,a.pokok,a.bunga,a.adm,a.jumlah,a.tgtagihan,111 AS kdtran,a.angsurke,a.kdaktif,a.oper,a.bussdate,a.bulan,a.kdkop,a.tanggal,0 AS alasan_tt,'' AS solusi_tt,0 AS kd_tagih FROM $tabely a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.alasan_tt=9 AND b.kdkop=1 AND b.saldoa>0 AND b.ketnas!=1 GROUP BY a.norek,a.angsurke ORDER BY a.norek,a.angsurke");$result->msg_error("Proses Rencana Tagihan Susulan Bulan : ".$bulanx.' Sukses');$result->close();$catat="Proses Tagihan Kredit Susulan ".$bulanx.' Oleh '.$userid;include 'around.php';}else{$result->msg_error("Proses Rencana Tagihan Susulan Gagal");}?>