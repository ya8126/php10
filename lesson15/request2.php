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
	<h3>ご回答ありがとうございました。</h3>
	<p>以下の内容で送信いたしました。</p>
	<dl>
		<dt>名前：</dt>
		<dd><?php print e($_POST['name']); ?></dd>
		<dt>メールアドレス：</dt>
		<dd><?php print e($_POST['email']); ?></dd>
		<dt>〒：</dt>
		<dd><?php print e($_POST['zip']); ?></dd>
		<dt>性別：</dt>
		<dd><?php print e($_POST['sex']); ?></dd>
		<dt>年齢：</dt>
		<dd><?php print e($_POST['age']); ?></dd>
		<dt>ご使用のＯＳ：</dt>
		<dd><?php 
				if (isset($_POST['os'])){
					print e(implode(',', $_POST['os']));
				}
			?>
		</dd>
		<dt>サイトへのご意見：</dt>
		<dd><?php print nl2br(e($_POST['memo'])); ?></dd>
		<dt>アンケート番号：</dt>
		<dd><?php print e($_POST['quest_num']); ?></dd>
	</dl>
</body>
</html>

