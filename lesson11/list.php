<?php
	$data = array(
	'山田太郎'=>'東京市東町',
	'横山花子'=>'神奈川市西町',
	'田中一郎'=>'東京市南町',
	'山本久美子'=>'東京市西町',
	'鈴木次郎'=>'千葉市北町',
	'星山裕子'=>'茨城市東町',
	'佐藤勝男'=>'東京市北町');
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
	foreach($data as $name => $address){
		print "<dt>$name</dt>";
		print "<dd>$address</dd>";
	}
?>
</ol>
</body>
</html>

