<div class="table">
  <table width="100%">
	<thead>
	 <tr class="td" bgcolor="#e5e5e5">
	  	<th>No</th>
		<th>Branch</th>
		<th>Kode Wilayah</th>
		<th>Nama Wilayah</th>
		<th>Tgl Input</th>
	  </tr>
	</thead>
	<tbody>
	<?php
	if($result->num($hasil)!=0){
		while($row = $result->row($hasil)){ 
			?>
		  <tr>
		  	<td><?php echo $no;?></td>
			<td><?php echo $row['branch'];?></td>
			<td><?php echo $row['kd'];?></td>
			<td><?php echo $row['nmkb'];?></td>
			<td><?php echo $row['tgl_input'];?></td>
		  </tr>
		 <?php
		 $no++;
		 }
	 }
	 ?>
	</tbody>
  </table>
</div>