<?php
	$file = fopen('guest.dat', 'ab');
	flock($file, LOCK_EX);
	fputs($file, date('Y年 m月 d日 H:i:s')."\t");
	fputs($file, $_POST['name']."\t");
	fputs($file, $_POST['message']."\n");
	flock($file, LOCK_UN);
	fclose($file);
//	header('Location: http://localhost/php10/lesson21/guest_input.php');
//	header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/guest_input.php');
	header('Location: guest_input.php');
