<table width="100%" class="table">
	<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">PRODUK</th>
		<th rowspan="2">NM PRODUK</th>
		<th>SB</th>
		<th>BTL</th>
		<th>ADM</th>
		<th>METERAI</th>
		<th>PREMI</th>
		<th>PROVISI</th>
		<th>DENDA</th>
		<th>HIT BUNGA</th>
		<th>PLAFON</th>
		<th rowspan="2">AKSI</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>GL POKOK</th>
		<th>GL BUNGA</th>
		<th>GL ADM</th>
		<th>GL DENDA</th>
		<th>GL BLOKIR</th>
		<th>GL PROVISI</th>
		<th>GL PREMI</th>
		<th>GL REFUN</th>
		<th>B TAGIH</th>
	</tr>
	</thead>
	<tfoot>
		<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">PRODUK</th>
		<th rowspan="2">NM PRODUK</th>
		<th>SB</th>
		<th>BTL</th>
		<th>ADM</th>
		<th>METERAI</th>
		<th>PREMI</th>
		<th>PROVISI</th>
		<th>DENDA</th>
		<th>HIT BUNGA</th>
		<th>PLAFON</th>
		<th rowspan="2">AKSI</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>GL POKOK</th>
		<th>GL BUNGA</th>
		<th>GL ADM</th>
		<th>GL DENDA</th>
		<th>GL BLOKIR</th>
		<th>GL PROVISI</th>
		<th>GL PREMI</th>
		<th>GL REFUN</th>
		<th>B TAGIH</th>
	</tr>
	</tfoot>
	<tbody>
	<?php
	$hasil=$result->query_x1("SELECT * FROM $tabel_produk ORDER BY kdproduk");$no=0;
	if($result->num($hasil)!=0){
		while($row = $result->row($hasil)){ 
			$kdkop=$row['HTAGIH'];
			include 'parameter/_kettagih.php';?>
			<tr>
				<td rowspan="2"><?php echo $row['KDPRODUK'];?></td>
				<td rowspan="2"><?php echo $row['NMPRODUK'];?></td>
				<td align="right"><?php echo $row['SUKU'];?></td>
				<td align="right"><?php echo $row['BBTL'];?></td>
				<td align="right"><?php echo $row['BADM'];?></td>
				<td align="right"><?php echo $row['BMETERAI'];?></td>
				<td align="right"><?php echo $row['BPREMI'];?></td>
				<td align="right"><?php echo $row['BPROVISI'];?></td>
				<td align="right"><?php echo $row['BDENDA'];?></td>
				<td align="right"><?php echo $xkdkop;?></td>
				<td align="right"><?php echo $row['MPLAFON'];?></td>
				<td align="center" rowspan="2">
				<a title="Edit Data" class="standar" onClick="showEdit(<?php echo $row['ID']; ?>)"><img src="css/images/edit.png"></a> 
				<a title="Menghapus Data" class="standar" onClick="showDelete(<?php echo $row["ID"]; ?>)"><img src="css/images/delete.png"></a>
				</td>
			</tr>
			<tr>
				<td align="right"><?php echo $row['SPOKOK'];?></td>
				<td align="right"><?php echo $row['SBUNGA'];?></td>
				<td align="right"><?php echo $row['SADM'];?></td>
				<td align="right"><?php echo $row['SDENDA'];?></td>
				<td align="right"><?php echo $row['SBTL'];?></td>
				<td align="right"><?php echo $row['SPROVISI'];?></td>
				<td align="right"><?php echo $row['SPREMI'];?></td>
				<td align="right"><?php echo $row['SREFUND'];?></td>
				<td align="right"><?php echo $row['BTAGIH'];?></td>
			</tr>
			<?php
			$no++;
		}
	}else{
		echo '<tr><td align="center" colspan="11" style="color: #ff0000">Data tidak ditemukan!</td></tr>';
	}
	?>
	</tbody>
</table>