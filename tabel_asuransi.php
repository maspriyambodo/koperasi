<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/jquery.multifilter.js"></script>
<script type="text/javascript" src="java/parameterx.js"></script>
<script type='text/javascript'>
	url1="tabel_asuransi01.php";
	url2="tabel_asuransi02?p=1";
	url3="tabel_asuransi02?p=2";
	url4="tabel_asuransi.php";
	uhead='DATA TABEL ASURANSI';
	lebar=600;
	tinggi=350;	
	$(document).ready(function() {
		$('.filter').multifilter()
		$(".select-all").click(function (){
			$('.chk-box').attr('checked', this.checked)
		});
		$(".chk-box").click(function(){
			if($(".chk-box").length == $(".chk-box:checked").length){
				$(".select-all").attr("checked", "checked");
			}else{
				$(".select-all").removeAttr("checked");
			}
		});
		jQuery(function($) {
			$("#tgl_mulai").mask("99-99-9999");
			$("#tgl_berakhir").mask("99-99-9999");
			$("#tgl_spk").mask("99-99-9999");
		});
	})
</script>
<style>
	.toggler { width: 500px; height: 200px; }
	#effect { width: 240px; height: 170px; padding: 0.4em; position: relative; }
	#effect h3 { margin: 0; padding: 0.4em; text-align: center; }
</style>
</head>
<body>
<div style="float: right;">
	<button id="tambah">Tambah Asuransi</button>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='nama_asuransi' placeholder='Nama Asuransi' data-col='nama asuransi'/>
</div>
<div ID="divPageData">
<div class="ui-widget-content">
	<table class="table-line">
	<thead>
		<tr class="ui-widget-header">
		<th><input type="checkbox" class="select-all" /></th>
		<th>NO</th>
		<th>KODE</th>
		<th>NAMA ASURANSI</th>
		<th>NO SURAT</th>
		<th>TGL SURAT</th>
		<th>TGL MULAI</th>
		<th>TGL BERAKHIR</th>
		<th>STATUS</th>
		<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$hasil=$result->query_x1("SELECT id,kode_asuransi,nama_asuransi,nomor_spk,tgl_spk,tgl_mulai,tgl_berakhir,status_asuransi FROM tbl_asuransi ORDER BY kode_asuransi");$no=1;
	if($result->num($hasil)>0){
		while($row=$result->row($hasil)){?>
		<tr>
			<td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['id']; ?>"/></td>
			<td><?php echo $no;?></td>
			<td><?php echo $row['kode_asuransi'];?></td>
			<td><?php echo $row['nama_asuransi'];?></td>
			<td><?php echo $row['nomor_spk'];?></td>
			<td><?php echo $row['tgl_spk'];?></td>
			<td><?php echo $row['tgl_mulai'];?></td>
			<td><?php echo $row['tgl_berakhir'];?></td>
			<td>
			<?php 
			if($row['status_asuransi']==1){
				echo 'ENABLE';
			}else{
				echo 'DISABLE';
			}
			?>
			</td>
			<td align="center">
			<a title="Edit Data" class="standar" onClick="showEdit(<?php echo $row['id']; ?>)"><img src="css/images/edit.png"></a><a title="Menghapus Data" class="standar" onClick="showDelete(<?php echo $row["id"]; ?>)"><img src="css/images/delete.png"></a>
			</td>
		</tr>
		<?php
		$no++;
		}
	}
	?>
	</tbody>
	</table>
</div>
</div>
<div id="dialog" style="display: none"></div>