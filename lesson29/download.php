<?php 
	require_once '../Encode.php';

	const DOC_ROOT = '../doc/';
	$dir = new DirectoryIterator(DOC_ROOT);
	$flag = FALSE;
	foreach($dir as $file){
		if ($file->isFile()){
			if ($_GET['path'] === mb_convert_encoding($file->getFileName(), 'UTF-8', 'SJIS-WIN')){
				$flag = TRUE;
				break;
			}
		}
	}
	if (!$flag){
		die('不正なパスが指定されました');
	}
	
	header('Content-Type: application/octet-stream');
	header('Content-Disposition: attachment;filename='.$file->getFileName());
	print(file_get_contents(DOC_ROOT.$file->getFileName()));
	

