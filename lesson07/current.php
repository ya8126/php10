<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>

<?php
	print'現在日時：'.date("T y年m月d日 w H:i:s");
	if (date("L") == 1)
		print '閏年';
?>

</body>
</html>

