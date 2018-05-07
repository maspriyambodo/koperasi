<?php include 'h_tetap.php';?>
<script type="text/javascript" src="java/parameterx.js"></script>
<script type="text/javascript" src="jQuery/jquery.tablesorter.widgets.js"></script>
<script type="text/javascript" src="parameter/tabel_sort.js"></script>
<script TYPE="text/javascript">
	url1="tabel_kcabang01.php";
	url2="tabel_kcabang02.php?p=1";
	url3="tabel_kcabang02.php?p=2";
	url4="tabel_kcabang.php";
	uhead='DATA TABEL KANTOR CABANG';
	lebar=550;
	tinggi=300;
</script>
<?php 
$hasil=$result->query_x1("SELECT id,kode,nama,alamat,no_telepon,no_handphone,no_fax,nama_email FROM $tabel_kantor ORDER BY kode");$no=1;
?>
<button id="tambah">Tambah Kantor Cabang</button>
<div class="ui-widget-content">
<div id="divPageHasil">
<div style="white-space: nowrap;">
	<table class="tablesorter">
		<thead>
			<tr>
				<th>Kode Cabang</th>
				<th>Nama Cabang</th>
				<th>Alamat Cabang</th>
				<th>No Telepon</th>
				<th>No Handphone</th>
				<th>No Fax</th>
				<th>Email</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Kode Cabang</th>
				<th>Nama Cabang</th>
				<th>Alamat Cabang</th>
				<th>No Telepon</th>
				<th>No Handphone</th>
				<th>No Fax</th>
				<th>Email</th>
				<th>Aksi</th>
			</tr>			
		</tfoot>
		<tbody><?php
		if($result->num($hasil)!=0){
			while($row = $result->row($hasil)){ ?>
				<tr>
					<td><?php echo $row['kode'];?></td>
					<td><?php echo $row['nama'];?></td>
					<td><?php echo $row['alamat'];?></td>
					<td><?php echo $row['no_telepon'];?></td>
					<td><?php echo $row['no_handphone'];?></td>
					<td><?php echo $row['no_fax'];?></td>
					<td><?php echo $row['nama_email'];?></td>
					<td align="center">
					<a title="Edit Data" class="icon-edit13" onClick="showEdit(<?php echo $row['id']; ?>)">&nbsp;</a>
					<a title="Menghapus Data" class="icon-remove13" onClick="showDelete(<?php echo $row["id"]; ?>)">&nbsp;</a>
					</td>
			  	</tr> <?php
			 	$no++;
			}
		}else{
			echo '<tr><td align="center" colspan="4" style="color: #ff0000">Data tidak ditemukan!</td></tr>';
		}?>
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
</div>
<div id="dialog" style="display: none"></div>
