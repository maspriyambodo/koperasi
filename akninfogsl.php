<?php include "h_atas.php";?>
<script type="text/javascript" src="jQuery/jquery.autotab.min.js"></script>
<script type="text/javascript" src="java/_informasi_gssl.js"></script>
<script type="text/javascript" src="java/auto_tab.js"></script>
<script type="text/javascript">
	$("input#text2").focus();
	$("#lookup_sandi").lookupbox({
		title: 'Daftar Rekening',
		url  : 'lookup/lookup_sandi.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data){
			$('input[name=branch]').val(data.branch);
			$('input[name=nonas]').val(data.nonas);
			$('input[name=sufix]').val(data.sufix);
		},
		tableHeader: ['Branch','Nonas','Sufix','Norek','Nama']
	});
	$(function() {
		$("#lookup_sandi").button({
			text: false,
			icons: {
		   		primary: 'ui-icon-circle-plus'
		  	}
		});
		$("#lacak_data").button({
			text: true,
			icons: {
				primary: 'ui-icon-search'
			}
		});
		$("#btnpdf").button({
			text: true,
			icons: {
				primary: "ui-icon-print"
			}
		});
		$("#btnxls").button({
			text: true,
			icons: {
				primary: "ui-icon-note"
			}
		});
	});
</script>
<div align="center" class="ui-widget-content">
	<form id="formsearch" name="formsearch" method="post" action="">
		NO REKENING :
		<input type="text" name="branch" id="text1" size="5" maxlength="4" value="<?php echo $kcabang; ?>" required autocomplete="off"/> 
		<input type="text" name="nonas" id="text2" size="8" maxlength="6" required autocomplete="off" class="norek"/> 
		<input type="text" name="sufix" id="text3" size="4" maxlength="3" value="360" required autocomplete="off"/> 
		MUALAN BULAN :
		<select name="bln" id="bln" title="Mulai Bulan">
			<?php $bln_x1=$blnxxx; include 'form_bulan.php';?>
		</select>
		<select name="thn" id="thn" title="Mulai Tahun">
			<?php $thn_x1=$thnxxx; include 'form_tahun.php';?>
		</select>
		S/D
		<select name="bln_akhir" id="bln_akhir" title="Akhir Bulan">
			<?php $bln_x1=$blnxxx; include 'form_bulan.php';?>
		</select>
		<select name="thn_akhir" id="thn_akhir" title="Mulai Tahun">
			<?php $thn_x1=$thnxxx; include 'form_tahun.php';?>
		</select>
		<button type="button" id="lookup_sandi">&nbsp;</button>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div>
	<button id="btnpdf">Print PDF</button>
	<button id="btnxls">Print Excel</button>
</div>
<div id="divPageAkun75"></div>