<?php 
	require_once '../Encode.php';

	const DOC_ROOT = '../doc/';
	$o_dir = @opendir(DOC_ROOT);
	
	while ($file = readdir($o_dir)){
		if (is_file(DOC_ROOT.$file)){
			if ($_GET['path'] === mb_convert_encoding($file, 'UTF-8', 'SJIS-WIN')){
				break;
			}
		}
	}
	closedir($o_dir);
	if (!$file){
		die('不正なパスが指定されました');
	}
	
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment;filename='.$file);
	print(file_get_contents(DOC_ROOT.$file));
	

