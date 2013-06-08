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
	<h3>ゲストブック（閲覧）</h3>
	<?php
		$datas = @file('../lesson21/guest.dat') or die('ファイルが開けませんでした');
		print '<dl>';
		foreach(array_reverse($data) as $datum){
			$row = explode("\t", $datum);
			print '<dt>'. e($row[1]). '(' . e($row[0]). ')</dt>';
			print '<dd>メッセージ：'. e($row[2]). '</dd>';
			print '<hr />';
		}
		print '</dl>';
	?>
</body>
</html>
