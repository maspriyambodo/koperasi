<?php 
include "h_tetap.php";$bln=$result->c_d($_POST['bln']);$thn=$result->c_d($_POST['thn']);$fieldhari2='bulandk'.substr('00'.$bln,-2);$fieldhari3='bulankk'.substr('00'.$bln,-2);$fieldhari4='bulandm'.substr('00'.$bln,-2);$fieldhari5='bulankm'.substr('00'.$bln,-2);$fieldhari6='bulan'.substr('00'.$bln,-2);$tabel='nabasa.tran';$tabel .=$bln;$tabel .=substr($thn,2,2);$result->query_x1("UPDATE $tabel_sandi SET $fieldhari2=0,$fieldhari3=0,$fieldhari4=0,$fieldhari5=0,$fieldhari6=0");$tabelx=$userid.'2';$result->tem_tabel($tabelx,'akuntansi.tem_labarugi');$text="CREATE TEMPORARY TABLE $userid SELECT branch,norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditmemo FROM $tabel GROUP BY norekgl,branch ORDER BY norekgl,branch;";$tabelx=$userid.'2';$hasil = $result->query_x1("SELECT kode FROM $tabel_kantor ORDER BY kode");if($result->num($hasil)!=0){while($row = $result->row($hasil)){$cabang=$row['kode'];$n=$cabang.'218101360';$text .="INSERT INTO $tabelx SELECT branch,'$n' as norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS kreditmemo FROM $tabel WHERE branch='$cabang' AND substr(norekgl,5,1)>=3 ORDER BY norekgl,branch;";$n=$cabang.'450101360';$text .="INSERT INTO $tabelx SELECT branch,'$n' as norekgl,tanggal,SUM(IF(substr(kdtran,1,1)='2',jumlah,0)) AS debetkas,SUM(IF(substr(kdtran,1,1)='1',jumlah,0)) AS kreditkas,SUM(IF(substr(kdtran,1,1)='4',jumlah,0)) AS debetmemo,SUM(IF(substr(kdtran,1,1)='3',jumlah,0)) AS kreditmemo FROM $tabel WHERE branch='$cabang' AND substr(norekgl,5,1)>=3 ORDER BY norekgl,branch;";}}else{$result->msg_error('Tabel Kantor Tidak Ada...!!');}$text .="INSERT INTO $userid SELECT branch,norekgl,tanggal,debetkas,kreditkas,debetmemo,kreditmemo FROM $tabelx;";$text .="UPDATE $tabel_sandi a JOIN $userid b ON a.norekgssl=b.norekgl SET a.$fieldhari2=b.debetkas,a.$fieldhari3=b.kreditkas,a.$fieldhari4=b.debetmemo,a.$fieldhari5=b.kreditmemo;";if($bln=='01'){$blnl=12;$thnl=$thn-1;$fieldhari1='tahun12a';$tabeln='akuntansi.sandi'.$thnl;$text .="UPDATE $tabel_sandi a JOIN $tabeln b ON a.norekgssl=b.norekgssl SET a.$fieldhari6=IF(a.kode='D',b.$fieldhari1+a.$fieldhari2+a.$fieldhari4-a.$fieldhari3-a.$fieldhari5,b.$fieldhari1+a.$fieldhari3+a.$fieldhari5-a.$fieldhari2-a.$fieldhari4);";}else{$blnl=$bln-1;$thnl=$thn;$fieldhari1='bulan'.substr('00'.$blnl,-2);$text .="UPDATE $tabel_sandi SET $fieldhari6=IF(kode='D',$fieldhari1+$fieldhari2+$fieldhari4-$fieldhari3-$fieldhari5,$fieldhari1+$fieldhari3+$fieldhari5-$fieldhari2-$fieldhari4);";}$tabelr=$userid.'0';$text .="CREATE TEMPORARY TABLE $tabelr SELECT norekgl,norekgsl,SUM($fieldhari2) AS $fieldhari2,SUM($fieldhari3) AS $fieldhari3,SUM($fieldhari4) AS $fieldhari4,SUM($fieldhari5) AS $fieldhari5,SUM($fieldhari6) AS $fieldhari6 FROM $tabel_sandi WHERE substr(nonas,-2)!='00' GROUP BY norekgsl ORDER BY norekgsl;";$text .="UPDATE $tabel_sandi a JOIN $tabelr b ON a.norekgssl=b.norekgsl SET a.$fieldhari2=b.$fieldhari2,a.$fieldhari3=b.$fieldhari3,a.$fieldhari4=b.$fieldhari4,a.$fieldhari5=b.$fieldhari5,a.$fieldhari6=b.$fieldhari6;";$tabel=$userid.'1';$text .="CREATE TEMPORARY TABLE $tabel SELECT norekgl,SUM($fieldhari2) AS $fieldhari2,SUM($fieldhari3) AS $fieldhari3,SUM($fieldhari4) AS $fieldhari4,SUM($fieldhari5) AS $fieldhari5,SUM($fieldhari6) AS $fieldhari6 FROM $tabelr  GROUP BY norekgl ORDER BY norekgl;";$text .="UPDATE $tabel_sandi a JOIN $tabel b ON a.norekgssl=b.norekgl SET a.$fieldhari2=b.$fieldhari2,a.$fieldhari3=b.$fieldhari3,a.$fieldhari4=b.$fieldhari4,a.$fieldhari5=b.$fieldhari5,a.$fieldhari6=b.$fieldhari6";$result->multi_x($text);$result->msg_error("Posting Transaksi Bulan : ".nmbulan($bln).' '.$thn.' Sukses');$result->close();$catat="Posting Transaksi Bulanan Sukses Tanggal : ".$t;include 'around.php';
?>