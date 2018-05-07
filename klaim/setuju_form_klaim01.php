<?php include '../h_tetap.php';?>
<script type="text/javascript" src="js/new_klaima.js"></script>
<script type="text/javascript"> 
	$(document).ready(function () {
		$('#setuju').click(function(){
			var r = confirm("Pengajuan Di setujui..?");
			if (r == false) { 
				return false; 
			}
			var id= $("#id").val();
			$.ajax({
				type: "GET",
				url	: "./klaim/setuju_form_klaim02.php",
				data: 'id='+id,
				beforeSend: function(){
					$('#loading').show();
				},
				success: function(data){
					alert(data);
					var text=data;
					$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
					var n = data.search("Sukses");
					if(n==0){
						goKembali();
					}
					$('#loading').hide();
				}
			});
			return false;
		});
		$('#kembali').click(function(){
			goKembali();
		});
	});
	function goKembali() {
		var url='./klaim/setuju_form_klaim.php';
		$('#innertub').load(url);
	}
</script>
<?php 
$id=$result->c_d($_GET['id']);$r=$result->row($result->query_x1("SELECT branch,norek FROM $tabel_kredit WHERE id='$id' LIMIT 1"));$norek=$r['norek'];$branch=$r['branch'];$fieldss="a.noreks,a.ketnas,a.kketnas,a.kode_cair";include '../dist/_header.php';if($row['kode_cair']==1)$result->msg_error('Nasabah Sudah Pencairan Klaim Asuransi/Penghapusan OBD');$r=$result->row($result->query_x1("SELECT tmp_mati,sebab_mati,ket_mati,tgl_klaim,no_akte_kematian,DATE_FORMAT(tgl_akte_kematian,'%d-%m-%Y') AS tgl_akte_kematian,no_surat_taspen,DATE_FORMAT(tgl_surat_taspen,'%d-%m-%Y') AS tgl_surat_taspen,nama_ahli_waris,hub_ahli_waris,alt_ahli_waris,tlp_ahli_waris,DATE_FORMAT(tgl_klaim,'%d-%m-%Y') AS tgl_klaim,DATE_FORMAT(tgl_mati,'%d-%m-%Y') AS tgl_mati,status_klaim,jenis_klaim,jumlah_klaim,ketnas,kketnas,angsur_ke FROM $tabel_klaim WHERE id_kredit='$idd'"));$ketnas=$r['ketnas'];$kketnas=$r['kketnas'];if($r['status_klaim']==0)$result->msg_error('Nasabah Belum Pengajuan Klaim Asuransi/Penghapusan OBD');$norekl='';$sufixl='';echo '<table width="100%"><tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';include '../_headerx.php';include '../klaim/lembar_form_klaimx.php'; echo '<tr><td colspan="4"><div class="ui-widget-content" align="center">
    <form id="masuk" name="masuk" method="POST" action="">
        <input name="id" type="hidden" id="id" value="'.$id.'" />
        <input type="button" id="setuju" value="Pengajuan Disetujui" class="icon-ok" />
        <input type="button" id="kembali" value="Kembali" class="icon-undo" />
    </form>
</div></td></tr></table>'; ?>