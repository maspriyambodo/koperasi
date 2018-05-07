<?php 
$agent=$_SERVER['HTTP_USER_AGENT'];
$uri=$_SERVER['REQUEST_URI'];
$ip=$_SERVER['REMOTE_ADDR'];
$ref=$_SERVER['HTTP_REFERER'];
$asli=$_SERVER['REMOTE_ADDR'];
$entry_line = "IP asli : ".$ip." || Browser : ". $agent." || URL : ". $uri." ||Referrer : ". $ref." ||Proxy : ".$asli;
write_log("User : ".$userid." ".$catat." || ".$entry_line);
?>