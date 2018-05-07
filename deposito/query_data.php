<?php
$result=$mysql->query($text);
 if($result) {
 	 $count = $result->num_rows;
}else{ ?>
	<p><div class="ui-state-error ui-corner-all" style="padding: 0 .7em;"> 
	<span class="ui-icon ui-icon-alert" 
		style="float: left; margin-right: .3em;"></span>
		<strong>Alert : </strong>
		<?php 
			$error=mysqli_errno($mysql);$err='';
			include 'query_data_error.php';
			die("Query failed, ".$err." Error No :".$error);
		?>
	</div></p>
	<?php
}
?>