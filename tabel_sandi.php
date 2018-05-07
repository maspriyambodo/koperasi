<?php include "h_tetap.php";?>
<script type="text/javascript" src="parameter/parameter.js"></script>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<script type='text/javascript'>
	url1="tabel_sandi01.php";
	url2="tabel_sandi02.php?p=1";
	url3="tabel_sandi02.php?p=2";
	url4="tabel_sandi.php";
</script>
<?php 
$hasil = $result->query_lap("SELECT id,nonas,sufix,norekgl,norekgsl,norekgssl,nama,produk,kode,tarik FROM akuntansi.sandim ORDER BY norekgssl");
$no=1;
?>
<div style="float:left"><button id="tambah">Tambah Rekening Akuntansi</button></div>
<div ID="divPageHasil">
	<div class="ui-widget-content">
		<table class="tablesorter">
			<thead>
				<tr>
					<th>Nonas</th>
					<th>Sufix</th>
					<th>No GL</th>
					<th>No GSL</th>
					<th>No GSSL</th>
					<th>Nama</th>
					<th>Produk</th>
					<th>Kode</th>
					<th>Auth</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th>Nonas</th>
					<th>Sufix</th>
					<th>No GL</th>
					<th>No GSL</th>
					<th>No GSSL</th>
					<th>Nama</th>
					<th>Produk</th>
					<th>Kode</th>
					<th>Auth</th>
					<th>Aksi</th>
				</tr>
			</tfoot>
			<tbody>
			<?php
			while($row = $result->row($hasil)){?>
				<tr>
					<td><?php echo $row['nonas'];?></td>
					<td><?php echo $row['sufix'];?></td>
					<td><?php echo $row['norekgl'];?></td>
					<td><?php echo $row['norekgsl'];?></td>
					<td><?php echo $row['norekgssl'];?></td>
					<td><?php echo $row['nama'];?></td>
					<td><?php echo $row['produk'];?></td>
					<td><?php echo $row['kode'];?></td>
					<td><?php if($row['tarik']==0){echo 'YA';}else{echo 'TIDAK';} ?></td>
					<td align="center">
					<a title="Edit Data" class="icon-edit13" onClick="showEdit(<?php echo $row['id']; ?>)">Edit</a>
					<a title="Menghapus Data" class="icon-remove13" onClick="showDelete(<?php echo $row["id"]; ?>)">Hapus</a>
					</td>
				</tr>
				<?php
				$no++;
			}
			?>
			</tbody>
		</table>
	</div>
	<div id="pager" class="pager">
	  <form>
	    <img src="css/images/first.gif" class="first"/>
	    <img src="css/images/prev.gif" class="prev"/>
	    <span class="pagedisplay" data-pager-output-filtered="{startRow:input} &ndash; {endRow} / {filteredRows} of {totalRows} total rows"></span>
	    <img src="css/images/next.gif" class="next"/>
	    <img src="css/images/last.gif" class="last"/>
	    <select class="pagesize">
	      <option value="10">10</option>
	      <option value="20">20</option>
	      <option value="30">30</option>
	      <option value="40">40</option>
	      <option value="all">All Rows</option>
	    </select>
	  </form>
	</div>	
</div>
<div id="dialog" style="display: none"></div>