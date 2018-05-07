<?php include "h_tetap.php";?>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#kwitansi").submit(function() {
			var r = confirm("Anda Yakin Kwitansi Kembali..?");
			if (r == false) {
				return false;
			}
			$.ajax({
				type: "POST",
				url : "daftar_susulan34.php",
				data: $(this).serialize(),
				beforeSend: function () {
					$("#loading").show();
				},
				success: function(data){
					if(data=="Sukses"){
						showEditt();
					}
					$("#loading").hide();
					alert(data);
				}
			});
			return false;
		});
	})
	function showEdit(id) {
		var r = confirm("Anda Yakin Kwitansi Kembali..?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: "POST",
			url : "daftar_susulan34.php",
			data: $("#kwitansi").serialize(),
			beforeSend: function () {
				$("#loading").show();
			},
			success: function(data){
				if(data=="Sukses"){
					showEditt();
				}
				$("#loading").hide();
				alert(data);
			}
		});
		return false;
	}
	function showEditk(id) {
		var r = confirm("Anda Yakin Kwitansi Kembali..?");
		if (r == false) {
			return false;
		}
		$.ajax({
			type: "POST",
			url : "daftar_susulan34.php",
			data: $("#kwitansii").serialize(),
			beforeSend: function () {
				$("#loading").show();
			},
			success: function(data){
				if(data=="Sukses"){
					showEditt();
				}
				$("#loading").hide();
				alert(data);
			}
		});
		return false;
	}	
	function showEditt() {
		var kkbayar= $("#kkbayar").val();
		var dataString="kkbayar="+kkbayar;
		$.ajax({
			type: "POST",
			url : "kkbulan11.php",
			data: dataString,
			beforeSend: function () {
				$("#loading").show();
			},
			success: function(data){
				$("#divPageHasil").html(data);
				$("#loading").hide();
			}
		});
		return false;
	}
  	$(function(){
    	$( "#tabs" ).tabs({
		    beforeLoad: function(event, ui ) {
		        var anchor = ui.tab.find(".ui-tabs-anchor");  
        		var urllink = anchor.attr('href'); 
	      		var kkbayar= $("#kkbayar").val();
				var dataString="kkbayar="+kkbayar;
				$.ajax({
					type: "POST",
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
	  	$("table").tablesorter({
			theme: 'blue',
			widthFixed: true,
			widgets: ['zebra', 'filter'],
			headers: {
				// disable sorting of the first & second column - before we would have to had made two entries
				// note that "first-name" is a class on the span INSIDE the first column th cell
				'.aksi' : {
				// disable it by setting the property sorter to false
					sorter: false
				}
			}
		})
  	});
</script>
<?php
$kkbayar=$result->c_d($_POST["kkbayar"]);$ket='';
echo '<input name="kkbayar" type="hidden" id="kkbayar" value="".$kkbayar.""/>
<div id="tabs">
	<ul>
		<li><a href="#tabs-1">BELUM RALISASI</a></li>
		<li><a href="daftar_susulan32.php">SUDAH REALISASI</a></li>
		<li><a href="#tabs-3">TIDAK TERTAGIH</a></li>
		<li><a href="daftar_susulan35.php">REKAP TAGIHAN</a></li>
	</ul>
	<div id="tabs-1" style="width: 96%;height:440px;overflow: auto;">';
		if($kkbayar!=9){
			$hasil=$result->query_lap("SELECT a.id,a.norek,a.nama,b.nocitra,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,a.alasan_tt,a.solusi_tt,b.kkbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.kkbayar='$kkbayar' AND a.branch='$kcabang' AND a.kdtran=111 ORDER BY kdtran,nama,nocitra,norek");
		}else{
			$hasil=$result->query_lap("SELECT a.id,a.norek,a.nama,b.nocitra,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,a.alasan_tt,a.solusi_tt,b.kkbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.branch='$kcabang' AND a.kdtran=111 ORDER BY a.nama,b.nocitra,a.norek");	
		}
		echo '
		<form name="kwitansi" id="kwitansi" method="post" action="">
		<table class="table ui-widget-content" width="100%">
			<thead>
			<tr bgcolor="#b6b5ad">
				<th>NOREK</th>
				<th>NOREK LAIN</th>
				<th>NOPEN</th>
				<th>NAMA</th>
				<th>POKOK</th>
				<th>BUNGA</th>
				<th>ADM</th>
				<th>JUMLAH</th>
				<th>KE</th>
				<th>ALASAN TT</th>
				<th>PENYELESAIAN</th>
				<th class="aksi">AKSI</th>
			</tr>
			</thead>
			<tfoot>
			<tr bgcolor="#b6b5ad">
				<th>NOREK</th>
				<th>NOREK LAIN</th>
				<th>NOPEN</th>
				<th>NAMA</th>
				<th>POKOK</th>
				<th>BUNGA</th>
				<th>ADM</th>
				<th>JUMLAH</th>
				<th>KE</th>
				<th>ALASAN TT</th>
				<th>PENYELESAIAN</th>
				<th>AKSI</th>
			</tr>
			</tfoot>
			<tbody>';
			$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$no=0;
			$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah2=0;
			while ($row = $result->row($hasil)) { 
				$kode_cair=$row["alasan_tt"];
				if($no%2==0) $clsname="even"; else $clsname="odd";
				echo '<tr class="'; if(isset($clsname)) echo $clsname.'">
				<td>'.$row["norek"].'</td>
				<td>'.$row["nocitra"].'</td>
				<td>'.$row["nopen"].'</td>
				<td>'.$row["nama"].'</td>
				<td align="right">'.number_format($row["pokok"]).'</td>
				<td align="right">'.number_format($row["bunga"]).'</td>
				<td align="right">'.number_format($row["adm"]).'</td>
				<td align="right">'.number_format($row["jumlah"]).'</td>
				<td align="center">'.$row["angsurke"].'</td>
				<td align="center">
				<select name="alasan_tt[]" id="alasan_tt[]">';
				$huruf = array("PILIHAN","SETOR ANGSURAN","GAJI MINUS/TURUN","MENINGGAL DUNIA","MUTASI GAJI","STOP GAJI","DEBITUR NAKAL","LEPAS/TIDAK BLOKIR","TIDAK TERTAGIH","BELUM AMBIL GAJI (SUSULAN)");$i=0;
				while($i<10){
					if($kode_cair== $i){
						echo '<option value="'.$i.'" selected>'. $huruf[$i] .'</option>';
					}else{
						echo '<option value="'.$i.'">'.$huruf[$i].'</option>';
					}
					$i++;
				}
				echo '</select></td>
				<td>
				<input name="solusi_tt[]" type="text" id="solusi_tt[]" size="30" maxlength="80" value="'.$row["solusi_tt"].'"/>
				<input name="id[]" type="hidden" id="id[]" value="'.$row["id"].'"/>
				</td><td align="center">
				<a title="Kwitansi Kembali?" class="icon-edit" onClick="showEdit('.$row["id"].')">Update</a>
				</td>
				</tr>';
				$jpokok +=$row["pokok"];
				$jbunga +=$row["bunga"];
				$jadm +=$row["adm"];
				$jumlah1 +=$row["jumlah"];
				$no++;
			}
			echo '
			</tbody>
			<tr bgcolor="#b6b5ad">
				<td colspan="2">REKENING : '.$no.'</td>
				<td colspan="2">JUMLAH</td>
				<td>'.number_format($jpokok).'</td>
				<td>'.number_format($jbunga).'</td>
				<td>'.number_format($jadm).'</td>
				<td>'.number_format($jumlah1).'</td>
				<td colspan="4">&nbsp</td>
			</tr>
		</div>
		</table>
		</form>
	</div>
	<div id="tabs-3" style="width: 96%;height:440px;overflow: auto;">';
		if($kkbayar!=9){
			$hasil=$result->query_lap("SELECT a.id,a.norek,a.nama,b.nocitra,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,a.alasan_tt,a.solusi_tt,b.kkbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE b.kkbayar='$kkbayar' AND a.branch='$kcabang' AND a.kdtran=333 ORDER BY kdtran,nama,nocitra,norek");
		}else{
			$hasil=$result->query_lap("SELECT a.id,a.norek,a.nama,b.nocitra,b.nopen,a.pokok,a.bunga,a.adm,a.angsurke,a.jumlah,a.kdtran,a.alasan_tt,a.solusi_tt,b.kkbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.branch='$kcabang' AND a.kdtran=333 ORDER BY a.nama,b.nocitra,a.norek");	
		}
		echo '
		<form name="kwitansii" id="kwitansii" method="post" action="">
		<table class="table" width="100%">
			<thead>
				<tr bgcolor="#b6b5ad">
					<th>NOREK</th>
					<th>NOREK LAIN</th>
					<th>NOPEN</th>
					<th>NAMA</th>
					<th>POKOK</th>
					<th>BUNGA</th>
					<th>ADM</th>
					<th>JUMLAH</th>
					<th>KE</th>
					<th>ALASAN TT</th>
					<th>PENYELESAIAN</th>
					<th>AKSI</th>
				</tr>
			</thead>
			<tfoot>			
			<tr bgcolor="#b6b5ad">
				<th>NOREK</th>
				<th>NOREK LAIN</th>
				<th>NOPEN</th>
				<th>NAMA</th>
				<th>POKOK</th>
				<th>BUNGA</th>
				<th>ADM</th>
				<th>JUMLAH</th>
				<th>KE</th>
				<th>ALASAN TT</th>
				<th>PENYELESAIAN</th>
				<th>AKSI</th>
			</tr>
			</tfoot>
			<tbody>';
				$jpokok=0;$jbunga=0;$jadm=0;$jumlah1=0;$no=0;
				$jpokok1=0;$jbunga1=0;$jadm1=0;$jumlah2=0;
				while ($row = $result->row($hasil)) { 
					$kode_cair=$row["alasan_tt"];
					if($no%2==0) $clsname="even"; else $clsname="odd";
					echo '<tr class="'; if(isset($clsname)) echo $clsname.'">
					<td>'.$row["norek"].'</td>
					<td>'.$row["nocitra"].'</td>
					<td>'.$row["nopen"].'</td>
					<td>'.$row["nama"].'</td>
					<td align="right">'.number_format($row["pokok"]).'</td>
					<td align="right">'.number_format($row["bunga"]).'</td>
					<td align="right">'.number_format($row["adm"]).'</td>
					<td align="right">'.number_format($row["jumlah"]).'</td>
					<td align="center">'.$row["angsurke"].'</td>
					<td align="center">
						<select name="alasan_tt[]" id="alasan_tt[]">';
						$huruf = array("PILIHAN","SETOR ANGSURAN","GAJI MINUS/TURUN","MENINGGAL DUNIA","MUTASI GAJI","STOP GAJI","DEBITUR NAKAL","LEPAS/TIDAK BLOKIR","TIDAK TERTAGIH","BELUM AMBIL GAJI (SUSULAN)");$i=0;
						while($i<10){
							if($kode_cair== $i){
								echo '<option value="'.$i.'" selected>'. $huruf[$i] .'</option>';
							}else{
								echo '<option value="'.$i.'">'.$huruf[$i].'</option>';
							}
							$i++;
						}
						echo '
						</select>
					</td>
					<td>
					<input name="solusi_tt[]" type="text" id="solusi_tt[]" size="30" maxlength="80" value="'.$row["solusi_tt"].'"/>
					<input name="id[]" type="hidden" id="id[]" value="'.$row["id"].'"/>
					</td>
					<td align="center">
					<a title="Kwitansi Kembali?" class="icon-edit" onClick="showEditk('.$row["id"].')">Update</a>
					</td></tr>';
					$jpokok +=$row["pokok"];
					$jbunga +=$row["bunga"];
					$jadm +=$row["adm"];
					$jumlah1 +=$row["jumlah"];
					$no++;
				}
				echo '
			</tbody>
			<tr bgcolor="#b6b5ad">
				<td colspan="2">REKENING : '.$no.'</td>
				<td colspan="2">JUMLAH</td>
				<td>'.number_format($jpokok).'</td>
				<td>'.number_format($jbunga).'</td>
				<td>'.number_format($jadm).'</td>
				<td>'.number_format($jumlah1).'</td>
				<td colspan="4">&nbsp</td>
			</tr>
		</table>
		</form>
	</div>
</div>';
?>