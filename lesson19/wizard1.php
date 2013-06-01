<?php
	require_once '../Encode.php';
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>
<h3>アンケート</h3>
<form method="POST" action="wizard2.php">
	<div id="container">
		<label for="name">名前：</label><br>
		<input type="text" id="name" name="name" value="<?= @$_SESSION['name'] ?>">
	</div>
	<div id="container">
		<label for="email">メールアドレス：</label><br>
		<input type="email" id="email" name="email" value="<?= @$_SESSION['email'] ?>">
	</div>
	<div id="container">
		<label for="zip">〒：</label><br>
		<input type="text" id="zip" name="zip" value="<?= @$_SESSION['zip'] ?>">
	</div>
	<div id="container">
		性別:<br>
		<?php
			$sexes = array('男性', '女性', 'その他');
			foreach($sexes as $sex){
				print '<label>';
				print "<input type='radio' name='sex' value='$sex'";
				if ($sex == @$_SESSION['sex']){
					print ' checked';
				}
				print ">$sex</label>";
			}
		?>
	</div>
	<input type="submit" value="次へ">
</form>

</body>
</html>
