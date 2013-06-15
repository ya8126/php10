<?php
	$ext = pathinfo($_FILES['upfile']['name']);
	$perm = array('gif', 'jpg', 'jpeg', 'png');
	$msg = array(
		UPLOAD_ERR_INT_SIZE => 'php.iniのupload_max_filesize制限を越えています',
		UPLOAD_ERR_FORM_SIZE => 'HTMLのMAX_FILE_SIZE制限を越えています',
		UPLOAD_ERR_PARTIAL => 'ファイルが一部しかアップロードされませんでした',
		UPLOAD_ERR_NO_FILE => 'ファイルはアップロードされませんでした',
		UPLOAD_ERR_NO_TMP_DIR => '一時保存フォルダが存在しません',
		UPLOAD_ERR_CANT_WRITE => 'ディスクの書き込みに失敗しました',
		UPLOAD_ERR_EXTENSION => '拡張モジュールによってアップロードが中断されました',
		upload_err_bad_extension => '画像以外のファイルはアップロードできません',
		upload_err_no_picture => 'ファイルの内容が画像ではありません',
		upload_err_tmp_move => 'アップロードに失敗しました'
	);	
	print_r($_FILES);		
	if ($_FILES['upfile']['error'] !== UPLOAD_ERR_OK){
		$err_msg = $_FILES['upfile']['error'].$msg[$_FILES['upfile']['error']];
	}elseif (!in_array(strtolower($ext['extension']), $perm)){
		$err_msg = $msg['upload_err_bad_extension'];
	}elseif (!@getimagesize($_FILES['upfile']['tmp_name'])){
		$err_msg = $msg['upload_err_no_picture'];
	}else{
		$src =$_FILES['upfile']['tmp_name'];
		$dest = mb_convert_encoding($_FILES['upfile']['name'], 'SJIS-WIN', 'UTF-8');
		if (!move_uploaded_file($src, '../doc/'.$dest)){
			$err_msg = $msg['upload_err_tmp_move'];
		}
	}
	
	if (isset($err_msg)){
		die('<div>'.$err_msg.'</div>');
	}
	setcookie('upload', $dest, time() + 20);
	header('Location: http://'. $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/upload.php');
