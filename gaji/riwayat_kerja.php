<?php $par_atas='Data Karyawan';include '../gaji/head_atas.php'?>
<script TYPE="text/javascript">
	$("input#nonas").focus();
	var linkcaridata='../gaji/riwayat_kerjaf.php';
	$(document).ready(function(){
		$("#lookup_karyawan").lookupbox({
			title: 'Daftar Rekening',
			url	 : '../gaji/lookup_master.php ?chars=',
			imgLoader: '<img src="../images/load.gif">',
			onItemSelected: function(data)	{
				$('input[name=nonas]').val(data.nonas);
			},
			tableHeader: ['Branch','Nik','Nama','No KTP','Tgl Lahir']
		});
	});
</script>
</head>
<body>
	<div class="ui-widget-content" align="center">
		<form id="formsearch" name="formsearch" method="post" action="">
			NIK KARYAWAN : 
			<input  type="text" name="nonas" id="nonas" size="15"  maxlength="10" onKeyUp="caps(this)" autocomplete="off"/>
			<input type="submit" name="lacak" id="lacak" value="Cari Data" class="icon-search"/>&nbsp;
			<input type="button" value="" id="lookup_karyawan" class="icon-filter"/>
		</form>
	</div>
	<div ID="divPageDataa"></div>
</body>
</html>