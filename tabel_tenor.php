<?php include 'h.php';?>
<script type="text/javascript" src="jQuery/jquery.multifilter.js"></script>
<script type="text/javascript" src="java/parameterx.js"></script>
<script type='text/javascript'>
	url1="tabel_tenor01.php";
	url2="tabel_tenor02.php?p=1";
	url3="tabel_tenor02.php?p=2";
	url4="tabel_tenor.php";
	uhead='DATA TABEL TARIF PREMI';
	lebar=600;
	tinggi=300;
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
	})
</script>
<style>
	.toggler { width: 500px; height: 200px; }
	#effect { width: 240px; height: 170px; padding: 0.4em; position: relative; }
	#effect h3 { margin: 0; padding: 0.4em; text-align: center; }
</style>
<div style="float: right;">
	<button id="tambah">Tambah Tarif Asuransi</button>
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
			<th>UMUR DEBITUR</th>
			<th>JANGKA WAKTU</th>
			<th>TARIF PREMI</th>
			<th>AKSI</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$hasil=$result->query_x1("SELECT a.id,a.kode_asuransi,b.nama_asuransi,a.umur,a.jangka_waktu,a.tenor_premi FROM tbl_premi a JOIN tbl_asuransi b ON a.kode_asuransi=b.kode_asuransi ORDER BY a.kode_asuransi,a.jangka_waktu,tenor_premi");$no=1;
		if($result->num($hasil)>0){
			while($row=$result->row($hasil)){ ?>
			<tr>
				<td><input type="checkbox" name="chk[]" class="chk-box" value="<?php echo $row['id']; ?>"/></td>
				<td><?php echo $no;?></td>
				<td><?php echo $row['kode_asuransi'];?></td>
				<td><?php echo $row['nama_asuransi'];?></td>
				<td><?php echo $row['umur'];?></td>
				<td><?php echo $row['jangka_waktu'];?></td>
				<td><?php echo $row['tenor_premi'];?></td>
				<td align="center">
				<a title="Edit Data" class="standar" onClick="showEdit(<?php echo $row['id']; ?>)"><img src="css/images/edit.png"></a>
				<a title="Menghapus Data" class="standar" onClick="showDelete(<?php echo $row["id"]; ?>)"><img src="css/images/delete.png"></a>
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
