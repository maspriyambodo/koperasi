<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.multifilter.js"></script>
<script type='text/javascript'>
$(document).ready(function() {
      $('.filter').multifilter()
})
function deleteItem(id) {
	var r = confirm("Anda Yakin Data Dihapus...?");
	if (r == false) {
		return false;
	}
	var dataString='id='+id;
	$.ajax({
		type: "GET",
		url	: "parameter/ripaddres.php",
		data	: dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success	: function(data){
			goKembali();
			$('#loading').hide();
			alert(data);
		}
	});
}
function goKembali() {
	$('#innertub').load('resetaddres.php');
}
</script>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='ipaddress' placeholder='Search IP Addres' data-col='ip address'/>
</div>
<div class='container'>
	<table class="table-line">
		<thead>
			  <tr>
			  	<th>NO</th>
				<th>IP ADDRESS</th>
				<th>LOGIN COUNT</th>
				<th>WAKTU LOGIN</th>
				<th>AKSI</th>
			  </tr>
		</thead>
	<tbody>
	<?php
	$hasil=$result->query_lap("SELECT id,ipchek,logincount,timein FROM ipvalidasi");$no=1;
	while($row = $result->row($hasil)){ ?>
		<tr>
		  	<td><?php echo $no;?></td>
			<td><?php echo $row['ipchek'];?></td>
			<td><?php echo $row['logincount'];?></td>
			<td><?php echo $row['timein'];?></td>
			<td align="center"><a title="Delete Capcha User ID" class="icon-remove13" onClick="deleteItem(<?php echo $row["id"]; ?>)">&nbsp;</a></td>
		</tr>
		<?php
		$no++;
	}
	?>
	</tbody>
	</table>
</div>