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
<h3>ファイルのアップロード</h3>
<form method="POST" action="upload_process.php"	enctype="multipart/form-data">
	<?php 
		if (isset($_COOKIE['upload'])){
			print '<div>'. e($_COOKIE['upload']).'ファイルをアップロードしました</div>';
		}
	?>
	<div>
		<input type="hidden" name="max_file_size" value="1000000"/>
		<input type="file" name="upfile" size="50">
		<input type="submit" value="アップロード">
	</div
</form>
</body>
</html>
