<?php
	$org_file = fopen('guest.dat', 'rb');
	$tmp_file = fopen('guest.tmp', 'wb');
	flock($tmp_file, LOCK_EX);
	flock($org_file, LOCK_EX);
	fputs($tmp_file, date('Y年 m月 d日 H:i:s')."\t");
	fputs($tmp_file, $_POST['name']."\t");
	fputs($tmp_file, $_POST['message']."\n");
	while($row = fgets($org_file)){
		fputs($tmp_file, $row);
	}
	flock($org_file, LOCK_UN);
	fclose($org_file);
	unlink('guest.dat');
	flock($tmp_file, LOCK_UN);
	fclose($tmp_file);
	rename('guest.tmp', 'guest.dat');
	setcookie('name', $_POST['name'], time() + (60 * 60 * 24 * 90));
//	header('Location: http://localhost/php10/lesson21/guest_input.php');
//	header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guest_input.php');
	header('Location: guest_input.php');
