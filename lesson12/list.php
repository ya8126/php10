<?php
	$data = array(
		'山田太郎'=>array('男','1965/12/14','東京市東町'),
		'横山花子'=>array('女','1975/09/21','神奈川市西町'),
		'田中一郎'=>array('男','1968/11/17','東京市南町'),
		'山本久美子'=>array('女','1972/01/24','東京市西町'),
		'鈴木次郎'=>array('男','1976/08/09','千葉市北町'),
		'星山裕子'=>array('その他','1967/05/07','茨城市東町'),
		'佐藤勝男'=>array('男','1980/12/15','東京市北町')
	);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>PHP入門教室</title>
</head>

<body>
名簿には<?php print count($data) ?>人が登録されています。
<table border="1">
	<tr>
		<th></th><th>名前</th><th>性別</th><th>誕生日</th><th>住所</th>
	</tr>
<?php
	foreach($data as $name => $prof){
		$img = "";
		$pos=mb_strpos($name, $_POST['keywd']);
		if ($pos !== FALSE){
			if ($prof[0] === '男'){
				$img = '../images/male.gif';
			}elseif ($prof[0] === '女'){
				$img = '../images/female.gif';
			}else{
				$img = '../images/other.gif';
			}
			print "<tr><td algin='center'><img src='$img' alt='$prof[0]'></td>";
			print "<td>$name</td>";
			foreach($prof as $item){
				print "<td>$item</td>";
			}
			print "</tr>";
		}
	}
?>
</table>
</body>
</html>

