<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/jquery.multifilter.js"></script>
<script type="text/javascript" src="java/parameter.js"></script>
<script>
	url1="tabel_produk01.php";
	url2="tabel_produk02.php?p=1";
	url3="tabel_produk02.php?p=2";
	url4="tabel_produk.php";
	uhead='DATA TABEL PRODUK KREDIT';
	$(document).ready(function() {
		$('.filter').multifilter()
	})
</script>
<button id="tambah">Tambah Produk Kredit</button>
<div class="ui-widget-content">
	<div id="divPageHasil">
		<div style="white-space: nowrap;">
			<?php include "tabel_produk00.php";?>
		</div>
	</div>
</div>
<div id="dialog" style="display: none"></div>
