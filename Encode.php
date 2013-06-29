<?php
	function e($str){
		return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
	}
	
	function format($datetime, $format = 'yyyy/MM/dd'){
		$ts = strtotime($datetime);
		return date($format, $ts);
	}
	
?>
