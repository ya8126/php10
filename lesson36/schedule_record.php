<?php 
	$dbuser = 'phpusr';
	$dbpass = 'phppass';
	$dbconnect = 'mysql:host=localhost;dbname=php10;charset=utf8';
	try{
		$db = new PDO($dbconnect, $dbuser, $dbpass);
		$stt = $db->prepare('INSERT INTO schedule(title, sdate, stime, memo) VALUES(:title, :sdate, :stime, :memo)');
		$stt->bindValue(':title', $_POST['title']);
		$stt->bindValue(':sdate', $_POST['sdate_year'].'/'.$_POST['sdate_month'].'/'.$_POST['sdate_day']);
		$stt->bindValue(':stime', $_POST['stime_hour'].':'.$_POST['stime_minute']);
		$stt->bindValue(':memo', $_POST['memo']);
		$stt->execute();
		$db = NULL;
	}catch(PDOException $e){
		die('エラーメッセージ：'.$e->getMessage());
	}
	header('Location:schedule_form.php');
