<?php 
include "h_tetap.php";$t=date_sql($result->c_d($_POST['tgl1']));
$tgl = date('d',strtotime($t));$bln=date('m',strtotime($t));$thn=date('Y',strtotime($t));
$fieldhari2='haridk'.substr('00'.$tgl,-2);$fieldhari3='harikk'.substr('00'.$tgl,-2);
$fieldhari4='haridm'.substr('00'.$tgl,-2);$fieldhari5='harikm'.substr('00'.$tgl,-2);$fieldhari6='hari'.substr('00'.$tgl,-2);$tabel ='nabasa.tran';$tabel .=$bln;$tabel .=substr($thn,2,2);$hasil=$result->query_x1("SELECT tanggal FROM tanggal ORDER BY tanggal DESC LIMIT 2 OFFSET 1");$ingat= $result->row($hasil);$tgll = date('d',strtotime($ingat['tanggal']));$blnl=date('m',strtotime($ingat['tanggal']));$thnl=date('Y',strtotime($ingat['tanggal']));$fieldhari1='hari'.substr('00'.$tgll,-2);$result->query_x1("UPDATE $tabel_sandi SET $fieldhari2=0,$fieldhari3=0,$fieldhari4=0,$fieldhari5=0,$fieldhari6=0");$tabelx=$userid.'2';$result->tem_tabel($tabelx,'akuntansi.tem_labarugi');$text = "CREATE TEMPORARY TABLE $userid SELECT branch,norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditmemo FROM $tabel WHERE tanggal='$t' GROUP BY norekgl,branch ORDER BY norekgl,branch;";$hasil=$result->query_x1("SELECT kode FROM $tabel_kantor ORDER BY kode");if($result->num($hasil)!=0){while($row = $result->row($hasil)){$cabang=$row['kode'];$n=$cabang.'218101360';$text .="INSERT INTO $tabelx SELECT branch,'$n' as norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditmemo FROM $tabel WHERE tanggal='$t' AND branch='$cabang' AND substr(norekgl,5,1)>=3 ORDER BY norekgl,branch;";$n=$cabang.'450101360';$text .="INSERT INTO $tabelx SELECT branch,'$n' as norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS kreditmemo FROM $tabel WHERE tanggal='$t' AND branch='$cabang' AND substr(norekgl,5,1)>=3 ORDER BY norekgl,branch;";}}else{$result->msg_error('Tabel Kantor Tidak Ada...!!');}$text .="INSERT INTO $userid SELECT branch,norekgl,tanggal,debetkas,kreditkas,debetmemo,kreditmemo FROM $tabelx;";$text .="UPDATE $tabel_sandi a JOIN $userid b ON a.norekgssl=b.norekgl SET a.$fieldhari2=b.debetkas,a.$fieldhari3=b.kreditkas,a.$fieldhari4=b.debetmemo,a.$fieldhari5=b.kreditmemo WHERE a.norekgssl=b.norekgl;";if($thn!=$thnl){$blnl=12;$thnl=$thn-1;$fieldhari1='tahun12a';$tabeln='akuntansi.sandi'.$thnl;$text .="UPDATE $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl SET a.$fieldhari6=IF(a.kode='D',b.$fieldhari1+a.$fieldhari2+a.$fieldhari4-a.$fieldhari3-a.$fieldhari5,b.$fieldhari1+a.$fieldhari3+a.$fieldhari5-a.$fieldhari2-a.$fieldhari4) WHERE a.norekgssl=b.norekgssl;";}else{if($bln!=$blnl){$fieldhari1='bulan'.substr('00'.$blnl,-2);}$text .="UPDATE $tabel_sandi SET $fieldhari6=IF(kode='D',$fieldhari1+$fieldhari2+$fieldhari4-$fieldhari3-$fieldhari5,$fieldhari1+$fieldhari3+$fieldhari5-$fieldhari2-$fieldhari4);";}$tabelr=$userid.'0';$text .="CREATE TEMPORARY TABLE $tabelr SELECT norekgl,norekgsl,SUM($fieldhari2) AS $fieldhari2,SUM($fieldhari3) AS $fieldhari3,SUM($fieldhari4) AS $fieldhari4,SUM($fieldhari5) AS $fieldhari5,SUM($fieldhari6) AS $fieldhari6 FROM $tabel_sandi WHERE substr(nonas,-2)!='00' GROUP BY norekgsl ORDER BY norekgsl;";$text .="UPDATE $tabel_sandi a JOIN $tabelr b ON a.norekgssl=b.norekgsl SET a.$fieldhari2=b.$fieldhari2,a.$fieldhari3=b.$fieldhari3,a.$fieldhari4=b.$fieldhari4,a.$fieldhari5=b.$fieldhari5,a.$fieldhari6=b.$fieldhari6;";$tabels=$userid.'1';$text .="CREATE TEMPORARY TABLE $tabels SELECT norekgl,SUM($fieldhari2) AS $fieldhari2,SUM($fieldhari3) AS $fieldhari3,SUM($fieldhari4) AS $fieldhari4,SUM($fieldhari5) AS $fieldhari5,SUM($fieldhari6) AS $fieldhari6 FROM $tabelr  GROUP BY norekgl ORDER BY norekgl;";$text .="UPDATE $tabel_sandi a JOIN $tabels b ON a.norekgssl=b.norekgl SET a.$fieldhari2=b.$fieldhari2,a.$fieldhari3=b.$fieldhari3,a.$fieldhari4=b.$fieldhari4,a.$fieldhari5=b.$fieldhari5,a.$fieldhari6=b.$fieldhari6;";$result->multi_x($text);$result->msg_error("Posting Transaksi Sukses Tanggal : ".$t.' Sukses');
$result->close();$catat="Posting Transaksi Sukses Tanggal : ".$t;include 'around.php';
?>