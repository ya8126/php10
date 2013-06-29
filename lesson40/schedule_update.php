<?php 
	$dbuser = 'phpusr';
	$dbpass = 'phppass';
	$dbconnect = 'mysql:host=localhost;dbname=php10;charset=utf8';
	try{
		$db = new PDO($dbconnect, $dbuser, $dbpass);
		if (isset($_POST['update'])){
			$stt = $db->prepare('UPDATE schedule SET title=:title, sdate=:sdate, stime=:stime, memo=:memo WHERE sid=:sid');
			$stt->bindValue(':title', $_POST['title']);
			$stt->bindValue(':sdate', $_POST['sdate_year'].'/'.$_POST['sdate_month'].'/'.$_POST['sdate_day']);
			$stt->bindValue(':stime', $_POST['stime_hour'].':'.$_POST['stime_minute']);
			$stt->bindValue(':memo', $_POST['memo']);
		}elseif (isset($_POST['delete'])){
			$stt = $db->prepare('DELETE FROM schedule WHERE sid=:sid');
		}
		$stt->bindValue(':sid', $_POST['sid']);
		$stt->execute();
	}catch(PDOException $e){
		die('エラーメッセージ：'.$e->getMessage());
	}
	header('Location:schedule_read.php');
