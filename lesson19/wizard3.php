<?php
	require_once '../Encode.php';
	require_once 'Mail.php';
	
	session_start();

	if (isset($_POST['age'])) {
		$_SESSION['age'] = $_POST['age'];
	}
	if (isset($_POST['os'])) {
		$_SESSION['os'] = $_POST['os'];
	}
	if (isset($_POST['memo'])) {
		$_SESSION['memo'] = $_POST['memo'];
	}
	if (isset($_POST['quest_num'])) {
		$_SESSION['quest_num'] = $_POST['quest_num'];
	}

	$errors = array();
	foreach($_SESSION as $key => $value){
		if (is_array($value)){
			$value = implode('', $value);
		}
		if (!mb_check_encoding($value)){
			$errors[] = "文字コードに誤りがあります";
			break;
		}
	}
	if (trim($_SESSION['name']) === ''){
		$errors[] = "名前は必ず入力してください";
	}
	if (mb_strlen($_SESSION['name']) > 50){
		$errors[] = "名前は50文字以内で入力してください";
	}
	if (mb_strlen($_SESSION['name']) > 50){
		$errors[] = "名前は50文字以内で入力してください";
	}
	if (!preg_match('/^[0-9]{3}-[0-9]{4}$/', $_SESSION['zip'])){
		$errors[] = "郵便番号を正しく入力してください";
	}
	if ($_SESSION['age'] < 10 || $_SESSION['age'] > 50){
		$errors[] = "年齢は10～50の間で入力してください";
	}
	$oss = array('win', 'mac', 'linux');
	if (isset($_SESSION['os'])){
		foreach ($_SESSION['os'] as $os){
			if (!in_array($os, $oss)){
				$errors[] = "OSは決められた選択肢の中から選択してください";
				break;
			}
		}
	}
	if (count($errors)){
		die(implode('<br>', $errors).'<br>[<a href="wizard1.php">戻る</a>]');
	}
	
	$params = array(
		"host" => "smtp.gmail.com",
		"port" => 587,
		"auth" => true,
		"username" => "pgacademy.user@gmail.com",
		"password" => "1tacade3"
	);
	
	$headers = array(
		"From" => "pgacademy.user@gmail.com",
		"To" => "tonya.8839@gmail.com",
		"Subject" => mb_convert_encoding("サイト改善アンケート", "utf-8", "auto")
	);
	
	$body = "■■サイト改善アンケート■■\n";
	foreach ($_SESSION as $key => $value){
		if (is_array($value)) {
			$value = implode(',', $value);
		}
		$body .= "[{$key}]{$value}\n";
	}

	$body = mb_convert_encoding($body, "utf-8", "auto");
	
	$mail = @Mail::factory("smtp", $params);
	$result =$mail->send("tonya.8839@gmail.com", $headers, $body);
	
	if (@PEAR::isError($result)){
		print "<p>". $result->getMessage(). "</p>";
	}else{
		print "<p>sent successfully</p>";
	}
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
		<dd><?php print e($_SESSION['name']); ?></dd>
		<dt>メールアドレス：</dt>
		<dd><?php print e($_SESSION['email']); ?></dd>
		<dt>〒：</dt>
		<dd><?php print e($_SESSION['zip']); ?></dd>
		<dt>性別：</dt>
		<dd><?php print e($_SESSION['sex']); ?></dd>
		<dt>年齢：</dt>
		<dd><?php print e($_SESSION['age']); ?></dd>
		<dt>ご使用のＯＳ：</dt>
		<dd><?php 
				if (isset($_SESSION['os'])){
					print e(implode(',', $_SESSION['os']));
				}
			?>
		</dd>
		<dt>サイトへのご意見：</dt>
		<dd><?php print nl2br(e($_SESSION['memo'])); ?></dd>
		<dt>アンケート番号：</dt>
		<dd><?php print e($_SESSION['quest_num']); ?></dd>
	</dl>
	<?php
//		session_unset();
	?>
</body>
</html>

