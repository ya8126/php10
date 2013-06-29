<?php
	require_once '../Encode.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PHP入門教室</title>
</head>

<body>
	<h3>ログインページ</h3>
	<hr>

	<form method="POST" action="<?php print(e($_SERVER["PHP_SELF"])); ?>">
		<div class="container">
			<label for="username">ユーザ名：</label><br>
			<input type="text" id="username" name="username" size="20" maxlength="30">
		</div>
		<div class="container">
			<label for="password">パスワード：</label><br>
			<input type="password" id="password" name="password" size="20" maxlength="30">
		</div>
		<input type="submit" name="submit" value="ログイン">
	</form>
</body>
</html>
