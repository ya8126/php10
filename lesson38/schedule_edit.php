<?php
	require_once '../Encode.php';

	function showOption($start, $end, $default, $step = 1){
		for($i = $start; $i <= $end; $i += $step){
			print '<option value="'.$i.'"';
			if ($i === (int)$default) {
				print ' selected';
			}
			print '>'.$i.'</option>';
		}
	}

	$dbuser = 'phpusr';
	$dbpass = 'phppass';
	$dbconnect = 'mysql:host=localhost;dbname=php10;charset=utf8';
	try{
		$db = new PDO($dbconnect, $dbuser, $dbpass);
		$stt = $db->prepare('SELECT * FROM schedule WHERE sid = :sid');
		$stt->bindValue(':sid', $_GET['sid']);
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
	
<?php 
	if ($row = $stt->fetch()){
		$sdate = strtotime($row['sdate']);
		$stime = strtotime($row['stime']);
?>
		<form method="POST" action="schedule_update.php">
			<input type='hidden' name='sid' value="<?php print e($row['sid']); ?>">
		
			<div id="container">
				<label for="title">予定名：</label><br>
				<input type="text" id="title" name="title" size="50" maxlength="255" value="<?php print e($row['title']); ?>">
			</div>
			<div class="container">
				日付：<br>
				<select id='sdate_year' name='sdate_year'>
					<?php showOption(2012, 2020, date('Y', $sdate)); ?>
				</select>
				<label for="sdate_year">年</label>
				<select id='sdate_month' name='sdate_month'>
					<?php showOption(1, 12, date('n', $sdate)); ?>
				</select>
				<label for="sdate_month">月</label>
				<select id='sdate_day' name='sdate_day'>
					<?php showOption(1, 31, date('j', $sdate)); ?>
				</select>
				<label for="sdate_day">日</label>
			</div>
			<div class="container">
				時間：<br>
				<select id='stime_hour' name='stime_hour'>
					<?php showOption(0, 23, date('G', $stime)); ?>
				</select>
				<label for="stime_hour">時</label>
				<select id='stime_minute' name='stime_minute'>
					<?php showOption(0, 59, date('i', $stime), 15); ?>
				</select>
				<label for="stime_minite">分</label>
			</div>
			<div id="container">
				<label for="memo">備考：</label><br>
				<input type="text" id="memo" name="memo" size="70" maxlength="255" value="<?php print e($row['memo']); ?>">
			</div>
			<input type="submit" name="update" value="更新">
			<input type="submit" name="delete" value="削除" onclick="return confirm('本当に削除しますか？')" >
		</form>
<?php
	} else {
		print '該当データなし';
	}
?>
</body>
</html>
