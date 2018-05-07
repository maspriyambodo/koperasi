<?php include "h_tetap.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1='daftar_susulan77.php';
	$("select#kkbayar").focus();
</script>
<?php $result->query_x1("CREATE TEMPORARY TABLE $userid SELECT b.kkbayar,b.nmbayar FROM $tabelSusulan a JOIN $tabel_kredit b ON a.norek=b.norek WHERE a.kdtran=111 GROUP BY b.kkbayar ORDER BY b.kkbayar");?>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		BULAN : 
		<input type="hidden" name="bln" id="bln" value="<?php echo $bln ;?>" size="3" readonly />
		<input type="text" name="nmbulan" id="nmbulan" value="<?php echo nmbulan($bln) ;?>" readonly/>
		<input type="text" name="thn" id="thn" value="<?php echo $thn ;?>" size="5" readonly />
		<select name="kkbayar" id="kkbayar" class="combobox" title="Pilih Kantor Bayar">
			<?php
			$hasil=$result->query_x1("SELECT kkbayar,nmbayar FROM $userid ORDER BY nmbayar");
			while ($data = $result->row($hasil)) {
				echo "<option value=\"".$data['kkbayar']."\">".$data['nmbayar']."</option>";
			}
			echo "<option selected='selected' value=9>KESELURUHAN</option>";
			?>
		</select>
		<button type="button" id="proses_data">Proses Realisasi Tagihana Susulan</button>
	</form>
</div>
<div ID="divPageHasil"></div>