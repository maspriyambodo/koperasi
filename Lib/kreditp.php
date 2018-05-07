<?php
$resultt = $result->query_x1("SELECT spokok,sbunga,sadm,sdenda,slunas,glfinalti FROM debit1 WHERE kdproduk='$produk' LIMIT 1");
if($result->num($resultt)==0){ 
	die("Data Produk Kredit Tidak Ditemukan...?  ");
}
$roww=$result->row($resultt);
$spokok=$branch.$roww['spokok'].'360';
$sbunga=$branch.$roww['sbunga'].'360';
$slunas=$branch.$roww['slunas'].'360';
$sdenda=$branch.$roww['sdenda'].'360';
$sadm=$branch.$roww['sadm'].'360';
$sfinaltix=$branch.$roww['glfinalti'].'360';
$giro_btpn=$branch.'102102360';
$pp_angsuran=$branch.'213205360';
$gssl_kas=$branch.'101101360';
$spokokx=$roww['spokok']; //0
$sbungax=$roww['sbunga']; //1
$sadmx=$roww['sadm'];//2
$sdendax=$roww['sdenda'];//3
$slunasx=$roww['slunas'];//4
$sfinaltix=$roww['glfinalti'];//5
$giro_btpnx='102102';//6
$pp_angsuranx='213205';//7
$gssl_kasx='101101';//8
// copy file content into a string var
$file='json/sandi.json';
$json_file = file_get_contents($file);
$jfo = json_decode($json_file,TRUE);
//print_r($jfo);
$huruf = array($spokokx,$sbungax,$sadmx,$sdendax,$slunasx,$sfinaltix,$giro_btpnx,$pp_angsuranx,$gssl_kasx);
$y=0;
while ($y<9) {
	$deb1=$huruf[$y];
	for ($i=0; $i<count($jfo); $i++) {
		if($deb1==$jfo[$i]['nonas']){
			$namas[$y]=$jfo[$i]['nama'];
		}
	}
	$y++;
} 
?>