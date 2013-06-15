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
<h3>ファイルリスト</h3>
<table border="1">
	<tr>
		<th>ファイル</th><th>サイズ</th><th>最終アクセス日</th><th>最終更新日</th>
	</tr>
	<?php
		const DOC_ROOT = '../';
		clearstatcache();
		$o_dir = @opendir(DOC_ROOT) or die('ファイルが開けませんでした');
		while ($file = readdir($o_dir)){
			if (is_file(DOC_ROOT.$file)){
				$path = DOC_ROOT.$file;
				$file = mb_convert_encoding($file, 'UTF-8', 'SJIS-WIN');
	?>
	<tr>
		<td><?php print e($file); ?></td>
		<td><?php print round(filesize($path)/1024); ?>KB</td>
		<td><?php print date('Y/m/d H:i:s', fileatime($path)); ?></td>
		<td><?php print date('Y/m/d H:i:s', filemtime($path)); ?></td>
	</tr>
	<?php
			}
		}
		closedir($o_dir);
	?>
</table>

</body>
</html>
