<?php
	$data = array('山田太郎','横山花子','田中一郎','山本久美子','鈴木次郎','星山裕子','佐藤勝男');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>
名簿には<?php print count($data) ?>人が登録されています。
<ol>
<?php
	$i = 0;
	while ($i < count($data)){
		print "<li>$data[$i]</li>";
		$i++;
	}
?>
</ol>
</body>
</html>

