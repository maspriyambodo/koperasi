<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
$(document).ready(function () {
	$("#posting").button().on("click",function(){
		var r = confirm("Anda Yakin Posting Deposito ARO..?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: "POST",
			url : "createdepo.php?p=5",
			data: $(this).serialize(),
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){
				var text=data;
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
				alert(data);
			}
		});
		return false;
	});
});
function goKembali() {
	var url='deposito_aro.php';
	$('#innertub').load(url);
}
function AuthMethod(id){
	var dataString='id='+id;
	var r = confirm("Anda Yakin Di Posting...?");
	if (r == false) {
		return false;
	}
	$.ajax({
		type: "POST",
		url : "createdepo.php?p=6",
		data: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){
			var text=data;
			$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
			var n = data.search("Sukses");
			if(n==0){
				goKembali();
			}
			$('#loading').hide();
			alert(data);
		}
	});
};
</script>
<?php
$tabel='deposito.deposits_cadangan';$bulan=$blnxxx.$thnxxx;
echo '</head>
<body>
<table class="table" width="100%">
<thead>
<tr><td colspan="13" align="right"><button id="posting">Proses Deposito ARO</button></td></tr>
<tr class="td" bgcolor="#e5e5e5">
	<th>NO</th>
	<th>NO NASABAH</th>
	<th>NAMA REKENING</th>
	<th>NOMINAL</th> 
	<th>JW / SB</th>
	<th>TGL BUKA</th>
	<th>TGL BUNGA</th>
	<th>BUNGA</th>
	<th>PAJAK</th>
	<th>TOTAL TARIK</th>
	<th>KETERANGAN</th>
</tr>
</thead>
<tbody>';
$hasil=$result->query_lap("SELECT a.id,a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.nama_rekening,a.produk,a.tanggal_buka,a.jangka_waktu,a.nominal,a.tanggal_jatuh_tempo,a.counter_rate,SUM(b.bunga_bulanan) AS bunga_bulanan,SUM(b.pajak_bulanan) AS pajak_bulanan,SUM(b.bunga_bersih) AS bunga_bersih,c.nmproduk FROM deposito.deposits a JOIN $tabel b ON a.id=b.id_deposito JOIN deposito.prd_deposito c ON a.produk=c.kdproduk WHERE CONCAT(MONTH(a.tanggal_jatuh_tempo),YEAR(a.tanggal_jatuh_tempo))=CONCAT(MONTH('$t'),YEAR('$t')) AND a.counter_aro=1 AND a.status_rekening=1 AND b.flag_bayar=1 GROUP BY a.id ORDER BY a.id");
$no=1;$vbayar="";
$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;$jjumlah2=0;
$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;$tjumlah2=0;
while ($row=$result->row($hasil)){
	if ($vbayar!=$row['produk']){ 
		if($no>1){
			echo '<tr class="td" bgcolor="#e5e5e5">
			<td colspan="7" align="center">JUMLAH</td>
			<td align="right">'.formatrp($jpokok).'</td>
			<td align="right">'.formatrp($jbunga).'</td>
			<td align="right">'.formatrp($jadm).'</td>
			<td align="right" colspan="2">&nbsp;</td>
			</tr>';
			$jpokok=0;$jbunga=0;$jadm=0;
		}
		echo '<tr><td colspan="12"><strong>'.$row['nmproduk'].'</strong></td></tr>';
	}
	echo '<tr>
	<td>'.$no.'</td>
	<td align="left">'.$row['branch'].'-'.$row['nomor_nasabah'].'-'.$row['sufix'].'</td>
	<td align="left">'.$row['nama_rekening'].'</td>
	<td align="right">'.formatrp($row['nominal']).'</td>
	<td align="right">'.$row['jangka_waktu'].' / '.$row['counter_rate'].'</td>
	<td align="right">'.date_sql($row['tanggal_buka']).'</td>
	<td align="right">'.date_sql($row['tanggal_jatuh_tempo']).'</td>
	<td align="right">'.formatrp($row['bunga_bulanan']).'</td>
	<td align="right">'.formatrp($row['pajak_bulanan']).'</td>
	<td align="right">'.formatrp($row['bunga_bersih']).'</td>
	<td>';
		if($row['bunga_bulanan']-$row['bunga_bersih']>0){
			echo 'Masih Ada Bunga';
		}else{
			echo 'Lunas Bunga';
		}
	echo '</td>
	</tr>';
	$jpokok=$jpokok+$row['bunga_bulanan'];
	$jbunga=$jbunga+$row['pajak_bulanan'];
	$jadm=$jadm+$row['bunga_bersih'];	
	$tpokok=$tpokok+$row['bunga_bulanan'];
	$tbunga=$tbunga+$row['pajak_bulanan'];
	$tadm=$tadm+$row['bunga_bersih'];
	$vbayar=$row['produk'];
	$no++;
}
echo '<tr class="td" bgcolor="#e5e5e5">
<td colspan="7" align="center">JUMLAH</td>
<td align="right">'.formatrp($jpokok).'</td>
<td align="right">'.formatrp($jbunga).'</td>
<td align="right">'.formatrp($jadm).'</td>
<td align="right" colspan="2">&nbsp;</td>
</tr>
<tr class="td" bgcolor="#e5e5e5">
<td colspan="7" align="center">TOTAL</td>
<td align="right">'.formatrp($tpokok).'</td>
<td align="right">'.formatrp($tbunga).'</td>
<td align="right">'.formatrp($tadm).'</td>
<td align="right" colspan="2">&nbsp;</td>
</tr>
</tbody>
</table>
</body>
</html>';
?>