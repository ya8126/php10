<?php
	require_once '../Encode.php';

	function showOption($start, $end, $step = 1){
		for($i = $start; $i <= $end; $i += $step){
			print '<option value="'.$i.'">'.$i.'</option>';
		}
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
<form method="POST" action="schedule_record.php">
	<div id="container">
		<label for="title">予定名：</label><br>
		<input type="text" id="title" name="title" size="50" maxlength="255">
	</div>
	<div class="container">
		日付：<br>
		<select id='sdate_year' name='sdate_year'>
			<?php showOption(2012, 2020); ?>
		</select>
		<label for="sdate_year">年</label>
		<select id='sdate_month' name='sdate_month'>
			<?php showOption(1, 12); ?>
		</select>
		<label for="sdate_month">月</label>
		<select id='sdate_day' name='sdate_day'>
			<?php showOption(1, 31); ?>
		</select>
		<label for="sdate_day">日</label>
	</div>
	<div class="container">
		時間：<br>
		<select id='stime_hour' name='stime_hour'>
			<?php showOption(0, 23); ?>
		</select>
		<label for="stime_hour">時</label>
		<select id='stime_minute' name='stime_minute'>
			<?php showOption(0, 59, 15); ?>
		</select>
		<label for="stime_minite">分</label>
	</div>
	<div id="container">
		<label for="memo">備考：</label><br>
		<input type="text" id="memo" name="memo" size="70" maxlength="255">
	</div>
	<input type="submit" value="登録">
</form>
</body>
</html>
