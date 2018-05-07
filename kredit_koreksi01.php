<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript" src="java/_newkredit.js"></script>
<script type="text/javascript">
	var url ="kredit_koreksi.php";
	var urls ='kredit_koreksi03.php';
	$("#lookup_kota").button({
		text: false,
		icons: {
	   		primary: 'ui-icon-circle-plus'
	  	}
	});
	$("#lookup_kota").lookupbox({
		title: 'Daftar Kabupaten',
		url: 'lookupkota.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			$('input[name=brekom]').val(data.kode);
			$('#nmkota').html(data.desc1);
		},
		tableHeader: ['Kode','Kabupaten','Propinsi']
	});
	function showPayment() {
		norekl=$("#norekl").val();
		$.ajax({
			url : 'thistoryde.php',
			type: "GET",
			data: 'norekl='+norekl,
			beforeSend: function () {
				$('#loading').show();
			},
			success: function(data){ 
				$('#dialog').html(data); 
				$('#loading').hide();
				$("#dialog").dialog({
					title :"View Details",
					height: 500,
					width : 900,
					modal : true,
					buttons:{
						close: function (){
							$(this).dialog('close');
						}  
					}
				});
			}
		});
	}
</script>
<?php
echo '<div class="ui-widget-content">';$id=$result->c_d($_GET['id']);$branch=$kcabang;include 'variabel/var_kredit_1.php';$tgl=date_sql($tanggal);$xpokok=0;$xbunga=0;$xadm=0;$saldox=0;$simpanan_pokok=$row['simpokok'];$simpanan_wajib=$row['simwajib'];if($kdkop==1){$noreks=$kcabang.'213204360';}else{$noreks=$kcabang.'213205360';}$hasil=$result->query_x1("SELECT saldoa,pokok,bunga,administrasi,angsurke,jangka FROM $tabel_kredit WHERE norek='$norekl' LIMIT 1");if($result->num($hasil)>0){$r=$result->row($hasil);$saldoa=$r['saldoa'];if($saldoa>0){$jangka=$r['jangka'];$xbunga=$r['bunga'];$angsurke=$r['angsurke'];$jumlah_tagihan=$r['pokok']+$r['bunga']+$r['administrasi'];if($angsurke<1){$angsurke=$jangka;}$tgbatas=$angsurke;$no_paymet=$norekl;$kali_sisa=intval($jangka/3);$ybunga=0;$sisa_angsuran=$jangka-$angsurke;if($sisa_angsuran<=$kali_sisa){$ybunga=$xbunga;if($sisa_angsuran<=0){$ybunga=0;}}else{$kali_sisa=intval($jangka/2);if($sisa_angsuran<=$kali_sisa){$ybunga=$xbunga*2;}else{$ybunga=$xbunga*3;}}include '_pelunasanxx.php';$blunas=$jbunga+$ybunga;$alunas=$jadm;if($kk>0){$bungakk=intval(($jumlah_tagihan*$tbunga)/100)*$kk;}echo $jangka.'-'.$ybunga.'-'.$kali_sisa.'='.$norekl;}}$jumangsur=$pokok+$bunga+$madm;$jumlunas=$saldoa+$blunas+$bungakk+$alunas;$jumpotong=$jumlunas+$jumprovisi+$jumbtl+$jumadm+$meterai+$jumpremi+$jum_period+$pot_angsuran;$jumbersih = $nomi-$jumpotong-$simpanan_pokok-$simpanan_wajib;include 'kredit_koreksi02.php';echo '</div>';?>