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
<h3>ゲストブック書き込み</h3>
<form method="POST" action="guest_write.php">
	<div id="container">
		<label for="name">お名前：</label>
		<input type="text" id="name" name="name" size="20" maxlength="30"
				value="<?php print e($_COOKIE['name']); ?>">
	</div>
	<div id="container">
		<label for="message">メッセージ：</label>
		<input type="text" id="message" name="message" size="70" maxlength="255">
	</div>
	<input type="submit" value="送信">
</form>
</body>
</html>
