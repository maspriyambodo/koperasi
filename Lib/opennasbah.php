<?php
$hasil=$result->query_x1("SELECT branch,nonas,nama,DATE_FORMAT(tgllahir,'%d-%m-%Y') as tgllahir,tmplahir,noktp,DATE_FORMAT(masaktp,'%d-%m-%Y') as masaktp,npwp,jkelamin,agama,pendidikan,namaibu,tanggungan,tlprumah,tlpfax,tlphp1,tlphp2,alamat,lurah,camat,kdpos,kota,propinsi,negara,lamarmh,pekerjaan1,pekerjaan2,alamatb,lurahb,camatb,kdposb,kotab,npwpu,usaha1,usaha2,alamatu,lurahu,camatu,kdposu,kotau,propinsiu,bidang,tlpfaxu,tlphpu,hasilk,pkotor,hasilb,pbersih,pbank,plain,sumberl,slain,sistri,kstatus,rumah,tujuanrek,propinsib FROM $tabel_nasabah where id='$id' LIMIT 1");
$row=$result->row($hasil);
?>