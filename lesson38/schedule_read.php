<?php
	require_once '../Encode.php';

	$dbuser = 'phpusr';
	$dbpass = 'phppass';
	$dbconnect = 'mysql:host=localhost;dbname=php10;charset=utf8';
	try{
		$db = new PDO($dbconnect, $dbuser, $dbpass);
		$stt = $db->prepare('SELECT * FROM schedule ORDER BY sdate, stime');
		$stt->execute();
	}catch(PDOException $e){
		die('エラーメッセージ：'.$e->getMessage());
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP入門教室</title>
</head>

<body>
	<h3>簡易スケジュール帳</h3>
	
	<table border="1">
		<tr>
			<th>日付</th><th>時刻</th><th>予定名</th><th>備考</th><th></th>
		</tr>
<?php
		while ($row = $stt->fetch()){
			print '<tr>';
			print '<td>'.format($row['sdate'], 'Y/m/d').'</td>';
			print '<td>'.format($row['stime'], 'H:i').'</td>';
			print '<td>'.e($row['title']).'</td>';
			print '<td>'.e($row['memo']).'</td>';
			print '<td><a href="schedule_edit.php?sid='.e($row['sid']).'">編集</a></td>';
			print '</tr>';
		}
?>
	</table>			
</body>
</html>
