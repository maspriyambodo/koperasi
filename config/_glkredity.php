<?php $hasil=$result->query_y1("SELECT spokok,sbunga,sadm,slunas,sdenda,glfinalti FROM nabasa.debit1 WHERE kdproduk='$produk' LIMIT 1");if($result->num($hasil)<1) die('Produk Kredit Belum Terdaftar');$row=$result->row($hasil);$spokok=$branch.$row['spokok'].'360';$sbunga=$branch.$row['sbunga'].'360';$slunas=$branch.$row['slunas'].'360';$sdenda=$branch.$row['sdenda'].'360';$sadm=$branch.$row['sadm'].'360';$sfinalti=$branch.$row['glfinalti'].'360';$pp_angsuran=$branch.'213204360';$pp_micro=$branch.'213205360';$gssl_kas=$branch.'101101360';
$spokokx=$row['spokok']; //0
$sbungax=$row['sbunga']; //1
$sadmx=$row['sadm'];//2
$sdendax=$row['sdenda'];//3
$slunasx=$row['slunas'];//4
$sfinaltix=$row['glfinalti'];//5
//$giro_btpnx='102102';//6
$pp_angsuranx='213204';//7
$gssl_kasx='101101';//8
$pp_microx='213205';//9
$file='../json/sandi.json';$json_file = file_get_contents($file);$jfo = json_decode($json_file,TRUE);$huruf = array($spokokx,$sbungax,$sadmx,$sdendax,$slunasx,$sfinaltix,$giro_btpnx,$pp_angsuranx,$gssl_kasx,$pp_microx);$y=0;while ($y<10){$deb1=$huruf[$y];for ($i=0; $i<count($jfo); $i++){if($deb1==$jfo[$i]['nonas']){$namas[$y]=$jfo[$i]['nama'];}}$y++;} ?>