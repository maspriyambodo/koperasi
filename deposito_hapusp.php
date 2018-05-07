<?php include 'h_tetap.php';?>
<script TYPE="text/javascript">
	$(document).ready(function () {
		$("#kwitansi").submit(function() {
			var r = confirm("Anda Yakin Bunga Di Hapus..?");
			if (r == false) {
				return false;
			}
			$.ajax({
				type: "POST",
				url : "deposito_hapush.php",
				data: $(this).serialize(),
				beforeSend: function () {
					$('#loading').show();
				},
				success: function(data){
					if(data=='Sukses'){
						goKembalii();
					}
					$('#loading').hide();
					alert(data);
				}
			});
			return false;
		});
	    $('#select_all').on('click',function(){
	        if(this.checked){
	            $('.checkbox').each(function(){
	                this.checked = true;
	            });
	        }else{
	             $('.checkbox').each(function(){
	                this.checked = false;
	            });
	        }
	    });
	    
	    $('.checkbox').on('click',function(){
	        if($('.checkbox:checked').length == $('.checkbox').length){
	            $('#select_all').prop('checked',true);
	        }else{
	            $('#select_all').prop('checked',false);
	        }
	    });
	});
	function goKembalii() {
		var id= $("#idd").val();
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url : "deposito_hapusp.php",
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				$('#dialog').html(data);
				$('#loading').hide();
			}
		});
	}
</script>
<?php 
$id=$result->c_d($_GET['id']);echo '<input name="idd" type="hidden" id="idd" value="'.$id.'"/>';$tabel="deposito.deposits_cadangan";$hasil=$result->query_lap("SELECT a.branch,a.nomor_nasabah,a.sufix,a.nomor_bilyet,a.seri_bilyet,a.tanggal_buka,a.tanggal_jatuh_tempo,a.nama_rekening,a.jangka_waktu,a.nominal,a.counter_rate,a.status_rekening,b.nmproduk,c.nama AS namas FROM deposito.deposits a JOIN deposito.prd_deposito b ON a.produk=b.kdproduk JOIN nabasa.sales c ON a.sales_id=c.idsales WHERE a.id='$id' LIMIT 1");$row=$result->row($hasil);
if($row['status_rekening']==4) die('Rekenign Deposito Sudah Di Tutup');
$branch=$row['branch'];
$nonas=$row['nomor_nasabah'];
$sufix=$row['sufix'];
$nomor_bilyet=$row['nomor_bilyet'];
$seri_bilyet=$row['seri_bilyet'];
$tgl_buka=$row['tanggal_buka'];
$tgl_akhir=$row['tanggal_jatuh_tempo'];
$nama=$row['nama_rekening'];
$jangka_waktu=$row['jangka_waktu'];
$nominal=$row['nominal'];
$suku_bunga=$row['counter_rate'];
$nmproduk=$row['nmproduk'];
$namas=$row['namas'];
$hasil=$result->query_lap("SELECT a.id,a.tanggal_jatuh_tempo,a.bunga_bulanan,a.pajak_bulanan,a.bunga_bersih,a.jumlah_hari,a.bunga_ke,flag_bayar FROM $tabel a JOIN deposito.deposits b ON a.id_deposito=b.id WHERE a.id_deposito='$id' ORDER BY a.bunga_ke");
$desc="RINCIAN PEMBAYARAN BUNGA BULANAN";
include 'judul.php';
echo '<form name="kwitansi" id="kwitansi" method="post" action="">
<input name="ide" type="hidden" id="ide" value="'.$id.'"/>
<table width="100%" class="table"><thead>
<tr><td colspan="2">NO NASABAH</td><td colspan="6">'.$branch.$nonas.$sufix.'</td></tr><tr><td colspan="2">NO BILYET</td><td colspan="6">'.$nomor_bilyet.'-'.$seri_bilyet.'</td></tr><tr><td colspan="2">NAMA REKENING</td><td colspan="6">'.$nama.'</td></tr><tr><td colspan="2">NOMINAL / JW / SB</td><td colspan="6">'.formatRupiah($nominal).' / '.$jangka_waktu.' / '.$suku_bunga.'</td></tr><tr><td colspan="2">TGL BUKA</td><td colspan="6">'.date_sql($tgl_buka).' S/D '.date_sql($tgl_akhir).'</td></tr>
<tr class="td" bgcolor="#e5e5e5">
	<th><input type="checkbox" id="select_all"/>PILIH</th>
	<th>TANGGAL BUNGA</th>
	<th>FLAG BAYAR</th>
	<th>BUNGA</th>
	<th>PAJAK</th>
	<th>NET BUNGA</th>
	<th>JUMLAH HARI</th>
	<th>BUNGA KE</th>
</tr>
</thead>
<tbody>';
$no=1;$vbayar="";
$jpokok=0;$jbunga=0;$jadm=0;$jdenda=0;$jjumlah1=0;$jjumlah2=0;
$tpokok=0;$tbunga=0;$tadm=0;$tdenda=0;$tjumlah1=0;$tjumlah2=0;
while ($row=$result->row($hasil)){
	if($row['flag_bayar']==0){
		$clsname="odd";
		$kete='Belum Di Bayar';
	}else{
		$clsname="even";
		$kete='Sudah Di Bayar';
	}
	echo '<tr class="'.$clsname.'">
	<td width="6%" align="center"><input type="checkbox" class="checkbox" name="id[]" value="'.$row["id"].'"></td>
	<td align="center" width="14%">'.date_sql($row['tanggal_jatuh_tempo']).'</td>
	<td align="right">'.$kete.'</td>
	<td align="right">'.formatrp($row['bunga_bulanan']).'</td>
	<td align="right">'.formatrp($row['pajak_bulanan']).'</td>
	<td align="right">'.formatrp($row['bunga_bersih']).'</td>
	<td align="right" width="8%">'.$row['jumlah_hari'].'</td>
	<td align="right" width="6%">'.$row['bunga_ke'].'</td>
	</tr>';
	$jpokok=$jpokok+$row['bunga_bulanan'];
	$jbunga=$jbunga+$row['pajak_bulanan'];
	$jadm=$jadm+$row['bunga_bersih'];
	
	$tpokok=$tpokok+$row['bunga_bulanan'];
	$tbunga=$tbunga+$row['pajak_bulanan'];
	$tadm=$tadm+$row['bunga_bersih'];
}
echo '<tr class="td" bgcolor="#e5e5e5">
<td align="center"><input type="submit" value="Hapus" id="submit" class="icon-proses"/></td>
<td align="center" colspan="2">TOTAL</td>
<td align="right">'.formatrp($tpokok).'</td>
<td align="right">'.formatrp($tbunga).'</td>
<td align="right">'.formatrp($tadm).'</td>
<td align="right" colspan="2">&nbsp;</td>
</tr>
</tbody>
</table>
</form>';
?>