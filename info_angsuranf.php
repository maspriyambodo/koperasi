<?php
echo "<thead>";
echo "<tr class='td' bgcolor='#e5e5e5'>";
echo "<th>NO</th>";
echo "<th>TANGGAL</th>";
echo "<th>URAIAN</th>";
echo "<th>POKOK</th>";
echo "<th>BUNGA</th>";
echo "<th>ADM</th>";
echo "<th>DENDA</th>";
echo "<th>FINALTY</th>";
echo "<th>JUMLAH</th>";
echo "<th>SALDO</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
echo "<tr><td align='left' colspan='9'>".$tes."</td><td align='right'>".formatrp($saldo)."</td></tr>";
$no=1;$vbayar="";
$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jfinalty=0;$jjumlah=0;
while ($row = $result->row($hasil)) {
	if($row['jtransaksi']!=88){ 
		if($row['jtransaksi']==90 || $row['jtransaksi']==80 || $row['jtransaksi']==20){
			$saldo=$saldo+$row['pokok'];
			echo "<tr bgcolor='#13fba4'>";
		}else{
			$saldo=$saldo-$row['pokok'];
			echo "<tr>";	
		}
		echo "<td>".$no."</td>";
		echo "<td>".$row['tanggal']."</td>";
		echo "<td>".$row['keterangan']."</td>";
		echo "<td align='right'>".formatrp($row['pokok'])."</td>";
		echo "<td align='right'>".formatrp($row['bunga'])."</td>";
		echo "<td align='right'>".formatrp($row['adm'])."</td>";
		echo "<td align='right'>".formatrp($row['denda'])."</td>";
		echo "<td align='right'>".formatrp($row['finalty'])."</td>";
		echo "<td align='right'>".formatrp($row['jumlah'])."</td>";
		echo "<td align='right'>".formatrp($saldo)."</td>";
		echo "</tr>";
		$jpokok=$jpokok+$row['pokok'];
		$jbunga=$jbunga+$row['bunga'];
		$jadm=$jadm+$row['adm'];
		$jdenda=$jdenda+$row['denda'];
		$jfinalty=$jfinalty+$row['finalty'];
		$jjumlah=$jjumlah+$row['jumlah'];
		$no++;			
	}
}
echo "<tr class='td' bgcolor='#e5e5e5'>";
echo "<td colspan='3' align='center'>JUMLAH </td>";
echo "<td align='right'>".formatrp($jpokok)."</td>";
echo "<td align='right'>".formatrp($jbunga)."</td>";
echo "<td align='right'>".formatrp($jadm)."</td>";
echo "<td align='right'>".formatrp($jdenda)."</td>";
echo "<td align='right'>".formatrp($jfinalty)."</td>";
echo "<td align='right'>".formatrp($jjumlah)."</td>";
echo "<td align='right'>&nbsp;</td>";
echo "</tr>";
echo "</tbody>";
?>