<?php include 'h_tetap.php';?>
<script type="text/javascript">
$(document).ready(function(){
	$( "#tagihan" ).button().on( "click", function() {
		var url='ekspor/tagihan.php';
		newwindow=window.open(url);
		return false;
	});
	$( "#kredit" ).button().on( "click", function() {
		var url='ekspor/nominatif.php';
		newwindow=window.open(url);
		return false;
	});	
	$( "#tabungan" ).button().on( "click", function() {
		var url='ekspor/tabungan.php';
		newwindow=window.open(url);
		return false;
	});
	$( "#transaksi" ).button().on( "click", function() {
		var url='ekspor/transaksi.php';
		newwindow=window.open(url);
		return false;
	});
	$( "#angsuran" ).button().on( "click", function() {
		var url='ekspor/angsuran.php';
		newwindow=window.open(url);
		return false;
	});
	$( "#nasabah" ).button().on( "click", function() {
		alert('Under Construction');
		return false;
	});	
});
  $(function() {
	$( "#tagihan" ).button({
		text: true,
		icons: {
			primary: "ui-icon-document"
		}
	});
	$( "#kredit" ).button({
		text: true,
		icons: {
			primary: "ui-icon-document"
		}
	});
	$( "#tabungan" ).button({
		text: true,
		icons: {
			primary: "ui-icon-document"
		}
	});
	$( "#transaksi" ).button({
		text: true,
		icons: {
			primary: "ui-icon-document"
		}
	});
	$( "#angsuran" ).button({
		text: true,
		icons: {
			primary: "ui-icon-document"
		}
	});
	$( "#nasabah" ).button({
		text:  true,
		icons: {
			primary: "ui-icon-document"
		}
	});	
});
</script>
<style>
	#toolbar {
		padding: 4px;
		display: inline-block;
	}
	/* support: IE7 */
	*+html #toolbar {
		display: inline;
	}
</style>
<div class="ui-widget">
	<div id="toolbar" class="ui-widget-header ui-corner-all">
		<button id="tagihan">Ekspor Data Tagihan</button>
		<button id="kredit">Ekspor Data Kredit</button>
		<button id="tabungan">Ekspor Data Tabungan</button>
		<button id="transaksi">Ekspor Data Transaksi</button>
		<button id="angsuran">Ekspor Data Angsuran</button>
		<button id="nasabah">Ekspor Data Nasabah</button>
	</div>
</div>