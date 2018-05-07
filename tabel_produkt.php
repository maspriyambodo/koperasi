<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/jquery.multifilter.js"></script>
<script type="text/javascript" src="java/parameterx.js"></script>
<script>
	url1="tabel_produkt01.php";
	url2="tabel_produkt02.php?p=1";
	url3="tabel_produkt02.php?p=2";
	url4="tabel_produkt.php";
	uhead='DATA TABEL PRODUK TABUNGAN';
	lebar=800;
	tinggi=450;
	$(document).ready(function() {
		$('.filter').multifilter()
	})
</script>
<button id="tambah">Tambah Produk Tabungan</button>
<div class="ui-widget-content">
	<div id="divPageHasil">
		<div style="white-space: nowrap;">
			<?php include "tabel_produkt00.php";?>
		</div>
	</div>
</div>
<div id="dialog" style="display: none"></div>