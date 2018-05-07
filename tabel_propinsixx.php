<div class="table">
  <table width="100%">
	<thead>
	 <tr class="td" bgcolor="#e5e5e5">
	  	<th>No</th>
		<th>Kode</th>
		<th>Propinsi</th>
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
			<td><?php echo $row['kode'];?></td>
			<td><?php echo $row['desc1'];?></td>
			<td><?php echo $row['bussdate'];?></td>
		  </tr>
		 <?php
		 $no++;
		 }
	 }
	 ?>
	</tbody>
  </table>
</div>