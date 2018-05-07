<?php include "h_tetap.php";?>
<script type="text/javascript" src="java/_tambah_icon.js"></script>
<script type="text/javascript" src="jQuery/jquery.combobox.js"></script>
<script type="text/javascript">
	var url1='tabel_ttd1.php';
	$("select#branch").focus();
</script>
<div class="ui-widget-content" align="center">
	<form id="formsearch" name="formsearch" method="post" action="">
		KODE CABANG :
		<select name="branch" id="branch" class="combobox">
		<?php
		$hasil=$result->res("SELECT kode,nama FROM tblkantor ORDER BY nama");
		while ($row=$result->row($hasil)){
			if($kcabang==$row['kode']){
				echo "<option value=\"".$row['kode']."\"selected>".$row['nama']."</option>";
			}else{
				echo "<option value=\"".$row['kode']."\">" . $row['nama']."</option>";
			}
		}
		?>
		</select>
		<button type="button" id="lacak_data">Cari Data</button>
	</form>
</div>
<div ID="divPageHasil"></div>