<?php 
include 'h_tetap.php';
$tgl1=$result->c_d($_GET['tgl1']);
$tgl2=$result->c_d($_GET['tgl2']);
$hari=date('w',strtotime($tgl2));
if($hari==0) die('Tanggal Selanjutnya Hari Minggu...?');
if($tgl1==$tgl2)die('Tanggal Tidak Boleh Sama...?');
$hasil = $result->query_y1("SELECT status AS saldo FROM $tabel_user WHERE status=1 LIMIT 2");
if($result->num($hasil)>1)die('Masih Ada User ID Yang On Line..?');
$hasil = $result->query_y1("SELECT SUM(saldo_akhir) AS saldo FROM nabasa.tbl_bloter");
$bln=date('m',strtotime($tgl1));
$thn=date('Y',strtotime($tgl1));
$tglakhir=tglAkhirBulan($thn,intval($bln));
$m = $thn.'-'.$bln.'-'.$tglakhir;
$text="CREATE TEMPORARY TABLE $userid SELECT a.norek,a.angsurke,a.kdkop,if(SUM(if(a.kdtran=111,a.pokok,0))-SUM(if(a.kdtran=777,a.pokok,0))>0,1,0) as kolek FROM $tabel_payment a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.tanggal<='$m' AND a.kdkop=1 AND b.saldoa!=0 GROUP BY norek,angsurke ORDER BY norek,angsurke;";
$text .="INSERT INTO $userid SELECT a.norek,a.angsurke,a.kdkop,if(SUM(if(a.kdtran=111,a.pokok,0))-SUM(if(a.kdtran=777,a.pokok,0))>0,1,0) as kolek FROM $tabel_payment a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.tanggal<='$tgl1' AND a.kdkop>1 AND b.saldoa!=0 GROUP BY norek,angsurke ORDER BY norek,angsurke;";
$tabelr=$userid.'l';
$text .="CREATE TEMPORARY TABLE $tabelr SELECT norek,SUM(kolek) as kolek FROM $userid GROUP BY norek ORDER BY norek;";
$tabelm=$userid.'t';
$text .="CREATE TEMPORARY TABLE $tabelm SELECT norek,if(kolek<1,1,if(kolek<3,2,if(kolek<5,3,if(kolek<7,4,5)))) as kolek FROM $tabelr ORDER BY norek;";
$text .="UPDATE $tabel_kredit a JOIN $tabelm b ON a.norek=b.norek SET a.kolek=b.kolek;";
$text .="UPDATE nabasa.tbl_bloter SET mutasi_debet=0,mutasi_kredit=0;";
$text .="INSERT INTO nabasa.tanggal(tanggal,keterangan,oper,bussdate) VALUES('$tgl2','CLOSING AKHIR HARI','$userid',now())";
$result->multi_x($text);echo 'Sukses';
$result->close();$catat="Closing Akhir Hari ".$tgl1;
include 'around.php';
?>