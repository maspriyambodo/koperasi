<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/rpt_akuntansi.js"></script>
<script type="text/javascript">
	var url1="akuntansi/neracarra001.php?p=1";
	var url2="akuntansi/neracarra001";
	var url3="akuntansi/neracarrp001.php?p=1";
	var url4="akuntansi/neracarrp001";
	var url5="akuntansi/neracakwj001.php?p=1";
	var url6="akuntansi/neracakwj001";
</script>
<div class="ui-widget-content" align="center">
	<input type="hidden" id="cetakpdf" name="cetakpdf"/>
	TANGGAL 
	<input type="text" id="tgl1" name="tgl1" size="15" maxlength="10" value="<?php echo $tanggal;?>"/>
	<?php
	if($level<3 OR $level==6){
		echo '<select name="branch" id="branch">';
		$hasil = $result->res("select kode,nama from $tabel_kantor order by kode");
		while ($data = $result->row($hasil)) {
			$pilih=$data['kode'].' '.$data['nama'];
			if ($kcabang==$data['kode']){
				echo "<option value=\"".$data['kode']."\" selected>".$pilih."</option>";
			}else{
				echo "<option value=\"".$data['kode']."\">".$pilih."</option>";
			}
		}
		echo '</select>';
	 }else{
		echo '<input type="text" name="branch" id="branch" value="'.$kcabang.'" size="6" maxlength="4" readonly/>';
	}
	?>
	<button id="neraca1">Laporan Rincian RRA</button>
	<button id="neraca2">Laporan Rincian RRP</button>
	<button id="neraca3">Laporan Rincian Kewajiban</button>
</div>
<button id="btnpdf">PDF</button>
<div id="divPageLaporan"></div>