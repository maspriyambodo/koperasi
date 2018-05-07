<?php include "h_tetap.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1='daftar_susulan51.php';
	$("select#kkbayar").focus();
</script>
<?php $result->query_x1("CREATE TEMPORARY TABLE $userid SELECT b.kkbayar,b.nmbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.kdtran=333 AND a.branch='$kcabang' GROUP BY b.kkbayar ORDER BY b.kkbayar");?>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		KANTOR BAYAR : 
		<select name="kkbayar" id="kkbayar" class="combobox">
			<?php
			$hasil=$result->res("SELECT kkbayar,nmbayar FROM $userid ORDER BY nmbayar");
			while ($data = $result->row($hasil)) {
				echo "<option value=\"".$data['kkbayar']."\">".$data['nmbayar']."</option>";
			}
			echo "<option selected='selected' value=9>KESELURUHAN</option>";
			?>
		</select>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>