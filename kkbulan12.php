<?php include "h_tetap.php";
$kkbayar=$result->c_d($_POST["kkbayar"]);
if($kkbayar!=9){
	$hasil=$result->query_lap("SELECT a.id,a.norek,a.nama,b.nocitra,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.kkbayar FROM $tabelTagihan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.kkbayar='$kkbayar' AND a.branch='$kcabang' AND a.kdtran=777 ORDER BY kdtran,nama,nocitra,norek");
}else{
	$hasil=$result->query_lap("SELECT a.id,a.norek,a.nama,b.nocitra,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,b.kkbayar FROM $tabelTagihan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.branch='$kcabang' AND a.kdtran=777 ORDER BY a.nama,b.nocitra,a.norek");	
}
echo '<table class="table" width="100%">
	<thead>
		<tr class="td" bgcolor="#b6b5ad">
			<th>NO</th><th>NOREK</th><th>NOREK LAIN</th><th>NOPEN</th><th>NAMA</th><th>POKOK</th><th>BUNGA</th><th>ADM</th><th>JUMLAH</th><th>KE</th>
		</tr>
	</thead>
	<tbody>';
		$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$no=1;$vbayar='';
		$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah2=0;
		while ($row = $result->row($hasil)) { 
			if ($vbayar!=$row['kdtran']){ 
				if($no>1){
					echo '<tr class="td" bgcolor="#b6b5ad">
						<td colspan="5" align="center">'.$ket.'</td>
						<td align="right">'.number_format($jpokok).'</td>
						<td align="right">'.number_format($jbunga).'</td>
						<td align="right">'.number_format($jadm).'</td>
						<td align="right">'.number_format($jumlah1).'</td>
						<td align="right" colspan="4">&nbsp;</td>
					</tr>';
					$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$no=1;
				}
			}
			if($no%2==0) $clsname="even"; else $clsname="odd";
			echo '<tr class="'; if(isset($clsname)) echo $clsname.'">
			<td align="center" width="5px">'.$no.'</td>
			<td>'.$row["norek"].'</td>
			<td>'.$row["nocitra"].'</td>
			<td>'.$row["nopen"].'</td>
			<td>'.$row["nama"].'</td>
			<td align="right">'.format_ribuan($row["pokok"]).'</td>
			<td align="right">'.format_ribuan($row["bunga"]).'</td>
			<td align="right">'.format_ribuan($row["adm"]).'</td>
			<td align="right">'.format_ribuan($row["jumlah"]).'</td>
			<td align="center">'.$row["angsurke"].'</td>';
			$jpokok +=$row["pokok"];
			$jbunga +=$row["bunga"];
			$jadm +=$row["adm"];
			$jumlah1 +=$row["jumlah"];
			$no++;
			$vbayar=$row['kdtran'];
		}
		echo '<tr class="td" bgcolor="#b6b5ad">
			<td colspan="5" align="center">JUMLAH REALISASI</td>
			<td align="right">'.number_format($jpokok).'</td>
			<td align="right">'.number_format($jbunga).'</td>
			<td align="right">'.number_format($jadm).'</td>
			<td align="right">'.number_format($jumlah1).'</td>
			<td align="right">&nbsp;</td>
		</tr>
	</tbody>
</table>';
?>