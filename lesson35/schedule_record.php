<?php 
	try{
		$db = new PDO('mysql:host=localhost;dbname=php10;charset=utf8','phpusr','phppass');
		print 'データベースに接続できました';
		$db = NULL;
	}catch(PDOException $e){
		die('エラーメッセージ：'.$e->getMessage());
	}
?>

