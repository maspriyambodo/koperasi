<?php include "h_tetap.php";
$kkbayar=$result->c_d($_POST["kkbayar"]);
if($kkbayar!=9){
	$hasil=$result->query_lap("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,COUNT(*) AS rekening,b.nmbayar,a.kdtran,b.kkbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.kkbayar='$kkbayar' AND a.branch='$kcabang' GROUP BY a.kdtran,b.kkbayar ORDER BY b.kkbayar");
}else{
	$hasil=$result->query_lap("SELECT SUM(a.pokok) AS pokok,SUM(a.bunga) AS bunga,SUM(a.adm) AS adm,SUM(a.jumlah) AS jumlah,COUNT(*) AS rekening,b.nmbayar,a.kdtran,b.kkbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.branch='$kcabang' GROUP BY a.kdtran,b.kkbayar ORDER BY b.kkbayar");
}
echo '
<table class="table" width="100%">
	<thead>
		<tr class="td" bgcolor="#9dc6c5">
			<th>NO</th>
			<th>KANTOR BAYAR</th>
			<th>POKOK</th>
			<th>BUNGA</th>
			<th>ADM</th>
			<th>JUMLAH</th>
			<th>REKENING</th>
		</tr>
	</thead>
	<tbody>';
		$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;
		$tpokok=0;$tbunga=0;$tadm=0;$jumlah3=0;$jumlah4=0;
		$no=1;$vbayar='';$ybayar='';
		while ($row = $result->row($hasil)) { 
			if ($vbayar!=$row['kkbayar']){ 
				if($no>1){
					echo '
					<tr class="td" bgcolor="#d7f9f9">
						<td colspan="2" align="center">JUMLAH :'.$ybayar.'</td>
						<td align="right">'.number_format($jpokok).'</td>
						<td align="right">'.number_format($jbunga).'</td>
						<td align="right">'.number_format($jadm).'</td>
						<td align="right">'.number_format($jumlah1).'</td>
						<td align="right">'.number_format($jumlah2).'</td>
					</tr>';
					$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;
				}
			}
			if($no%2==0) $clsname="even"; else $clsname="odd";
			echo '
			<tr class="'; if(isset($clsname)) echo $clsname.'">
				<td align="center" width="5px">'.$no.'</td>
				<td>';
					if($row['kdtran']==111){
						$ket='BELUM REALISASI';
					}elseif($row['kdtran']==333){
						$ket='TIDAK TERTAGIH';
					}else{
						$ket='SUDAH REALISASI';
					}
				echo $ket.'
				</td>
				<td align="right">'.number_format($row["pokok"]).'</td>
				<td align="right">'.number_format($row["bunga"]).'</td>
				<td align="right">'.number_format($row["adm"]).'</td>
				<td align="right">'.number_format($row["jumlah"]).'</td>
				<td align="right">'.number_format($row["rekening"]).'</td>
			</tr>';
			$jpokok +=$row["pokok"];
			$jbunga +=$row["bunga"];
			$jadm +=$row["adm"];
			$jumlah1 +=$row["jumlah"];
			$jumlah2 +=$row["rekening"];
			$tpokok +=$row["pokok"];
			$tbunga +=$row["bunga"];
			$tadm +=$row["adm"];
			$jumlah3 +=$row["jumlah"];
			$jumlah4 +=$row["rekening"];
			$no++;
			$vbayar=$row['kkbayar'];
			$ybayar=$row['nmbayar'];
		}
		echo '
		<tr class="td" bgcolor="#d7f9f9">
			<td colspan="2" align="center">JUMLAH :'.$ybayar.'</td>
			<td align="right">'.number_format($jpokok).'</td>
			<td align="right">'.number_format($jbunga).'</td>
			<td align="right">'.number_format($jadm).'</td>
			<td align="right">'.number_format($jumlah1).'</td>
			<td align="right">'.number_format($jumlah2).'</td>
		</tr>
		<tr class="td" bgcolor="#d7f9f9">
			<td colspan="2" align="center">TOTAL</td>
			<td align="right">'.number_format($tpokok).'</td>
			<td align="right">'.number_format($tbunga).'</td>
			<td align="right">'.number_format($tadm).'</td>
			<td align="right">'.number_format($jumlah3).'</td>
			<td align="right">'.number_format($jumlah4).'</td>
		</tr>
	</tbody>
</table>';
?>