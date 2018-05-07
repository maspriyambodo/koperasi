<?php include 'h_tetap.php';?>
<script type="text/javascript" src="jQuery/jquery.paging.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){
		$('#tableData').paging({limit:8});
	});
	function showEdit(id) {
		var r = confirm("Anda Yakin Tagihan Di Retur/PKP?");
		if (r == false) {
			return false;
		}
		var dataString='id='+id;
		$.ajax({
			type: "GET",
			url	: 'retur_save.php',
			data: dataString,
			beforeSend: function () {
				$('#loading').show();
			},
			success	: function(data){
				alert(data);
				var text=data;
				$.notiflat(text,{animateIn: 'fade', animateOut: 'slide' });
				var n = data.search("Sukses");
				if(n==0){
					goKembali();
				}
				$('#loading').hide();
			}
		});
	}
	function goKembali() {
		$('#innertub').load('retur_kredit.php');
	}
</script>
<?php $norek=$result->c_d($_POST['nonas']);$tgl=$tanggal;$fieldss='a.noreks,a.ketnas';$branch=$result->c_d($_POST['branch']);include 'dist/_header.php';$flunas=0;$kode_cair=0;$norekl='';$sufixl='';echo '<table width="100%"><tr><th colspan="4" class="ui-state-highlight">DATA DEBITUR</th></tr>';include '_headerx.php';echo '</table><div id="divPageList">';include 'retur_page.php';echo '</div>'; ?>