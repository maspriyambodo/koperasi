<?php
ini_set('max_execution_time', 1200);include 'h_atas.php';
$bln=$result->c_d($_POST['bln']);$thn=$result->c_d($_POST['thn']);$t=date_sql($tanggal);$tglakhir=tglAkhirBulan($thn,intval($bln));$m =$thn.'-'.$bln.'-'.$tglakhir;
$text="CREATE TEMPORARY TABLE $userid SELECT a.norek,a.angsurke,a.kdkop,if(SUM(if(a.kdtran=111,a.pokok,0))-SUM(if(a.kdtran=777,a.pokok,0))>0,1,0) as kolek FROM $tabel_payment a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.tanggal<='$m' AND a.kdkop=1 AND b.saldoa!=0 GROUP BY norek,angsurke ORDER BY norek,angsurke;";
$text .="INSERT INTO $userid SELECT a.norek,a.angsurke,a.kdkop,if(SUM(if(a.kdtran=111,a.pokok,0))-SUM(if(a.kdtran=777,a.pokok,0))>0,1,0) as kolek FROM $tabel_payment a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.tanggal<='$t' AND a.kdkop>1 AND b.saldoa!=0 GROUP BY norek,angsurke ORDER BY norek,angsurke;";
$tabelr=$userid.'l';$text .="CREATE TEMPORARY TABLE $tabelr SELECT norek,SUM(kolek) as kolek FROM $userid GROUP BY norek ORDER BY norek;";
$tabelm=$userid.'t';$text .="CREATE TEMPORARY TABLE $tabelm SELECT norek,if(kolek<1,1,if(kolek<3,2,if(kolek<5,3,if(kolek<7,4,5)))) as kolek FROM $tabelr ORDER BY norek;";
$text .="UPDATE $tabel_kredit a JOIN $tabelm b ON a.norek=b.norek SET a.kolek=b.kolek;";
$tabel =$tabel_tetap01.'nomi'.$bln.$thn;
$text .="DROP TABLE IF EXISTS $tabel;";
$text .="CREATE TABLE $tabel SELECT id,branch,norek,nocitra,nopen,sufix,nonas,kdbyr,kkbayar,nmbayar,produk,deb1,pekerjaan,tgtran,nomi,jangka,suku,anuitas,hitbunga,flunas,tbunga,kdkop,saldo,mutdeb,mutkre,memdeb,memkre,saldoa,pokok,bunga,administrasi,kolek,ketkolek,ketnas,kketnas,tgmati,tgklaim,status_klaim,jenis_klaim,jumlah_klaim,jumlah_cair,tgl_cair,user_klaim,user_cair,kdpremi,nopremi,premi,jumprovisi,jumadm,jumbtl,jumpremi,jumrefund,meterai,umur,norekl,produkl,sufixl,plunas,blunas,alunas,dbunga,pot_angsuran,pot_angsuranke,kode_cair,user_input,bussdate FROM $tabel_kredit WHERE saldo!=0 OR mutdeb!=0 OR mutkre!=0 OR memdeb!=0 OR memkre!=0;";
$tabel =$tabel_asuransi.$bln.$thn;
$text .="DROP TABLE IF EXISTS $tabel;";
$text .="CREATE TABLE $tabel SELECT * FROM $tabel_asuransi WHERE saldo_akhir!=0";
$result->multi_x($text);$result->msg_error("Proses Nominatif Kedit  Bulan : ".$bln.'-'.$thn.' Sukses');$result->close();$catat="Proses Nominatif Kredit Bulan ".nmbulan($bln).'-'.$thn;include 'around.php';
?>