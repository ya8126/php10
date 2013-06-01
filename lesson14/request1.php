<?php
	$defs = array(
		'name' => '山田太郎', 'email' => 'yamada@winfs.msn.to',
		'zip' => '100-0000', 'sex' => '男性', 'age' => '40',
		'os' => array('win', 'linux'), 'memo' => '特になし'
	);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>
<h3>アンケート</h3>
<form method="POST" action="request2.php">
	<div id="container">
		<label for="name">名前：</label><br>
		<input type="text" id="name" name="name" value="<?= $defs['name'] ?>">
	</div>
	<div id="container">
		<label for="email">Email：</label><br>
		<input type="email" id="email" name="email" value="<?= $defs['email'] ?>">
	</div>
	<div id="container">
		<label for="zip">〒：</label><br>
		<input type="text" id="zip" name="zip" value="<?= $defs['zip'] ?>">
	</div>
	<div id="container">
		性別:<br>
		<?php
			$sexes = array('男性', '女性', 'その他');
			foreach($sexes as $sex){
				print '<label>';
				print "<input type='radio' name='sex' value='$sex'";
				if ($sex == $defs['sex']){
					print ' checked="checked"';
				}
				print ">$sex</label>";
			}
		?>
	</div>
	<div id="container">
		<label for="age">年齢:</label><br>
		<select id='age' name='age'>
		<?php
			for($i = 10; $i <= 50; $i += 10){
				print "<option value='$i'";
				if ($i == $defs['age']){
					print ' selected="selected"';
				}
				print ">{$i}代</option>";
			}
		?>
		</select>
	</div>
	<div id="container">
		ご使用のＯＳ:<br>
		<?php
			$oss = array('win' => 'Windows', 'mac' => 'Mac', 'linux' => 'Linux');
			foreach($oss as $k_os => $v_os){
				print '<label>';
				print "<input type='checkbox' name='os[]' value='$k_os'";
				foreach ($defs['os'] as $os){
					if ($k_os == $os){
						print ' checked="checked"';
					}
				}
				print ">$v_os</label>";
			}
		?>
	</div>
	<div id="container">
		<label for="memo">サイトへのご意見：</label><br>
		<textarea rows="5" cols="30" id="memo" name="memo"><?= $defs['memo'] ?></textarea>
	</div>
	<input type="hidden" name="quest_num" value="XXX15204">
	<input type="submit" value="送信">
	<input type="number" value="25" min="0" max="50" step="5">
	<input type="search">
	<input type="color">
	<input type="time">
	<input type="datetime">
	<input type="range" value="25" min="0" max="50" step="5">
</form>

</body>
</html>
