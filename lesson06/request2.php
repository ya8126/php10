<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>
こんにちは
<?php
	print htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
?>
さん！

</body>
</html>

