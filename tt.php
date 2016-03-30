<?php
//$xx='';
function xxx(){
	global $xx;
	$xx=123;
}	
function yyy(){
	global $xx;
	echo $xx;
}
xxx();
yyy();
echo $xx;
?>
