<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
$(document).ready(function () {
	$("#posting").button().on("click",function(){
		var r = confirm("Anda Yakin Posting Bunga..?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: "POST",
			url : "createdepo.php?p=3",
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
	var url='deposito_post.php';
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
		url : "createdepo.php?p=4",
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
echo '
<table id="tableData" class="table-line">
<thead>
<tr><td colspan="13" align="right"><button id="posting">Proses Posting Bunga</button></td></tr>
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
	<th>NET BUNGA</th>
	<th>HARI / BUNGA</th>
	<th>AKSI</th>
</tr>
</thead>
<tbody>';
$bulan=$blnxxx.$thnxxx;
$tabeln="deposito.cadangan_".$bulan;
$hasil=$result->query_x1("SELECT id,branch,nomor_nasabah,sufix,nomor_bilyet,seri_bilyet,tanggal_jatuh_tempo,bunga_bulanan,pajak_bulanan,bunga_bersih,jumlah_hari,bunga_ke,id_deposito,nama_rekening,tanggal_buka,produk,jangka_waktu,nominal,counter_rate,nmproduk,sbunga,scadangan,spajak,nama_sales FROM $tabeln WHERE bulan_bunga='$bulan' AND flag_bayar=1 AND tanggal_jatuh_tempo<='$t' ORDER BY produk,nomor_nasabah,bunga_ke");
$no=1;$vbayar="";
$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;$jjumlah2=0;
$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;$tjumlah2=0;
if($result->num($hasil)>0){
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
		<td align="right" width="8%">'.$row['jumlah_hari'].' - '.$row['bunga_ke'].'</td>
		<td><a class="icon-ok" onClick="AuthMethod('.$row['id'].')" title="Posting Bunga Jatuh Tempo">Post</a></td>
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
	</tr>';
}else{
	echo '<tr><td colspan="12" align="center" style="color: #ff0000"><strong>Data Jatuh Tempo Bunga Tidak Ada!!!</strong></td></tr>';
}
echo '</tbody></table>';
?>