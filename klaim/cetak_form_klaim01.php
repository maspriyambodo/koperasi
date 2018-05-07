<?php include '../h_tetap.php';?>
<script type="text/javascript" src="js/new_klaima.js"></script>
<script type="text/javascript"> 
	var url="./klaim/cetak_form_klaim.php";
	$( "#btnpdf" ).button().on( "click", function() {
		id=$("#id").val();
		var url='./klaim/cetak_form_klaim02?id='+id;
		newwindow=window.open(url,'Cetak','height=600,width=1000');
		if (window.focus) {newwindow.focus()};
		return false;
	});
	$( "#btnxls" ).button().on( "click", function() {
		$('#innertub').load(url);
		return false;
	});
</script>
<?php $norek=$result->c_d($_POST['nonas']);$branch=$result->c_d($_POST['branch']);$fieldss="a.noreks,a.ketnas,a.kketnas,a.kode_cair";include '../dist/_header.php';if($row['kode_cair']==1)$result->msg_error('Nasabah Sudah Pencairan Klaim Asuransi/Penghapusan OBD');$r=$result->row($result->query_x1("SELECT tmp_mati,sebab_mati,ket_mati,tgl_klaim,no_akte_kematian,DATE_FORMAT(tgl_akte_kematian,'%d-%m-%Y') AS tgl_akte_kematian,no_surat_taspen,DATE_FORMAT(tgl_surat_taspen,'%d-%m-%Y') AS tgl_surat_taspen,nama_ahli_waris,hub_ahli_waris,alt_ahli_waris,tlp_ahli_waris,DATE_FORMAT(tgl_klaim,'%d-%m-%Y') AS tgl_klaim,DATE_FORMAT(tgl_mati,'%d-%m-%Y') AS tgl_mati,status_klaim,jenis_klaim,jumlah_klaim,ketnas,kketnas,angsur_ke FROM $tabel_klaim WHERE id_kredit='$idd'"));$ketnas=$r['ketnas'];$kketnas=$r['kketnas'];if($r['status_klaim']==0)$result->msg_error('Nasabah Belum Pengajuan Klaim Asuransi/Penghapusan OBD');$norekl='';$sufixl='';echo '<table width="100%"><input type="hidden" name="id" id="id" value="'.$idd.'"/><tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';include '../_headerx.php';include '../klaim/lembar_form_klaimx.php'; echo '<tr><td colspan="4"><div class="ui-widget-content" align="center"><button id="btnpdf">Cetak PDF</button><button id="btnxls">Batal</button></div></td></tr></table>'; ?>