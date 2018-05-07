<?php include 'auth.php';?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script TYPE="text/javascript">
	var url1='inventaris_05a.php';
	$("input#nonas").focus();
	$("#lookup_inven").lookupbox({
		title: 'Daftar Inventaris',
		url	 : 'lookup/lookup_inventaris.php?chars=',
		imgLoader: '<img src="images/load.gif">',
		onItemSelected: function(data)	{
			var str = data.no_inventaris;
			var res = str.substr(-5);
			$('input[name=nonas]').val(str);
		},
		tableHeader: ['Branch','No Inventaris','Nama Inventaris','Nilai Perolehan','Nilai Penyusutan']
	});
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		NO INVENTARIS : 
		<input type="text" name="nonas" id="nonas" size="35"  maxlength="30" onKeyUp="caps(this)" autocomplete="off"/>
		<button type="button" id="lookup_inven">&nbsp;</button>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>