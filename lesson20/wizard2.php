<?php
	require_once '../Encode.php';
	
	session_start();

	if (isset($_POST['name'])) {
		$_SESSION['name'] = $_POST['name'];
	}
	if (isset($_POST['email'])) {
		$_SESSION['email'] = $_POST['email'];
	}
	if (isset($_POST['sex'])) {
		$_SESSION['sex'] = $_POST['sex'];
	}
	if (isset($_POST['zip'])) {
		$_SESSION['zip'] = $_POST['zip'];
	}
	
	$token = md5(uniqid(mt_rand(), TRUE));
	$_SESSION['token'] = $token;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>
<h3>アンケート</h3>
<form method="POST" action="wizard3.php">
	<div id="container">
		<label for="age">年齢:</label><br>
		<select id='age' name='age'>
		<?php
			for($i = 10; $i <= 50; $i += 10){
				print "<option value='$i'";
				if ($i == @$_SESSION['age']){
					print ' selected';
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
				if (isset($_SESSION['os'])){
					foreach ($_SESSION['os'] as $os){
						if ($k_os == $os){
							print ' checked';
						}
					}
				}
				print ">$v_os</label>";
			}
		?>
	</div>
	<div id="container">
		<label for="memo">サイトへのご意見：</label><br>
		<textarea rows="5" cols="30" id="memo" name="memo"><?= @$_SESSION['memo'] ?></textarea>
	</div>
	<input type="hidden" name="quest_num" value="XXX15204">
	<input type="hidden" name="token" value="<?= $token ?>">
	<input type="button" value="前へ" onclick="location.href='wizard1.php'" >
	<input type="submit" value="送信">
</form>

</body>
</html>
