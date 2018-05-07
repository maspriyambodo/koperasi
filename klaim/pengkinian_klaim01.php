<?php include '../h_tetap.php';?>
<script type="text/javascript" src="js/new_klaima.js"></script>
<script type="text/javascript"> 
	var url="./klaim/pengkinian_klaim.php";var urls="./klaim/pengkinian_klaim02.php";
</script>
<?php $norek=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$fieldss="a.noreks,a.ketnas,a.kketnas,a.kode_cair";include '../dist/_header.php';$ketnas=$row['ketnas'];$kketnas=$row['kketnas'];if($row['kode_cair']==1)$result->msg_error('Nasabah Sudah Pencairan Klaim Asuransi/Penghapusan OBD');$r=$result->row($result->query_x1("SELECT tmp_mati,sebab_mati,ket_mati,tgl_klaim,no_akte_kematian,DATE_FORMAT(tgl_akte_kematian,'%d-%m-%Y') AS tgl_akte_kematian,no_surat_taspen,DATE_FORMAT(tgl_surat_taspen,'%d-%m-%Y') AS tgl_surat_taspen,nama_ahli_waris,hub_ahli_waris,alt_ahli_waris,tlp_ahli_waris,DATE_FORMAT(tgl_klaim,'%d-%m-%Y') AS tgl_klaim,DATE_FORMAT(tgl_mati,'%d-%m-%Y') AS tgl_mati,status_klaim,jenis_klaim,jumlah_klaim,angsur_ke FROM $tabel_klaim WHERE id_kredit='$idd'"));if($r['status_klaim']==2)$result->msg_error('Pengajuan/Penghapusan Klaim OBD Sudah Di Otorisasi');include '../config/cek_tagihan.php';$norekl='';$sufixl='';$hasill=$result->query_x1("SELECT a.norek,a.produk,a.nomi,a.saldoa,a.tgtran,a.umur,b.saldo_akhir FROM $tabel_kredit a JOIN $tabel_asuransi b ON a.norek=b.norek WHERE a.nonas='$nonas'"); echo '
<form id="masuk" name="masuk" method="POST" action="">
<input type="hidden" name="id" id="id" value="'.$idd.'"/>
<table width="100%">
	<tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';
	include '../_headerx.php';echo '
	<tr><td colspan="4" align="center" class="ui-state-highlight">DATA ASURANSI DEBITUR</td></tr>
	<tr><td colspan="4" align="center">
		<table class="table" width="100%">
		<thead>
			<tr>
				<th>Norek</th>
				<th>Produk</th>
				<th>Tgl Transaksi</th>
				<th>Nominal</th>
				<th>Saldo</th>
				<th>Jml Premi</th>
				<th>Umur</th>
			</tr>
		</thead>';
		if($result->num($hasill)<1){ echo '
			<tr><td align="center" colspan="7">Data Asuransi Debitur Tersebut Tidak Ada</td></tr>';
		}else{ echo '
			<tbody>';
				while($data=$result->row($hasill)){ echo '
					<tr>
						<td>'.$data['norek'].'</td>
						<td>'.$data['produk'].'</td>
						<td>'.date_sql($data['tgtran']).'</td>
						<td align="right">'.formatrp($data['nomi']).'</td>
						<td align="right">'.formatrp($data['saldoa']).'</td>
						<td align="right">'.formatrp($data['saldo_akhir']).'</td>
						<td align="center">'.$data['umur'].'</td>
				  	</tr>';
				} echo '
			</tbody>
		</table>';
		} echo '</td>
	</tr>
</table>
<table width="100%">';
	include '../klaim/lembar_form_klaim.php'; echo '
	<tr>
		<td colspan="4">
			<div class="ui-widget-content" align="center">
				<input type="submit" value="Simpan" id="submit" class="icon-save"/>
				<input type="button" value="Batal" id="submit" onclick="goKembali();" class="icon-cancel"/>
			</div>
		</td>
	</tr>
</table>
</form>'; ?>
<script type="text/javascript">
	var status_klaim=$('#status_klaim').val();
	if(status_klaim==2) {
		var sbmt = document.getElementById("submit");
		sbmt.disabled = true;
		alert('Rekening Sudah pencairan Klaim?');
	}
</script>