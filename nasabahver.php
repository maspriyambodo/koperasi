<?php include "h_tetap.php";?>
<script type="text/javascript" src="java/verivikasi.js"></script>
<script type="text/javascript">
	url1='nasabahvers.php';
	url2='nasabahverd.php';
	url3='nasabahver.php';
</script>
<div id="divPageData">
<a onclick="javascript:checkAll('kwitansi', true);" href="javascript:void();">Check all</a>
<a onclick="javascript:checkAll('kwitansi', false);" href="javascript:void();">Uncheck all</a>
<form name="kwitansi" id="kwitansi" method="post" action="">
	<table class="table-line">
		<thead>
			<tr>
				<th>Pilih</th>
				<th>Nonas</th>
				<th>Nama</th>
				<th>Alamat</th>
				<th>Kelurahan</th>
				<th>Kecamatan</th>
				<th>No KTP</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$hasil=$result->query_x1("SELECT id,nonas,nama,alamat,lurah,camat,noktp FROM nasabah WHERE status_cif=0 ORDER BY nama");
		$no=1;
		if($result->num($hasil)!=0){
			while($row = $result->row($hasil)){
			if($no%2==0)
				$clsname="even";
			else
				$clsname="odd";
			?>
			<tr class="<?php if(isset($clsname)) echo $clsname;?>">
			<td align="center"><input type="checkbox" name="id[]" value="<?php echo $row["id"];?>"></td>
			<td><?php echo $no ?></td>
			<td><?php echo $row['nama']; ?></td>
			<td><?php echo $row['alamat']; ?></td>
			<td><?php echo $row['lurah']; ?></td>
			<td><?php echo $row['camat']; ?></td>
			<td><?php echo $row['noktp']; ?></td>
			<td align="center"><a title="Detail Data Nasabah" class="icon-more" onClick="showEdit(<?php echo $row['id'];?>)">Detail</a></td>
			</tr> <?php 
			$no++;
			}
			echo '<tr>
			<td colspan="2"><input type="submit" value="Update" id="submit" class="icon-save"/></td>
			<td colspan="7">&nbsp;</td>
			</tr>';
		}else{
			echo '<tr><td align="center" colspan="9" style="color: #ff0000">Data Nasabah Tidak Ditemukan!</td></tr>';
		}?>
		</tbody>
		</table>
	</form>
</div>
<div id="dialog" style="display: none"></div>