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
		$file = @fopen('../lesson21/guest.dat', 'rb') or die('ファイルが開けませんでした');
		flock($file, LOCK_SH);
		print '<dl>';
		while($row = fgetcsv($file, 1024, "\t")){
//		while($row = fgets($file)){
//			$row = explode("\t", $row);
			print '<dt>'. e($row[1]). '(' . e($row[0]). ')</dt>';
			print '<dd>メッセージ：'. e($row[2]). '</dd>';
			print '<hr />';
		}
		print '</dl>';
		flock($file, LOCK_UN);
		fclose($file);
	?>
</body>
</html>
