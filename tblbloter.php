<?php include "auth.php";include 'Lib/function.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8" />
<title>Tambah ID Bloter</title>
<script type="text/javascript" src="js/global.js"></script>
<script type="text/javascript" src="jQuery/formatinput.js"></script>
<script type="text/javascript" src="jQuery/multifilter.js"></script>
<script type="text/javascript" src="jQuery/combobox.js"></script>
<script type='text/javascript'>
$(document).ready(function() {
	$('.filter').multifilter();
})
$( "#tambah" ).button().on( "click", function() {
	var id=0;
	showEdit(id);
});
function showDetail(id) {
	var dataString='id='+id;
	$.ajax({
		url	: "bloter/tbloterv.php",
		type: "GET",
		data:dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success: function(data){ 
			$('#dialog').html(data); 
			$('#loading').hide();
			$("#dialog").dialog({
				title:"View Details",
				height: 450,
				width: 800,
				buttons:{
					Ok: function (){
					$(this).dialog('close');
					}  
				},
				modal: true
			})
		}
	});
}
function showEdit(id) {
	var dataString='id='+id;
	$.ajax({
		type:"GET",
		url:"bloter/tbloterf.php",
		data:dataString,
		beforeSend: function () {
			$('#loading').show();
		},
		success:function(data){
			$('#dialog').html(data); 
			$('#loading').hide();
			$("#dialog").dialog({
				title:"Pendataan ID Bloter Transaksi",
				height: 450,
				width: 800,
				modal: true ,
				buttons: {
					Simpan: function() {
						$.ajax({
							type: 'POST',
							url : 'bloter/tbloters.php?p=1',
							data: $('#formm').serialize(),
							beforeSend: function () {
								$('#loading').show();
							},
							success: function (data) {
								if(data=='Sukses'){
									$("#dialog" ).dialog('close');
									goKembali();
								}
								$('#loading').hide();
								alert(data);
							}
						});
					},
					close: function() {
						$(this).dialog('close');
						goKembali();
					}
				}
			})
		}
	});
	return false;
}
function showDelete(id) {
	var r = confirm("Anda yakin data di hapus?");
	if (r == false) {
		return false;
	}
	var dataString='id='+id+'&p=2';
	$.ajax({
		type: "GET",
		url	: "bloter/tbloters.php",
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
	$('#innertub').load('tblbloter.php');
}
</script>
</head>
<?php
include 'koneksi.php';
$result = $mysql->query("SELECT id,branch,userid,bloterid,saldo_awal,mutasi_debet,mutasi_kredit,saldo_akhir,valid,date_open,date_expire FROM tbl_bloter WHERE branch='$kcabang' ORDER BY userid");include 'pesanerra.php';?>
<body>
<div style="float: right;"> <?php
	if($level<3){
		echo '<button id="tambah">Tambah Bloter</button>';
	} ?>
</div>
<div class='filter-container'>
	<input autocomplete='off' class='filter' name='userid' placeholder='search' data-col='user id'/>
</div>
<div ID="divPageData">
	<div class='container' style="padding-top: 5px">
		<table class="table-line">
			<thead>
				<tr>
					<th>NO</th>
					<th>BRANCH</th>
					<th>USER ID</th>
					<th>BLOTER ID</th>
					<th>SALDO AWAL</th>
					<th>MUTASI DEBET</th>
					<th>MUTASI KREDIT</th>
					<th>SALDO AKHIR</th>
					<th>STATUS</th>
					<th>ACTION</th>
				</tr>
			</thead>
			<tbody><?php
				$no=1;
				if(mysqli_num_rows($result)!=0){
					while($row = mysqli_fetch_array($result)){ ?>
						<tr class="td">
							<td><?php echo $no;?></td>
							<td><?php echo $row['branch'];?></td>
							<td><?php echo $row['userid'];?></td>
							<td><?php echo $row['bloterid'];?></td>
							<td align="right"><?php echo $row['saldo_awal'];?></td>
							<td align="right"><?php echo $row['mutasi_debet'];?></td>
							<td align="right"><?php echo $row['mutasi_kredit'];?></td>
							<td align="right"><?php echo $row['saldo_akhir'];?></td>
							<?php if($row['valid']==0){ ?>
								<td style="color: #4fbc43"><?php echo 'Enable' ;?></td>
							<?php }else{ ?>
								<td style="color:#ec0000"><?php echo 'Disable';?></td>
							<?php }
							if($level<3){ ?>
								<td align="center">
									<a class="standar" onClick="showEdit(<?php echo $row['id']; ?>)"><img src="css/images/edit.png">Edit</a>  
									<a class="standar" onClick="showDelete(<?php echo $row["id"]; ?>)"><img src="css/images/delete.png">Hapus</a> 
									<a class="standar" onClick="showDetail(<?php echo $row['id'];?>)"><img src="css/images/detail.png">Detail</a>
								</td> <?php
							}else{ ?>
								<td align="center">
									<a class="standar" onClick="showDetail(<?php echo $row['id'];?>)"><img src="css/images/detail.png">Detail</a>
								</td> <?php
							}?>
						</tr> <?php
						$no++;
					}
				}else{ ?>
					<tr><td colspan="10" align="center">Data Bloter Massih Kosong ??</td></tr> <?php
				} ?>
			</tbody>
		</table>
	</div>
</div>
<div id="dialog" style="display: none"></div>
</body>
</html>
