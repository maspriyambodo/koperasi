<?php include '../h_tetap.php';?>
<script type="text/javascript">
	$(function(){
		//$( "#tabs" ).tabs({
		//	event: "mouseover",
		//	collapsible: true
		//});
		$( "#tabs" ).tabs({
		    beforeLoad: function(event, ui ) {
		        var anchor = ui.tab.find(".ui-tabs-anchor");  
	    		var urllink = 'akuntansi/'+anchor.attr('href');
	    		var tgl = $("#tgl").val();
				var branch= $("#branch").val();
				var dataString='tgl='+tgl+'&branch='+branch;
				$.ajax({
					type: "GET",
					url : urllink,
					data: dataString,
					beforeSend: function () {
						$("#loading").show();
					},
					success: function(data){
						ui.panel.html(data);
						$("#loading").hide();
					}
				});
				return false;
		    }
	    });	
	});
</script>
<?php
$t=date_sql($result->c_d($_GET['tgl']));
$pilih=$result->c_d($_GET['p']);
$branch=$result->c_d($_GET['branch']);
$bln=date('m',strtotime($t));
$thn=date('Y',strtotime($t));
$tabel = $tabel_transaksi.$bln.substr($thn,2,2);
echo '<input type="hidden" id="branch" name="branch" value="'.$branch.'"/>';
echo '<input type="hidden" id="tgl" name="tgl" value="'.$t.'"/>';
include 'qakuntansi500.php';
$desc="JURNAL TRANSAKSI HARIAN TANGGAL : ".$t;
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	echo '
	<div id="tabs">
		<ul>
			<li><a href="#tabs-1">JURNAL TRANSAKSSI KAS</a></li>
			<li><a href="akuntansi501.php">JURNAL TRANSAKSI MEMORIAL</a></li>
		</ul>
		<div id="tabs-1">';
			if($thn!=$thnxxx) $tabel_sandi='akuntansi.sandi'.$thn;
			$hasil=$result->query_lap("SELECT a.branch,a.nonas,sum(a.debetkas) AS debetkas,SUM(a.kreditkas) AS kreditkas,b.nama,b.produk FROM $userid a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.debetkas!=0 OR a.kreditkas!=0 GROUP BY a.notransaksi,a.nonas ORDER BY a.notransaksi,a.nonas");
			$desc="JURNAL TRANSAKSI KAS HARIAN TANGGAL : ".date_sql($t);
			include '../judul.php'; 
			echo '
			<table width="100%" class="table">';
				include '../akuntansi/fjurnaldebet.php';
				echo '
			</table>
		<div>
	</div>';
	break;
case "2":
	$desc="LAPORAN JURNAL TRANSAKSI HARIAN : ".nmbulan($bln).'-'.$thn;
	$cabang=$result->namacabang($branch);
	$nama_dokumen='Rekap_Setoran'.$bln.$thn;
	ini_set("memory_limit","516M");
	define('_MPDF_PATH','../MPDF60/');
	include(_MPDF_PATH . "mpdf.php");
	$mpdf=new mPDF('utf-8','A4','','',15,10,25,15,10,5);
	$mpdf->SetHTMLHeader('
	<table width="100%" style="vertical-align: bottom; font-family: Arial; font-size: 10pt; color: #000000;">
		<tr>
			<td width="15%"><span ><img src="../logo.jpg" width="90"/></span></td>
			<td width="70%" align="center" style="font-weight: bold;"> '.$desc.'<br>'.$cabang.'</td>
			<td width="15%" ></td>
		</tr>
	</table>');
	ob_start();
	if($thn!=$thnxxx) $tabel_sandi='akuntansi.sandi'.$thn;		
	$hasil=$result->query_lap("SELECT a.branch,a.nonas,sum(a.debetkas) AS debetkas,SUM(a.kreditkas) AS kreditkas,b.nama,b.produk FROM $userid a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.debetkas!=0 OR a.kreditkas!=0 GROUP BY a.notransaksi,a.nonas ORDER BY a.notransaksi,a.nonas");
	echo '
	<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">';
		include '../akuntansi/fjurnaldebet.php';
		echo '
	</table>';
	$html1 = ob_get_contents();
	ob_end_clean();
	ob_start();
	$hasil=$result->query_lap("SELECT a.branch,a.nonas,SUM(a.debetmemo) AS debetmemo,SUM(a.kreditmemo) AS kreditmemo,b.nama,b.produk FROM $userid a JOIN $tabel_sandi b ON a.norekgl=b.norekgssl WHERE a.debetmemo!=0 OR a.kreditmemo!=0 GROUP BY a.noreferensi,a.norekgl ORDER BY a.noreferensi,a.norekgl");
	echo '
	<table style="border-collapse: collapse;font-family: Arial;font-size: 7pt;" width="100%" border="1" cellpadding="2px">';
		include '../akuntansi/fjurnalkredit.php';
		echo '
	</table>';
	$html2 = ob_get_contents();
	ob_end_clean();	
	$mpdf->SetFooter('Tanggal Cetak : {DATE j-m-Y}| |{PAGENO}');
	$mpdf->packTableData =true;
	$mpdf->simpleTables = true;
	$mpdf->WriteHTML($html1);
	$mpdf->AddPage('','NEXT-ODD','','','','','','','','','','','','','',1,1,0,0);
	$mpdf->WriteHTML($html2);
	$mpdf->Output($nama_dokumen.".pdf" ,'I');
	exit;
	break;
}