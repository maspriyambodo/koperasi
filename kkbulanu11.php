<?php include "h_tetap.php";?>
<script type="text/javascript">
	$(document).ready(function () {
		$("#kwitansi").submit(function() {
			var r = confirm("Anda Yakin Koreksi Kwitansi Kembali..?");
			if (r == false) {
				return false;
			}
			$.ajax({
				type: "POST",
				url : "kkbulanu12.php",
				data: $(this).serialize(),
				beforeSend: function () {
					$('#loading').show();
				},
				success: function(data){
					if(data=='Sukses'){
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
		var url='kkbulanu.php';
		$('#innertub').load(url);
	}
</script>
<?php
$branch=$kcabang;
$kkbayar=$result->c_d($_POST['kkbayar']);
if($kkbayar!=9){
	$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.norek,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,a.alasan_tt,a.solusi_tt,b.jangka,b.nrekom,b.trekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat FROM $tabelTagihan a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_nasabah c ON a.nonas=c.nonas WHERE b.kkbayar LIKE '$kkbayar' AND a.branch='$branch' AND a.kdtran=333 ORDER BY a.nama,b.kkbayar,a.norek");
}else{
	$hasil=$result->query_lap("SELECT a.id,a.branch,a.nonas,a.norek,a.nama,b.nodapem,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,a.alasan_tt,a.solusi_tt,b.jangka,b.nrekom,b.trekom,b.kkbayar,b.nmbayar,b.kdsales,c.alamat FROM $tabelTagihan a JOIN $tabel_kredit b ON a.norek=b.norek JOIN $tabel_nasabah c ON a.nonas=c.nonas WHERE a.branch='$branch' AND a.kdtran=333 ORDER BY a.nama,b.kkbayar,a.norek");
}
$no=1;?>
<form name="kwitansi" id="kwitansi" method="post" action="">
<table class="table" width="100%">
	<thead>
	<tr><th colspan="12"><?php echo 'DAFTAR KWITANSI KEMBALI BULAN : '.nmbulan($bln).' '.$thn;?></th></tr>
	<tr class="td" bgcolor="#82dae1">
		<th>PILIH</th>
		<th>NOREK</th>
		<th>NAMA</th>
		<th>NOPEN</th>
		<th>POKOK</th>
		<th>BUNGA</th>
		<th>ADM</th>
		<th>JUMLAH</th>
		<th>KE</th>
		<th>KETERANGAN  TT</th>
		<th>SOLUSI TT</th>
	</tr>
	</thead>
	<tbody><?php
		$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$jumlah2=0;$no=1;$vbayar="";$xalasan_tt='';
		while ($row = $result->row($hasil)) { 
			if($no%2==0)
				$clsname="even";
			else
				$clsname="odd";
			?>
			<tr class="<?php if(isset($clsname)) echo $clsname;?>">
				<td align="center"><input type="checkbox" name="id[]" value="<?php echo $row["id"]; ?>"></td>
				<td><?php echo $row['norek']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['nopen']; ?></td>
				<td align="right"><?php echo number_format($row['pokok']); ?></td>
				<td align="right"><?php echo number_format($row['bunga']); ?></td>
				<td align="right"><?php echo number_format($row['adm']); ?></td>
				<td align="right"><?php echo number_format($row['jumlah']); ?></td>
				<td align="center"><?php echo $row['angsurke']; ?></td>
				<td align="left"><?php $alasan_tt=$row['alasan_tt']; include "help/alasan_tt.php";echo $xalasan_tt;?></td>
				<td align="right"><?php echo $row['solusi_tt'];?></td>
			</tr><?php 
			$jpokok=$jpokok+$row['pokok'];
			$jbunga=$jbunga+$row['bunga'];
			$jadm=$jadm+$row['adm'];
			$jumlah1=$jumlah1+$row['jumlah'];
			$no++;
		}?>
		<tr>
			<td colspan="2"><input type="submit" value="Update" id="submit" class="icon-save"/></td>
			<td colspan="4" align="center">JUMLAH</td>
			<td align="right"><?php echo number_format($jpokok); ?></td>
			<td align="right"><?php echo number_format($jbunga); ?></td>
			<td align="right"><?php echo number_format($jadm); ?></td>
			<td align="right"><?php echo number_format($jumlah1); ?></td>
			<td align="right" colspan="2">&nbsp;</td>
		</tr>
	</tbody>
</table>
</form>