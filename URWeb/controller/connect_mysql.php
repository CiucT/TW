<?php
function conexiune_mysql($host = 'localhost', $user = 'root', $pass = 'urweb16', $db = 'URWeb') {
	$cm = mysqli_connect($host, $user, $pass, $db);

	if (!$cm) {
		throw new Exception(mysqli_error($cm));
	}

	if (!mysqli_set_charset($cm, 'utf8')) {
		throw new Exception('Nu pot seta codarea caracterelor la UTF-8.');
	}
	
	return $cm;

}
?>