<?php
function random_char($panjang) { 
	$karakter = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
	$string = ''; 
	for ( $i = 0; $i < $panjang; $i++ ) { 
		$pos = rand( 0, strlen( $karakter ) - 1 ); 
		$string .= $karakter{$pos}; 
	} 
return $string;
}
?>