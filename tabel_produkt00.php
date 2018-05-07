<table width="100%" class="table">
	<thead>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">PRODUK</th>
		<th rowspan="2">NAMA PRODUK</th>
		<th rowspan="2">SALDO MIN</th>
		<th rowspan="2">SET AWAL</th>
		<th>BUNGA 1</th>
		<th>BUNGA 2</th>
		<th>BUNGA 3</th>
		<th rowspan="2">MIN PAJAK</th>
		<th rowspan="2">ADM</th>
		<th rowspan="2">HIT BUNGA</th>
		<th rowspan="2">GL PAJAK</th>
		<th rowspan="2">GL BUNGA</th>
		<th rowspan="2">GL ADM</th>
		<th style="text-align:center" rowspan="2">AKSI</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>SALDO 1</th>
		<th>SALDO 2</th>
		<th>SALDO 3</th>
	</tr>
	</thead>
	<tfoot>
	<tr class="td" bgcolor="#e5e5e5">
		<th rowspan="2">PRODUK</th>
		<th rowspan="2">NAMA PRODUK</th>
		<th rowspan="2">SALDO MIN</th>
		<th rowspan="2">SET AWAL</th>
		<th>BUNGA 1</th>
		<th>BUNGA 2</th>
		<th>BUNGA 3</th>
		<th  rowspan="2">MIN PAJAK</th>
		<th  rowspan="2">ADM</th>
		<th  rowspan="2">HIT BUNGA</th>
		<th  rowspan="2">GL PAJAK</th>
		<th  rowspan="2">GL BUNGA</th>
		<th  rowspan="2">GL ADM</th>
		<th style="text-align:center" rowspan="2">AKSI</th>
	</tr>
	<tr class="td" bgcolor="#e5e5e5">
		<th>SALDO 1</th>
		<th>SALDO 2</th>
		<th>SALDO 3</th>
	</tr>
	</tfoot>
	<tbody>
	<?php
	$hasil=$result->query_x1("SELECT * FROM $tabel_produkt ORDER BY kdproduk");$no=0;
	if($result->num($hasil)!=0){
		while($r =$result->row($hasil)){ ?>
		<tr>
			<td rowspan="2"><?php echo $r['KDPRODUK']; ?></td>
			<td rowspan="2"><?php echo $r['NMPRODUK']; ?></td>
			<td align="right" rowspan="2"><?php echo number_format($r['SMINIMUM']); ?></td>
			<td align="right" rowspan="2"><?php echo number_format($r['SAWAL']); ?></td>
			<td align="right"><?php echo $r['BUNGA1']; ?></td>
			<td align="right"><?php echo $r['BUNGA2'];?></td>
			<td align="right"><?php echo $r['BUNGA3']; ?></td>
			<td align="right" rowspan="2"><?php echo number_format($r['SALDO4']);?></td>
			<td align="right" rowspan="2"><?php echo number_format($r['ADM']); ?></td>
			<td align="right" rowspan="2">
			<?php if($r['HBUNGA']==1){
				echo 'HARIAN';
			}elseif($r['HBUNGA']==2){
				echo 'BULANAN';
			}else{
				echo '';
			}?></td>
			<td rowspan="2"><?php echo $r['SPAJAK']; ?></td>
			<td rowspan="2"><?php echo $r['SBUNGA']; ?></td>
			<td rowspan="2"><?php echo $r['SADM']; ?></td>
			<td align="center" rowspan="2" width="10%">
			<a title="Edit Data" class="standar" onClick="showEdit(<?php echo $r['ID']; ?>)"><img src="css/images/edit.png"></a>
			<a title="Menghapus Data" class="standar" onClick="showDelete(<?php echo $r["ID"]; ?>)"><img src="css/images/delete.png"></a>
			</td>
		</tr>
		<tr>
			<td align="right"><?php echo number_format($r['SALDO1']); ?></td>
			<td align="right"><?php echo number_format($r['SALDO2']); ?></td>
			<td align="right"><?php echo number_format($r['SALDO3']); ?></td>
		</tr>
		<?php 
		$no++;
		} 
	}else{
		echo '<tr><td align="center" colspan="11" style="color: #ff0000">Data tidak ditemukan!</td></tr>';
	}?>
	</tbody>
</table>