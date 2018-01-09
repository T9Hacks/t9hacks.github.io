<?php

function removeWhiteSpace($string) {
	return trim ($string, " \t\n\r\0\x0B");
}


function printArray($array) {
	if(is_array($array))
		echo '<pre>'.print_r($array, true).'</pre>';
	else 
		echo print_r($array, true);
}


?>