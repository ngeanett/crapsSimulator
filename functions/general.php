<?php

function output($message){
	echo $message;
	echo "<br/>";
	// log to file
}

function matchDice($needle, $haystack){
	if(in_array($needle, $haystack))
		return true;
}

?>