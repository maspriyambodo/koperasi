<?php include 'h_tetap.php';?>
<script type='text/javascript'>
	$(function(){
		$( "#tgl_spk" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
		$( "#tgl_mulai" ).datepicker({
			dateFormat:"dd-mm-yy",
		});
		$( "#tgl_berakhir" ).datepicker({
			dateFormat:"dd-mm-yy",
		});		
	});
</script>
</head>
<body>
<?php
$id=$result->c_d($_GET['id']);
$hasil=$result->query_x1("SELECT id,kode_asuransi,nama_asuransi,nomor_spk,tgl_spk,tgl_mulai,tgl_berakhir,status_asuransi FROM tbl_asuransi WHERE id='$id' ORDER BY kode_asuransi");
$row= $result->row($hasil);
?>
<div class="ui-widget-content" align="center">
<form name="formm" id="formm" method="post" action="">
<table width="100%">
	<input type="hidden" name="id" id="id" value="<?php echo $row['id'];?>"/>
	<tr>
		<td>Kode Asuransi</td>
		<?php
		if($row['kode_asuransi']==""){ ?>
			<td>: <input type="text" name="kode_asuransi" id="kode_asuransi" value="<?php echo $row['kode_asuransi'];?>" size="37" maxlength="5"/></td> <?php
		}else{ ?>
			<td>: <input type="text" readonly name="kode_asuransi" id="kode_asuransi" value="<?php echo $row['kode_asuransi'];?>" size="37" maxlength="5"/></td> <?php
		}
		?>
	</tr>
	<tr>		
		<td>Nama Asuransi</td>
		<td>: <input type="text" name="nama_asuransi" id="nama_asuransi" value="<?php echo $row['nama_asuransi'];?>" size="37" maxlength="35"/></td>
	</tr>
	<tr>
		<td>Nomor Perjanjian</td>
		<td>: <input type="text" name="nomor_spk" id="nomor_spk" value="<?php echo $row['nomor_spk'];?>" size="37" maxlength="30"/></td>
	</tr>
	<tr>
		<td>Tanggal Perjanjian</td>
		<td>: <input type="text" name="tgl_spk" id="tgl_spk" value="<?php echo date_sql($row['tgl_spk']);?>" size="37" maxlength="10"/></td>
	</tr>
	<tr>
		<td>Tanggal Mulai</td>
		<td>: <input type="text" name="tgl_mulai" id="tgl_mulai" value="<?php echo date_sql($row['tgl_mulai']);?>" size="37" maxlength="10"/></td>
	</tr>
	<tr>		
		<td>Tanggal Perjanjian</td><td>: 
		<input type="text" name="tgl_berakhir" id="tgl_berakhir" value="<?php echo date_sql($row['tgl_berakhir']);?>" size="37" maxlength="10" /></td>
	</tr>
	<tr>
		<td>Status Asuransi</td><td>:
		<select name="status_asuransi" id="status_asuransi" class="combobox">
			<?php
			$huruf = array("DISABLE","ENABLED");
			$i = 0;
			while($i<2){
				if ($row['status_asuransi'] == $i) echo 
					"<option value='".$i."' selected>".$huruf[$i]."</option>";
				else 
					 echo "<option value='".$i."'>".$huruf[$i]."</option>";
			$i++;
			} ?>
		 </select>
		</td>
		<td colspan="2">&nbsp;</td>
	</tr>
	</table>
</form>
</div>