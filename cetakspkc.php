<?php include 'h_tetap.php';$id=$result->c_d($_GET['mnorek']);$hasil=$result->query_lap("SELECT a.nonas,a.norek,a.notran,a.tgtran,a.nomi,a.jangka,a.suku,a.kdkop,a.branch,a.produk,a.pokok,a.bunga,a.administrasi,a.kdaktif,b.nama FROM $tabelKredit a JOIN $tabel_nasabah b ON a.nonas=b.nonas WHERE a.id='$id'");$r=$result->row($hasil);$xkdkop=ket_tagihh($r['kdkop']);$nomi=$r['nomi'];$hasil="SELECT pokok,bunga,adm,jumlah,kdtran,tgtagihan,angsurke,bulan FROM $tabel_payment WHERE norek='".$r['norek']."' ORDER BY angsurke,kdtran";if($r['kdaktif']!=1){$hasil="SELECT pokok,bunga,adm,jumlah,kdtran,tgtagihan,angsurke,bulan FROM $temPayment WHERE norek='".$r['norek']."' ORDER BY angsurke,kdtran";}$hasil=$result->query_lap($hasil);ini_set("memory_limit","516M");$nama_dokumen='PDF With MPDF';define('_MPDF_PATH','MPDF60/');include(_MPDF_PATH . "mpdf.php");$mpdf=new mPDF('utf-8','A4','','',15,10,25,15,10,10);$mpdf->SetHTMLHeader('<table width="100%" style="vertical-align: bottom;font-family:sans-serif;font-size:8pt;color:#000000;"><tr><td width="20%"><span ><img src="logo.jpg" width="90"/></span></td><td width="60%" align="center" style="font-size:12pt;" valign="middle">JADWAL ANGSURAN KREDIT</td><td width="20%" ></td></tr></table>');ob_start();?>
<table style="font-size:8pt;font-family:Arial;border-collapse:collapse;" width="100%" align="left" cellpadding="3px">
	<tr>
		<th width="25%" align="left">NAMA</th>
		<th width="75%" align="left">: <?php echo $r['nama'] ;?></th>
	</tr>
	<tr>
		<th align="left">NO REKENING</th>
		<th align="left">: <?php echo $r['produk'].'-'.$r['norek'].' [ '.$r['nonas'].' ]' ;?></th>
	</tr>
	<tr>
		<th align="left">NOMINAL / TG TRANSAKSI</th>
		<th align="left">: <?php echo formatRupiah($r['nomi'])." / ".date_sql($r['tgtran']) ;?></th>
	</tr>
	<tr>
		<th align="left">JANGKA WAKTU / SUKU BUNGA</th>
		<th align="left">: <?php echo $r['jangka'].' '.$xkdkop." / ".$r['suku'] ;?> %</th>
	</tr>
</table>	
<table style="font-size:8pt;font-family:Arial;border-collapse:collapse;" width="100%" border="1" align="left" cellpadding="3px">
	<thead>
		<tr class="td" bgcolor="#e5e5e5">
			<th width="5%">NO</th>
			<th width="20%">KETERANGAN</th>
			<th>TANGGAL</th>
			<th>POKOK</th>
			<th>BUNGA</th>
			<th>ADM</th>
			<th>JUMLAH</th>
			<th>SALDO</th>
			<th>KE</th>
		</tr>
	</thead>
	<tbody> <?php
		$no=1;  
		$jpokok=0;$jbunga=0;$jadm=0;$jangsur=0;
		$tpokok=0;$tbunga=0;$tadm=0;$tangsur=0;
		while($row=$result->row($hasil)){ 
			$pokok=$row['pokok'];
			$bunga=$row['bunga'];
			$adm=$row['adm'];
			$kdtran=$row['kdtran']; 
			$bulan=$row['bulan']; 
			if($row['kdtran']=='777'){ ?>
				<tr>
					<td align="left"><?php echo $no;?></td>
					<td align="left"><?php echo 'Bayar Angsuran Pinjaman';?></td>
					<td align="left"><?php echo date('d-M-Y',strtotime($row['tgtagihan']));?></td>
					<td align="right"><?php echo number_format($row['pokok']);?></td>
					<td align="right"><?php echo number_format($row['bunga']);?></td>
					<td align="right"><?php echo number_format($row['adm']);?></td>
					<td align="right"><?php echo number_format($row['jumlah']);?></td>
					<td align="right"><?php echo number_format($nomi);?></td>
					<td align="center"><?php echo $row['angsurke'];?></td>
				</tr> <?php
				$jpokok=$jpokok+$pokok;
				$jbunga=$jbunga+$bunga;
				$jadm=$jadm+$adm;
			}else{ 
				$kete='Tagihan Angsuran';
				$nomi=$nomi-$row['pokok'];?>
				<tr>
					<td align="left"><?php echo $no;?></td>
					<td align="left"><?php echo $kete;?></td>
					<td align="left"><?php echo date('d-M-Y',strtotime($row['tgtagihan']));?></td>
					<td align="right"><?php echo number_format($row['pokok']);?></td>
					<td align="right"><?php echo number_format($row['bunga']);?></td>
					<td align="right"><?php echo number_format($row['adm']);?></td>
					<td align="right"><?php echo number_format($row['jumlah']);?></td>
					<td align="right"><?php echo number_format($nomi);?></td>
					<td align="center"><?php echo $row['angsurke'];?></td>
				</tr> <?php
				$tpokok=$tpokok+$pokok;
				$tbunga=$tbunga+$bunga;
				$tadm=$tadm+$adm;
			}
			$no++;
		}?>
		<tr class="item1">
			<td colspan="3" align="center">JUMLAH</td>
			<td align="right" ><?php echo number_format($tpokok-$jpokok);?></td>
			<td align="right" ><?php echo number_format($tbunga-$jbunga);?></td>
			<td align="right" ><?php echo number_format($tadm-$jadm);?></td>
			<td colspan="2">&nbsp;</td>
		</tr>
	</tbody>
</table>
<?php
$html = ob_get_contents(); 
ob_end_clean();
$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
//$mpdf->useSubstitutions=false;
$mpdf->packTableData =true;
$mpdf->simpleTables = true;
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen.".pdf" ,'I');
exit;
?>