<?php include '../h_atas.php';?>
<script type="text/javascript">
$(function(){
	$( "#tabs" ).tabs({
		event: "mouseover",
		collapsible: true
	});
});
</script>
<?php
$pilih=$result->c_d($_GET['p']);
$thn=$result->c_d($_GET['thn']);
$branch=$result->c_d($_GET['branch']);
$tabel ='akuntansi.transaksi_'.$thn;
$cabang=$result->namacabang($branch);
include 'qakuntansi520.php';
switch ($pilih){
	default: echo "Halaman tidak ditemukan"; 
	break;
case "1":
	echo '<div id="tabs"><ul>';
	echo '<li style="width:auto" ><a href="#tabs-1">Jurnal Transaksi Kas</a></li>';
	echo '<li style="width:auto" ><a href="#tabs-2">Jurnal Transaksi Memorial</a></li>';
	echo '</ul><div id="tabs-1"><div>';
	$hasil=$result->query_x1("SELECT a.branch,a.nonas,sum(a.debetkas) as debetkas,sum(a.kreditkas) as kreditkas,b.nama,b.produk FROM $userid a JOIN akuntansi.sandim b ON a.nonas=b.nonas WHERE a.debetkas!=0 OR a.kreditkas!=0 GROUP BY a.nonas ORDER BY a.nonas");$desc="JURNAL TRANSAKSI KAS BULAN : ".nmbulan($bln).'-'.$thn;
	include '../judul.php'; 
	if($result->num($hasil)!=0){
		echo '<table width="100%" class="table">';
		include 'fjurnaldebet.php';
		echo '</table>';
	}
	echo '</div></div><div id="tabs-2"><div>';
	$hasil=$result->query_x1("SELECT a.branch,a.nonas,a.debetmemo,a.kreditmemo,b.nama,b.produk FROM $userid a JOIN akuntansi.sandim b ON a.nonas=b.nonas WHERE a.debetmemo!=0 OR a.kreditmemo!=0 ORDER BY a.nonas");
	$desc="JURNAL TRANSAKSI MEMORIAL BULAN : ".nmbulan($bln).'-'.$thn;
	include '../judul.php'; 
	if($result->num($hasil)!=0){
		echo '<table width="100%" class="table">';
		include 'fjurnalkredit.php';
		echo '</table>';
	}
	echo '</div></div></div>';
	$result->close();
	break;
case "2":
	$hasil=$result->query_x1("SELECT a.branch,a.nonas,sum(a.debetkas) as debetkas,sum(a.kreditkas) as kreditkas,b.nama,b.produk FROM $userid a JOIN akuntansi.sandim b ON a.nonas=b.nonas WHERE a.debetkas!=0 OR a.kreditkas!=0 GROUP BY a.nonas ORDER BY a.nonas");
	include 'h_pdf_p.php';
	if($result->num($hasil)!=0){
		$desc="JURNAL TRANSAKSI KAS";
		echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';	
		include 'fjurnaldebet.php';
		echo "</table>";
	}
	$hasil=$result->query_x1("SELECT a.branch,a.nonas,a.debetmemo,a.kreditmemo,b.nama,b.produk FROM $userid a JOIN akuntansi.sandim b ON a.nonas=b.nonas WHERE a.debetmemo!=0 OR a.kreditmemo!=0 ORDER BY a.nonas");
	if($result->num($hasil)!=0){
		$desc='JURNAL TRANSAKSI MEMORIAL';
		echo '<p></p>';
		echo '<table style="border-collapse:collapse;font-size:8pt;font-family: Arial;" width="100%" border="1" cellpadding="3px">';	
		include 'fjurnalkredit.php';
		echo "</table>";
	}
	include 'b_pdf.php';
	$result->close();
	break;
}